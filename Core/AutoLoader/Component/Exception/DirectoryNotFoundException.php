<?php
namespace MOC\V\Core\AutoLoader\Component\Exception;

class DirectoryNotFoundException extends ComponentException
{

    public function __construct( $Message = "", $Code = 0, $Previous = null )
    {

        parent::__construct( $Message, $Code, $Previous );
    }
}
