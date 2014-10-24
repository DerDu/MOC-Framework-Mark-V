<?php
namespace MOC\V\Core\FileSystem\Component\Exception;

class EmptyFileException extends ComponentException
{

    public function __construct( $Message = "", $Code = 0, $Previous = null )
    {

        $Message = 'File location must not be empty!';

        parent::__construct( $Message, $Code, $Previous );
    }

}
