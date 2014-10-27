<?php
namespace MOC\V\Component\Documentation\Component\Exception;

/**
 * Class TypeDirectoryException
 *
 * @package MOC\V\Component\Documentation\Component\Exception
 */
class TypeDirectoryException extends ComponentException
{

    /**
     * @param string $Message
     * @param int    $Code
     * @param null   $Previous
     */
    public function __construct( $Message = "", $Code = 0, $Previous = null )
    {

        $Message = $Message.' is not a directory!';

        parent::__construct( $Message, $Code, $Previous );
    }

}
