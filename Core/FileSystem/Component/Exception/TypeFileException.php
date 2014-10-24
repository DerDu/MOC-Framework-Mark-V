<?php
namespace MOC\V\Core\FileSystem\Component\Exception;

class TypeFileException extends ComponentException
{

    public function __construct( $Message = "", $Code = 0, $Previous = null )
    {

        $Message = $Message.' is not a file!';

        parent::__construct( $Message, $Code, $Previous );
    }

}
