<?php
namespace MOC\V\Component\Template\Component\Exception;

use MOC\V\Component\Template\Exception\TemplateException;

class ComponentException extends TemplateException
{

    public function __construct( $Message = "", $Code = 0, $Previous = null )
    {

        parent::__construct( $Message, $Code, $Previous );
    }
}
