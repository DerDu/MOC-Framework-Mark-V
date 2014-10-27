<?php
namespace MOC\V\Core\FileSystem\Component\Exception;

/**
 * Class MissingDirectoryException
 *
 * @package MOC\V\Core\FileSystem\Component\Exception
 */
class MissingDirectoryException extends ComponentException
{

    /**
     * @param string $Message
     * @param int    $Code
     * @param null   $Previous
     */
    public function __construct( $Message = "", $Code = 0, $Previous = null )
    {

        $Message = 'Directory '.$Message.' not found!';

        parent::__construct( $Message, $Code, $Previous );
    }

}
