<?php

/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license. For more information, see
 * <http://www.doctrine-project.org>.
 */

namespace Doctrine\ORM\Cache;

use Doctrine\Common\Cache\CacheProvider;
use Doctrine\ORM\Cache;
use Doctrine\ORM\Cache\Persister\NonStrictReadWriteCachedCollectionPersister;
use Doctrine\ORM\Cache\Persister\NonStrictReadWriteCachedEntityPersister;
use Doctrine\ORM\Cache\Persister\ReadOnlyCachedCollectionPersister;
use Doctrine\ORM\Cache\Persister\ReadOnlyCachedEntityPersister;
use Doctrine\ORM\Cache\Persister\ReadWriteCachedCollectionPersister;
use Doctrine\ORM\Cache\Persister\ReadWriteCachedEntityPersister;
use Doctrine\ORM\Cache\Region;
use Doctrine\ORM\Cache\Region\DefaultRegion;
use Doctrine\ORM\Cache\Region\FileLockRegion;
use Doctrine\ORM\Cache\Region\UpdateTimestampCache;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Persisters\CollectionPersister;
use Doctrine\ORM\Persisters\EntityPersister;

/**
 * @since   2.5
 * @author  Fabio B. Silva <fabio.bat.silva@gmail.com>
 */
class DefaultCacheFactory implements CacheFactory
{

    /**
     * @var \Doctrine\Common\Cache\CacheProvider
     */
    private $cache;

    /**
     * @var \Doctrine\ORM\Cache\RegionsConfiguration
     */
    private $regionsConfig;

    /**
     * @var \Doctrine\ORM\Cache\TimestampRegion|null
     */
    private $timestampRegion;

    /**
     * @var \Doctrine\ORM\Cache\Region[]
     */
    private $regions = array();

    /**
     * @var string|null
     */
    private $fileLockRegionDirectory;

    /**
     * @param \Doctrine\ORM\Cache\RegionsConfiguration $cacheConfig
     * @param \Doctrine\Common\Cache\CacheProvider     $cache
     */
    public function __construct( RegionsConfiguration $cacheConfig, CacheProvider $cache )
    {

        $this->cache = $cache;
        $this->regionsConfig = $cacheConfig;
    }

    /**
     * @return string
     */
    public function getFileLockRegionDirectory()
    {

        return $this->fileLockRegionDirectory;
    }

    /**
     * @param string $fileLockRegionDirectory
     */
    public function setFileLockRegionDirectory( $fileLockRegionDirectory )
    {

        $this->fileLockRegionDirectory = (string)$fileLockRegionDirectory;
    }

    /**
     * @param \Doctrine\ORM\Cache\Region $region
     */
    public function setRegion( Region $region )
    {

        $this->regions[$region->getName()] = $region;
    }

    /**
     * {@inheritdoc}
     */
    public function buildCachedEntityPersister(
        EntityManagerInterface $em,
        EntityPersister $persister,
        ClassMetadata $metadata
    ) {

        $region = $this->getRegion( $metadata->cache );
        $usage = $metadata->cache['usage'];

        if ($usage === ClassMetadata::CACHE_USAGE_READ_ONLY) {
            return new ReadOnlyCachedEntityPersister( $persister, $region, $em, $metadata );
        }

        if ($usage === ClassMetadata::CACHE_USAGE_NONSTRICT_READ_WRITE) {
            return new NonStrictReadWriteCachedEntityPersister( $persister, $region, $em, $metadata );
        }

        if ($usage === ClassMetadata::CACHE_USAGE_READ_WRITE) {
            return new ReadWriteCachedEntityPersister( $persister, $region, $em, $metadata );
        }

        throw new \InvalidArgumentException( sprintf( "Unrecognized access strategy type [%s]", $usage ) );
    }

    /**
     * {@inheritdoc}
     */
    public function getRegion( array $cache )
    {

        if (isset( $this->regions[$cache['region']] )) {
            return $this->regions[$cache['region']];
        }

        $region = new DefaultRegion( $cache['region'], clone $this->cache,
            $this->regionsConfig->getLifetime( $cache['region'] ) );

        if ($cache['usage'] === ClassMetadata::CACHE_USAGE_READ_WRITE) {

            if (!$this->fileLockRegionDirectory) {
                throw new \LogicException(
                    'If you what to use a "READ_WRITE" cache an implementation of "Doctrine\ORM\Cache\ConcurrentRegion" is required, '.
                    'The default implementation provided by doctrine is "Doctrine\ORM\Cache\Region\FileLockRegion" if you what to use it please provide a valid directory, DefaultCacheFactory#setFileLockRegionDirectory(). '
                );
            }

            $directory = $this->fileLockRegionDirectory.DIRECTORY_SEPARATOR.$cache['region'];
            $region = new FileLockRegion( $region, $directory,
                $this->regionsConfig->getLockLifetime( $cache['region'] ) );
        }

        return $this->regions[$cache['region']] = $region;
    }

    /**
     * {@inheritdoc}
     */
    public function buildCachedCollectionPersister(
        EntityManagerInterface $em,
        CollectionPersister $persister,
        array $mapping
    ) {

        $usage = $mapping['cache']['usage'];
        $region = $this->getRegion( $mapping['cache'] );

        if ($usage === ClassMetadata::CACHE_USAGE_READ_ONLY) {
            return new ReadOnlyCachedCollectionPersister( $persister, $region, $em, $mapping );
        }

        if ($usage === ClassMetadata::CACHE_USAGE_NONSTRICT_READ_WRITE) {
            return new NonStrictReadWriteCachedCollectionPersister( $persister, $region, $em, $mapping );
        }

        if ($usage === ClassMetadata::CACHE_USAGE_READ_WRITE) {
            return new ReadWriteCachedCollectionPersister( $persister, $region, $em, $mapping );
        }

        throw new \InvalidArgumentException( sprintf( "Unrecognized access strategy type [%s]", $usage ) );
    }

    /**
     * {@inheritdoc}
     */
    public function buildQueryCache( EntityManagerInterface $em, $regionName = null )
    {

        return new DefaultQueryCache(
            $em,
            $this->getRegion(
                array(
                    'region' => $regionName ?: Cache::DEFAULT_QUERY_REGION_NAME,
                    'usage'  => ClassMetadata::CACHE_USAGE_NONSTRICT_READ_WRITE
                )
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function buildCollectionHydrator( EntityManagerInterface $em, array $mapping )
    {

        return new DefaultCollectionHydrator( $em );
    }

    /**
     * {@inheritdoc}
     */
    public function buildEntityHydrator( EntityManagerInterface $em, ClassMetadata $metadata )
    {

        return new DefaultEntityHydrator( $em );
    }

    /**
     * {@inheritdoc}
     */
    public function getTimestampRegion()
    {

        if ($this->timestampRegion === null) {
            $name = Cache::DEFAULT_TIMESTAMP_REGION_NAME;
            $lifetime = $this->regionsConfig->getLifetime( $name );

            $this->timestampRegion = new UpdateTimestampCache( $name, clone $this->cache, $lifetime );
        }

        return $this->timestampRegion;
    }

    /**
     * @param \Doctrine\ORM\Cache\TimestampRegion $region
     */
    public function setTimestampRegion( TimestampRegion $region )
    {

        $this->timestampRegion = $region;
    }

    /**
     * {@inheritdoc}
     */
    public function createCache( EntityManagerInterface $em )
    {

        return new DefaultCache( $em );
    }
}
