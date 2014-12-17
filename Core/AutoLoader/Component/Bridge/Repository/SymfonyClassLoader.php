<?php
namespace MOC\V\Core\AutoLoader\Component\Bridge\Repository;

use MOC\V\Core\AutoLoader\Component\Bridge\Bridge;
use MOC\V\Core\AutoLoader\Component\IBridgeInterface;
use MOC\V\Core\AutoLoader\Component\Parameter\Repository\DirectoryParameter;
use MOC\V\Core\AutoLoader\Component\Parameter\Repository\NamespaceParameter;
use Symfony\Component\ClassLoader\ClassLoader;

/**
 * Class SymfonyClassLoader
 *
 * @package MOC\V\Core\AutoLoader\Component\Bridge
 */
class SymfonyClassLoader extends Bridge implements IBridgeInterface
{

    /** @var ClassLoader $Instance */
    private $Instance = null;

    function __construct()
    {

        require_once( __DIR__.'/../../../Vendor/Symfony/Component/ClassLoader/ClassLoader.php' );

        $this->Instance = new ClassLoader();
        $this->Instance->setUseIncludePath( true );
    }

    /**
     * @param string $ClassName
     *
     * @return bool
     */
    public function loadSourceFile( $ClassName )
    {

        return $this->Instance->loadClass( trim( $ClassName, '\\' ) ) ? true : false;
    }

    /**
     * @param NamespaceParameter $Namespace
     * @param DirectoryParameter $Directory
     *
     * @return IBridgeInterface
     */
    public function addNamespaceDirectoryMapping( NamespaceParameter $Namespace, DirectoryParameter $Directory )
    {

        $this->Instance->addPrefix( $Namespace->getNamespace(), $Directory->getDirectory() );
        return $this;
    }
}
