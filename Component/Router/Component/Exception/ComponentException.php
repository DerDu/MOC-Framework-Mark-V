<?php
namespace MOC\V\Component\Router\Component\Exception;

use MOC\V\Component\Router\Exception\RouterException;

class ComponentException extends RouterException
{

    public function __construct( $Message = "", $Code = 0, $Previous = null )
    {

        parent::__construct( $Message, $Code, $Previous );
    }
}
