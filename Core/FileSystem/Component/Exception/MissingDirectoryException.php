<?php
namespace MOC\V\Core\FileSystem\Component\Exception;

class MissingDirectoryException extends ComponentException
{

    public function __construct( $Message = "", $Code = 0, $Previous = null )
    {

        $Message = 'Directory '.$Message.' not found!';

        parent::__construct( $Message, $Code, $Previous );
    }

}
