<?php
namespace MOC\V\Core\SecureKernel\Component\Bridge\Repository;

use MOC\V\Core\SecureKernel\Component\Bridge\Bridge;
use MOC\V\Core\SecureKernel\Component\Exception\ComponentException;
use MOC\V\Core\SecureKernel\Component\IBridgeInterface;

/**
 * Class SFTP
 *
 * @package MOC\V\Core\SecureKernel\Component\Bridge\Repository
 */
class SFTP extends Bridge implements IBridgeInterface
{

    /** @var null|\Net_SFTP */
    private $Connection = null;

    function __construct()
    {

        require_once( __DIR__.'/../../../Vendor/PhpSecLib/0.3.9/vendor/autoload.php' );
    }

    /**
     * @param string $Host
     * @param int    $Port
     * @param int    $Timeout
     *
     * @return SFTP
     */
    public function openConnection( $Host, $Port = 22, $Timeout = 10 )
    {

        $this->Connection = new \Net_SFTP( $Host, $Port, $Timeout );
        return $this;
    }

    /**
     * @return SFTP
     */
    public function closeConnection()
    {

        $this->Connection->disconnect();
        $this->Connection = null;
        return $this;
    }

    /**
     * @param string      $Username
     * @param null|string $Password
     *
     * @return SFTP
     * @throws ComponentException
     */
    public function loginCredential( $Username, $Password = null )
    {

        if (null === $Password) {
            if (!$this->Connection->login( $Username )) {
                throw new ComponentException( 'Login failed' );
            }
        } else {
            if (!$this->Connection->login( $Username, $Password )) {
                throw new ComponentException( 'Login failed' );
            }
        }
        return $this;
    }

    /**
     * @param string      $Username
     * @param string      $File
     * @param null|string $Password
     *
     * @return SFTP
     * @throws ComponentException
     */
    public function loginCredentialKey( $Username, $File, $Password = null )
    {

        $Key = new \Crypt_RSA();
        if (null !== $Password) {
            $Key->setPassword( $Password );
        }
        if (!$Key->loadKey( file_get_contents( $File ) )) {
            throw new ComponentException( 'Key failed' );
        }
        if (!$this->Connection->login( $Username, $Key )) {
            throw new ComponentException( 'Login failed' );
        }
        return $this;
    }

    public function listDirectory()
    {

        $List = $this->Connection->rawlist();
        return $List;
    }

    public function changeDirectory( $Directory )
    {

        if (!$this->Connection->chdir( $Directory )) {
            throw new ComponentException( 'Directory failed' );
        }
        return $this;
    }

    public function uploadFile( $File )
    {

        if (!$this->Connection->put( $File, file_get_contents( $File ) )) {
            throw new ComponentException( 'Upload failed' );
        }
        return $this;
    }

    public function downloadFile( $File )
    {

        if (!$this->Connection->get( $File, $File )) {
            throw new ComponentException( 'Download failed' );
        }
        return $this;
    }
}
