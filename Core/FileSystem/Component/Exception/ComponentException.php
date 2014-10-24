<?php
namespace MOC\V\Core\FileSystem\Component\Exception;

use MOC\V\Core\FileSystem\Exception\FileSystemException;

class ComponentException extends FileSystemException
{

    public function __construct( $Message = "", $Code = 0, $Previous = null )
    {

        parent::__construct( $Message, $Code, $Previous );
    }
}
