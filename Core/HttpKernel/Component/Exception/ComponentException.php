<?php
namespace MOC\V\Core\HttpKernel\Component\Exception;

use MOC\V\Core\HttpKernel\Exception\HttpKernelException;

class ComponentException extends HttpKernelException
{

    public function __construct( $Message = "", $Code = 0, $Previous = null )
    {

        parent::__construct( $Message, $Code, $Previous );
    }
}
