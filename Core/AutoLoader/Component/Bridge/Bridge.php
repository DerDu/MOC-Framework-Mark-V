<?php
namespace MOC\V\Core\AutoLoader\Component\Bridge;

use MOC\V\Core\AutoLoader\Component\Option\DirectoryOption;
use MOC\V\Core\AutoLoader\Component\Option\NamespaceOption;

/**
 * Interface IBridgeInterface
 *
 * @package MOC\V\Core\AutoLoader\Component\Bridge
 */
interface IBridgeInterface
{

    /**
     * @return IBridgeInterface
     */
    public function registerLoader();

    /**
     * @return IBridgeInterface
     */
    public function unregisterLoader();

    /**
     * @param string $ClassName
     *
     * @return bool
     */
    public function loadSourceFile( $ClassName );

    /**
     * @param NamespaceOption $Namespace
     * @param DirectoryOption $Directory
     *
     * @return IBridgeInterface
     */
    public function addNamespaceDirectoryMapping( NamespaceOption $Namespace, DirectoryOption $Directory );
}


/**
 * Class Bridge
 *
 * @package MOC\V\Core\AutoLoader\Component\Bridge
 */
abstract class Bridge implements IBridgeInterface
{

    /**
     * @return IBridgeInterface
     */
    public function registerLoader()
    {

        spl_autoload_register( array( $this, 'loadSourceFile' ), true, false );
        return $this;
    }

    /**
     * @return IBridgeInterface
     */
    public function unregisterLoader()
    {

        spl_autoload_unregister( array( $this, 'loadSourceFile' ) );
        return $this;
    }

}
