<?php
namespace MOC\V\Core\FileSystem;

use MOC\V\Core\FileSystem\Component\Bridge\UniversalFileLoader;
use MOC\V\Core\FileSystem\Component\Bridge\UniversalFileWriter;
use MOC\V\Core\FileSystem\Component\IBridgeInterface;
use MOC\V\Core\FileSystem\Component\IVendorInterface;
use MOC\V\Core\FileSystem\Component\Option\Repository\FileOption;
use MOC\V\Core\FileSystem\Component\Vendor;
use MOC\V\Core\FileSystem\Exception\FileSystemException;

/**
 * Class FileSystem
 *
 * @package MOC\V\Core\FileSystem
 */
class FileSystem implements IVendorInterface
{

    /** @var IVendorInterface $VendorInterface */
    private $VendorInterface = null;

    /**
     * @param IVendorInterface $VendorInterface
     */
    function __construct( IVendorInterface $VendorInterface )
    {

        $this->setVendorInterface( $VendorInterface );
    }

    /**
     * @param string $Location
     *
     * @return IBridgeInterface
     * @throws FileSystemException
     */
    public static function getFileLoader( $Location )
    {

        return self::getUniversalFileLoader( $Location );
    }

    /**
     * @param string $Location
     *
     * @return IBridgeInterface
     */
    public static function getUniversalFileLoader( $Location )
    {

        $Loader = new FileSystem(
            new Vendor(
                new UniversalFileLoader(
                    new FileOption( $Location )
                )
            )
        );

        return $Loader->getBridgeInterface();
    }

    /**
     * @return IBridgeInterface
     */
    public function getBridgeInterface()
    {

        return $this->VendorInterface->getBridgeInterface();
    }

    /**
     * @param string $Location
     *
     * @return IBridgeInterface
     * @throws FileSystemException
     */
    public static function getFileWriter( $Location )
    {

        return self::getUniversalFileWriter( $Location );
    }

    /**
     * @param string $Location
     *
     * @return IBridgeInterface
     */
    public static function getUniversalFileWriter( $Location )
    {

        $Loader = new FileSystem(
            new Vendor(
                new UniversalFileWriter(
                    new FileOption( $Location )
                )
            )
        );

        return $Loader->getBridgeInterface();
    }

    /**
     * @return IVendorInterface
     */
    public function getVendorInterface()
    {

        return $this->VendorInterface;
    }

    /**
     * @param IVendorInterface $VendorInterface
     *
     * @return IVendorInterface
     */
    public function setVendorInterface( IVendorInterface $VendorInterface )
    {

        $this->VendorInterface = $VendorInterface;
        return $this;
    }

    /**
     * @param IBridgeInterface $BridgeInterface
     *
     * @return IBridgeInterface
     */
    public function setBridgeInterface( IBridgeInterface $BridgeInterface )
    {

        return $this->VendorInterface->setBridgeInterface( $BridgeInterface );
    }
}
