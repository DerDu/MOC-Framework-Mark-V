<?php
namespace MOC\V\Core\AutoLoader\Vendor\Multiton;

/**
 * Class NamespaceLoader
 *
 * @package MOC\V\Core\AutoLoader\Vendor\Multiton
 */
class NamespaceLoader
{

    /** @var null|string $Namespace */
    private $Namespace = null;
    /** @var null|string $Path */
    private $Path = null;
    /** @var string $Separator */
    private $Separator = '\\';
    /** @var string $Extension */
    private $Extension = '.php';
    /** @var string $Prefix */
    private $Prefix = 'MOC\V';

    function __construct( $Namespace, $Path, $Prefix = null )
    {

        $this->Namespace = $Namespace;
        $this->Path = $Path;
        if (null !== $Prefix) {
            $this->Prefix = $Prefix;
        }
    }


    /**
     * @param string $ClassName
     *
     * @return bool
     */
    public function loadClass( $ClassName )
    {

        if ($this->checkExists( $ClassName )) {
            return true;
        }
        if (!$this->checkCanLoadClass( $ClassName )) {
            return false;
        }

        /** @noinspection PhpIncludeInspection */
        require( $this->Path.DIRECTORY_SEPARATOR
            .str_replace( array( $this->Prefix.$this->Separator, $this->Separator ), array( '', DIRECTORY_SEPARATOR ),
                $ClassName )
            .$this->Extension
        );
        return $this->checkExists( $ClassName );
    }

    /**
     * @param string $Name
     * @param bool   $Load
     *
     * @return bool
     */
    private function checkExists( $Name, $Load = false )
    {

        return class_exists( $Name, $Load )
        || interface_exists( $Name, $Load )
        || ( function_exists( 'trait_exists' ) && trait_exists( $Name, $Load ) );
    }

    /**
     * @param string $ClassName
     *
     * @return bool
     */
    public function checkCanLoadClass( $ClassName )
    {

        if ($this->Namespace !== null && strpos( $ClassName, $this->Namespace.$this->Separator ) !== 0) {
            return false;
        }
        $File = str_replace(
                array( $this->Prefix.$this->Separator, $this->Separator ),
                array( '', DIRECTORY_SEPARATOR ),
                $ClassName
            ).$this->Extension;
        if ($this->Path !== null) {
            return is_file( $this->Path.DIRECTORY_SEPARATOR.$File );
        }
        // @codeCoverageIgnoreStart
        return ( false !== stream_resolve_include_path( $File ) );
        // @codeCoverageIgnoreEnd
    }
}

