<?php
namespace MOC\V\Core\AutoLoader\Component\Bridge;

use MOC\V\Core\AutoLoader\Component\Option\DirectoryOption;
use MOC\V\Core\AutoLoader\Component\Option\NamespaceOption;
use MOC\V\Core\AutoLoader\Vendor\Universal\NamespaceLoader;

/**
 * Class UniversalNamespace
 *
 * @package MOC\V\Core\AutoLoader\Component\Bridge
 */
class UniversalNamespace extends Bridge implements IBridgeInterface
{

    /** @var NamespaceLoader $Instance */
    private $Instance = null;

    function __construct()
    {

        $this->Instance = new NamespaceLoader();
    }

    /**
     * @param string $ClassName
     *
     * @return bool
     */
    public function loadSourceFile( $ClassName )
    {

        return $this->Instance->loadClass( $ClassName );
    }

    /**
     * @param NamespaceOption $Namespace
     * @param DirectoryOption $Directory
     *
     * @return IBridgeInterface
     */
    public function addNamespaceDirectoryMapping( NamespaceOption $Namespace, DirectoryOption $Directory )
    {

        $this->Instance->addNamespaceMapping( $Namespace->getNamespace(), $Directory->getDirectory() );
        return $this;
    }
}
