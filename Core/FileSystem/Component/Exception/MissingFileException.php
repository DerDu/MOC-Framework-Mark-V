<?php
namespace MOC\V\Core\FileSystem\Component\Exception;

class MissingFileException extends ComponentException
{

    public function __construct( $Message = "", $Code = 0, $Previous = null )
    {

        $Message = 'File '.$Message.' not found!';

        parent::__construct( $Message, $Code, $Previous );
    }

}
