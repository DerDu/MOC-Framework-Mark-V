<?php
namespace MOC\V\Component\Documentation;

use MOC\V\Component\Documentation\Component\Bridge\Repository\ApiGenDocumentation;
use MOC\V\Component\Documentation\Component\IBridgeInterface;
use MOC\V\Component\Documentation\Component\IVendorInterface;
use MOC\V\Component\Documentation\Component\Parameter\Repository\DirectoryParameter;

/**
 * Class Documentation
 *
 * @package MOC\V\Component\Documentation
 */
class Documentation implements IVendorInterface
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
     * @return IBridgeInterface
     */
    public static function getDocumentation()
    {

        return self::getApiGenDocumentation();
    }

    /**
     * @return IBridgeInterface
     */
    public static function getApiGenDocumentation()
    {

        $Documentation = new ApiGenDocumentation(
            new DirectoryParameter( __DIR__.'/../../' ),
            new DirectoryParameter( __DIR__.'/../../Documentation/' )
        );

        return $Documentation;
    }

    /**
     * @return IBridgeInterface
     */
    public function getBridgeInterface()
    {

        return $this->VendorInterface->getBridgeInterface();
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
