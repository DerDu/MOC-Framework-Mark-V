<?php
namespace MOC\V\Core\AutoLoader\Component\Exception;

/**
 * Class EmptyDirectoryException
 *
 * @package MOC\V\Core\AutoLoader\Component\Exception
 */
class EmptyDirectoryException extends ComponentException
{

    /**
     * @param string $Message
     * @param int    $Code
     * @param null   $Previous
     */
    public function __construct( $Message = "", $Code = 0, $Previous = null )
    {

        parent::__construct( $Message, $Code, $Previous );
    }
}
