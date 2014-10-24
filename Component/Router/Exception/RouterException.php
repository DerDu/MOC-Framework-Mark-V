<?php
namespace MOC\V\Component\Router\Exception;

use Exception;

class RouterException extends Exception
{

    public function __construct( $Message = "", $Code = 0, $Previous = null )
    {

        parent::__construct( $Message, $Code, $Previous );
    }
}
