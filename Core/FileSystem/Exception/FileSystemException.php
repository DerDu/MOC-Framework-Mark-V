<?php
namespace MOC\V\Core\FileSystem\Exception;

use Exception;

/**
 * Class FileSystemException
 *
 * @package MOC\V\Core\FileSystem\Exception
 */
class FileSystemException extends Exception
{

    public function __construct( $Message = "", $Code = 0, $Previous = null )
    {

        parent::__construct( $Message, $Code, $Previous );
    }
}
