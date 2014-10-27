<?php
namespace MOC\V\Core\FileSystem\Component\Exception;

/**
 * Class MissingFileException
 *
 * @package MOC\V\Core\FileSystem\Component\Exception
 */
class MissingFileException extends ComponentException
{

    /**
     * @param string $Message
     * @param int    $Code
     * @param null   $Previous
     */
    public function __construct( $Message = "", $Code = 0, $Previous = null )
    {

        $Message = 'File '.$Message.' not found!';

        parent::__construct( $Message, $Code, $Previous );
    }

}
