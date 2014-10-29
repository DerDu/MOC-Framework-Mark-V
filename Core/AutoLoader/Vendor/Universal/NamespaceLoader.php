<?php
namespace MOC\V\Core\AutoLoader\Vendor\Universal;

use MOC\V\Core\AutoLoader\Vendor\Universal\NamespaceLoader\NamespaceSearch;

/**
 * Class NamespaceLoader
 *
 * @package MOC\V\Core\AutoLoader\Vendor\Universal
 */
class NamespaceLoader extends NamespaceSearch
{

    /**
     * @param string $ClassName
     *
     * @return bool
     */
    public function loadClass( $ClassName )
    {

        $ClassName = trim( $ClassName, '\\' );
        if ($this->findSource( $ClassName ) || $this->findInclude( $ClassName )) {
            return true;
        }
        return false;
    }

    /**
     * @param string $ClassName
     *
     * @return bool
     */
    private function findSource( $ClassName )
    {

        $LoadNamespace = $this->getClassNamespace( $ClassName );
        /**
         * @var string $Namespace
         * @var array  $DirectoryList
         */
        foreach ((array)$this->getNamespaceList() as $Namespace) {
            if (empty( $LoadNamespace ) || empty( $Namespace ) || 0 !== strpos( $LoadNamespace, $Namespace )) {
                continue;
            }
            $DirectoryList = $this->getNamespaceMapping( $Namespace );
            if (
                $this->searchForClass( $DirectoryList, $ClassName )
                || $this->searchForClassFallback( $DirectoryList, $ClassName, $Namespace )
                || $this->searchForInterface( $DirectoryList, $ClassName )
                || $this->searchForInterfaceFallback( $DirectoryList, $ClassName, $Namespace )
            ) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param string $ClassName
     *
     * @return string
     */
    protected function getClassNamespace( $ClassName )
    {

        $Separator = strrpos( $ClassName, '\\' );
        return trim( substr( $ClassName, 0, $Separator ), '\\' );
    }

    /**
     * @param string $ClassName
     *
     * @return bool
     */
    private function findInclude( $ClassName )
    {

        $LoadFile = str_replace( '_', DIRECTORY_SEPARATOR, $this->getClassName( $ClassName ) ).'.php';
        if ($File = stream_resolve_include_path( $LoadFile )) {
            /** @noinspection PhpIncludeInspection */
            // @codeCoverageIgnoreStart
            require_once( $File );
            return true;
            // @codeCoverageIgnoreEnd
        }
        return false;
    }

    /**
     * @param string $ClassName
     *
     * @return string
     */
    protected function getClassName( $ClassName )
    {

        $Separator = strrpos( $ClassName, '\\' );
        return ( false === $Separator ) ? $ClassName : trim( substr( $ClassName, $Separator + 1 ), '\\' );
    }
}

