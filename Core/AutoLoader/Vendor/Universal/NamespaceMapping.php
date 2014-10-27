<?php
namespace MOC\V\Core\AutoLoader\Vendor\Universal;

use MOC\V\Core\AutoLoader\Exception\AutoLoaderException;

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
     *
     * @throws AutoLoaderException
     */
    final public function addNamespaceMapping( $Namespace, $Directory )
    {

        if (false === ( $Directory = realpath( $Directory ) )) {
            throw new AutoLoaderException();
        }

        if (!isset( $this->NamespaceMapping[$Namespace] )) {
            $this->NamespaceMapping[$Namespace] = array();
        }
        array_push( $this->NamespaceMapping[$Namespace],
            rtrim( str_replace( array( '\\', '/' ), DIRECTORY_SEPARATOR, $Directory ), DIRECTORY_SEPARATOR )
        );
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
