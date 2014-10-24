<?php
namespace MOC\V\Component\Database\Component\Exception;

use MOC\V\Component\Database\Exception\DatabaseException;

class ComponentException extends DatabaseException
{

    public function __construct( $Message = "", $Code = 0, $Previous = null )
    {

        parent::__construct( $Message, $Code, $Previous );
    }
}
