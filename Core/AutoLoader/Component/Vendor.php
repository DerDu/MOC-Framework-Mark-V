<?php
namespace MOC\V\Core\AutoLoader\Component;

use MOC\V\Core\AutoLoader\Component\Bridge\IBridgeInterface;

/**
 * Interface IVendorInterface
 *
 * @package MOC\V\Core\AutoLoader\Component
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
 * @package MOC\V\Core\AutoLoader\Component
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
