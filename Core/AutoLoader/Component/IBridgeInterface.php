<?php
namespace MOC\V\Core\AutoLoader\Component;

use MOC\V\Core\AutoLoader\Component\Option\Repository\DirectoryOption;
use MOC\V\Core\AutoLoader\Component\Option\Repository\NamespaceOption;

/**
 * Interface IBridgeInterface
 *
 * @package MOC\V\Core\AutoLoader\Component
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
