<?php
namespace MOC\V\Component\Database\Exception;

use Exception;

class DatabaseException extends Exception
{

    public function __construct( $Message = "", $Code = 0, $Previous = null )
    {

        parent::__construct( $Message, $Code, $Previous );
    }
}
