<?php
namespace MOC\V\Component\Database\Component\Exception;

/**
 * Class NoConnectionException
 *
 * @package MOC\V\Component\Database\Component\Exception
 */
class NoConnectionException extends ComponentException
{

    /**
     * @param string $Message
     * @param int    $Code
     * @param null   $Previous
     */
    public function __construct( $Message = "", $Code = 0, $Previous = null )
    {

        $Message = 'Connection '.$Message.' not found!';

        parent::__construct( $Message, $Code, $Previous );
    }

}
