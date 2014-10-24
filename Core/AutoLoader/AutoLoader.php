<?php
namespace MOC\V\Core\AutoLoader;

require_once( __DIR__.'/Exception/AutoLoaderException.php' );

require_once( __DIR__.'/Component/Exception/ComponentException.php' );
require_once( __DIR__.'/Component/Exception/DirectoryNotFoundException.php' );
require_once( __DIR__.'/Component/Exception/EmptyDirectoryException.php' );
require_once( __DIR__.'/Component/Exception/EmptyNamespaceException.php' );

require_once( __DIR__.'/Component/Vendor.php' );

require_once( __DIR__.'/Component/Option/Option.php' );
require_once( __DIR__.'/Component/Option/NamespaceOption.php' );
require_once( __DIR__.'/Component/Option/DirectoryOption.php' );

require_once( __DIR__.'/Component/Bridge/Bridge.php' );
require_once( __DIR__.'/Component/Bridge/UniversalNamespace.php' );

require_once( __DIR__.'/Vendor/Universal/NamespaceMapping.php' );
require_once( __DIR__.'/Vendor/Universal/NamespaceSearch.php' );
require_once( __DIR__.'/Vendor/Universal/NamespaceLoader.php' );

use MOC\V\Core\AutoLoader\Component\Bridge\IBridgeInterface;
use MOC\V\Core\AutoLoader\Component\Bridge\UniversalNamespace;
use MOC\V\Core\AutoLoader\Component\IVendorInterface;
use MOC\V\Core\AutoLoader\Component\Option\DirectoryOption;
use MOC\V\Core\AutoLoader\Component\Option\NamespaceOption;
use MOC\V\Core\AutoLoader\Component\Vendor;

/**
 * Class AutoLoader
 *
 * @package MOC\V\Core\AutoLoader
 */
class AutoLoader implements IVendorInterface
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
     * @return \MOC\V\Core\AutoLoader\Component\Bridge\IBridgeInterface
     */
    public function getBridgeInterface()
    {

        return $this->VendorInterface->getBridgeInterface();
    }

    /**
     * @param \MOC\V\Core\AutoLoader\Component\Bridge\IBridgeInterface $BridgeInterface
     *
     * @return IBridgeInterface
     */
    public function setBridgeInterface( IBridgeInterface $BridgeInterface )
    {

        return $this->VendorInterface->setBridgeInterface( $BridgeInterface );
    }

    /**
     * @param string $Namespace
     * @param string $Directory
     *
     * @return \MOC\V\Core\AutoLoader\Component\Bridge\IBridgeInterface
     */
    public static function getUniversalNamespaceAutoLoader( $Namespace, $Directory )
    {

        $Loader = new AutoLoader(
            new Vendor(
                new UniversalNamespace()
            )
        );
        $Loader->getBridgeInterface()->addNamespaceDirectoryMapping(
            new NamespaceOption( $Namespace ), new DirectoryOption( $Directory )
        );
        $Loader->getBridgeInterface()->registerLoader();

        return $Loader->getBridgeInterface();
    }
}
