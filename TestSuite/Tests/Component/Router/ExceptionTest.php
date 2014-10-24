<?php
namespace MOC\V\TestSuite\Tests\Component\Router;

use MOC\V\Component\Router\Component\Exception\ComponentException;
use MOC\V\Component\Router\Exception\RouterException;

class ExceptionTest extends \PHPUnit_Framework_TestCase
{

    /** @runTestsInSeparateProcesses */
    public function testRouterException()
    {

        try {
            throw new RouterException();
        } catch( \Exception $E ) {
            $this->assertInstanceOf( '\MOC\V\Component\Router\Exception\RouterException', $E );
        }

        try {
            throw new ComponentException();
        } catch( \Exception $E ) {
            $this->assertInstanceOf( '\MOC\V\Component\Router\Component\Exception\ComponentException', $E );
        }

    }

}
