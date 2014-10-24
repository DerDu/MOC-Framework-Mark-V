<?php
namespace MOC\V\Component\Template\Component\Exception;

class TypeFileException extends ComponentException
{

    public function __construct( $Message = "", $Code = 0, $Previous = null )
    {

        $Message = $Message.' is a directory!';

        parent::__construct( $Message, $Code, $Previous );
    }

}
