<?php
namespace MOC\V\Core\AutoLoader\Vendor\Universal;

/**
 * Class NamespaceMapping
 *
 * @package MOC\V\Core\AutoLoader\Vendor\Universal
 */
abstract class NamespaceMapping
{

    /** @var array $NamespaceMapping */
    private $NamespaceMapping = array();

    /**
     * @param string $Namespace
     * @param string $Directory
     */
    final public function addNamespaceMapping( $Namespace, $Directory )
    {

        if (!isset( $this->NamespaceMapping[$Namespace] )) {
            $this->NamespaceMapping[$Namespace] = array();
        }
        array_push( $this->NamespaceMapping[$Namespace],
            trim( str_replace( array( '\\', '/' ), DIRECTORY_SEPARATOR, $Directory ), DIRECTORY_SEPARATOR ) );
    }

    /**
     * @param string $Namespace
     *
     * @return array
     */
    final public function getNamespaceMapping( $Namespace )
    {

        return isset( $this->NamespaceMapping[$Namespace] ) ? $this->NamespaceMapping[$Namespace] : array();
    }

    /**
     * @return array
     */
    final public function getNamespaceList()
    {

        return array_keys( $this->NamespaceMapping );
    }
}
