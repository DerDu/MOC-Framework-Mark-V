<?php
namespace MOC\V\Component\Template\Exception;

class TemplateTypeException extends TemplateException
{

    public function __construct( $Message = "", $Code = 0, $Previous = null )
    {
        $Message = 'Template type '.$Message.' not supported!';

        parent::__construct( $Message, $Code, $Previous );
    }
}
