<?php
namespace MOC\V\Core\HttpKernel;

use MOC\V\Core\HttpKernel\Component\Bridge\IBridgeInterface;
use MOC\V\Core\HttpKernel\Component\IVendorInterface;

/**
 * Class HttpKernel
 *
 * @package MOC\V\Core\HttpKernel
 */
class HttpKernel implements IVendorInterface
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
     * @return \MOC\V\Core\HttpKernel\Component\Bridge\IBridgeInterface
     */
    public function getBridgeInterface()
    {

        return $this->VendorInterface->getBridgeInterface();
    }

    /**
     * @param IBridgeInterface $BridgeInterface
     *
     * @return \MOC\V\Core\HttpKernel\Component\Bridge\IBridgeInterface
     */
    public function setBridgeInterface( IBridgeInterface $BridgeInterface )
    {

        return $this->VendorInterface->setBridgeInterface( $BridgeInterface );
    }

}
