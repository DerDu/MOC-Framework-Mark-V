<?php
namespace MOC\V\Core\FileSystem;

use MOC\V\Core\FileSystem\Component\Bridge\IBridgeInterface;
use MOC\V\Core\FileSystem\Component\Bridge\UniversalFileLoader;
use MOC\V\Core\FileSystem\Component\Bridge\UniversalFileWriter;
use MOC\V\Core\FileSystem\Component\IVendorInterface;
use MOC\V\Core\FileSystem\Component\Option\FileOption;
use MOC\V\Core\FileSystem\Component\Vendor;
use MOC\V\Core\FileSystem\Exception\FileSystemException;

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
     * @return IBridgeInterface
     */
    public function getBridgeInterface()
    {

        return $this->VendorInterface->getBridgeInterface();
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

    /**
     * @param string $Location
     *
     * @return IBridgeInterface
     * @throws FileSystemException
     */
    public static function getFileLoader( $Location )
    {

        if (class_exists( '\MOC\V\Core\FileSystem\Component\Bridge\UniversalFileLoader', true )) {
            return self::getUniversalFileLoader( $Location );
        }
        throw new FileSystemException();
    }

    /**
     * @param string $Location
     *
     * @return IBridgeInterface
     * @throws FileSystemException
     */
    public static function getFileWriter( $Location )
    {

        if (class_exists( '\MOC\V\Core\FileSystem\Component\Bridge\UniversalFileWriter', true )) {
            return self::getUniversalFileWriter( $Location );
        }
        throw new FileSystemException();
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
}
