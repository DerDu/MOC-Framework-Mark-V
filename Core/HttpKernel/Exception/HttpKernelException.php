<?php
namespace MOC\V\Core\HttpKernel\Exception;

use Exception;

/**
 * Class HttpKernelException
 *
 * @package MOC\V\Core\HttpKernel\Exception
 */
class HttpKernelException extends Exception
{

    public function __construct( $Message = "", $Code = 0, $Previous = null )
    {

        parent::__construct( $Message, $Code, $Previous );
    }
}
