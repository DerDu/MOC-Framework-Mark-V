<?php
namespace MOC\V\Core\AutoLoader\Component\Exception;

use MOC\V\Core\AutoLoader\Exception\AutoLoaderException;

class ComponentException extends AutoLoaderException
{

    public function __construct( $Message = "", $Code = 0, $Previous = null )
    {

        parent::__construct( $Message, $Code, $Previous );
    }
}
