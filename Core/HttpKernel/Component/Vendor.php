<?php
namespace MOC\V\Core\HttpKernel\Component;

use MOC\V\Core\HttpKernel\Component\Bridge\IBridgeInterface;

/**
 * Interface IVendorInterface
 *
 * @package MOC\V\Core\HttpKernel\Component
 */
interface IVendorInterface
{

    /**
     * @return IBridgeInterface
     */
    public function getBridgeInterface();

    /**
     * @param IBridgeInterface $BridgeInterface
     *
     * @return IVendorInterface
     */
    public function setBridgeInterface( IBridgeInterface $BridgeInterface );
}


/**
 * Class Vendor
 *
 * @package MOC\V\Core\HttpKernel\Component
 */
class Vendor implements IVendorInterface
{

    /** @var IBridgeInterface $BridgeInterface */
    private $BridgeInterface = null;

    /**
     * @param IBridgeInterface $BridgeInterface
     */
    function __construct( IBridgeInterface $BridgeInterface )
    {

        $this->setBridgeInterface( $BridgeInterface );
    }

    /**
     * @return IBridgeInterface
     */
    public function getBridgeInterface()
    {

        return $this->BridgeInterface;
    }

    /**
     * @param IBridgeInterface $BridgeInterface
     *
     * @return IVendorInterface
     */
    public function setBridgeInterface( IBridgeInterface $BridgeInterface )
    {

        $this->BridgeInterface = $BridgeInterface;
        return $this;
    }
}
