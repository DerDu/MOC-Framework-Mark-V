<?php
namespace MOC\V\Component\Database\Component;

/**
 * Class Vendor
 *
 * @package MOC\V\Component\Database\Component
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
