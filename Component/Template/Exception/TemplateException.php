<?php
namespace MOC\V\Component\Template\Exception;

use Exception;

class TemplateException extends Exception
{

    public function __construct( $Message = "", $Code = 0, $Previous = null )
    {

        parent::__construct( $Message, $Code, $Previous );
    }
}
