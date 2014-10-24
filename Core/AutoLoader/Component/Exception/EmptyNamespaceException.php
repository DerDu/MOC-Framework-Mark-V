<?php
namespace MOC\V\Core\AutoLoader\Component\Exception;

class EmptyNamespaceException extends ComponentException
{

    public function __construct( $Message = "", $Code = 0, $Previous = null )
    {

        parent::__construct( $Message, $Code, $Previous );
    }
}
