<?php
namespace MOC\V\TestSuite\Tests\Component\Router;

use MOC\V\Component\Router\Component\Bridge\SymfonyRouter;
use MOC\V\Component\Router\Component\Bridge\UniversalRouter;
use MOC\V\Component\Router\Component\Option\Repository\RouteOption;

/**
 * Class BridgeTest
 *
 * @package MOC\V\TestSuite\Tests\Component\Router
 */
class BridgeTest extends \PHPUnit_Framework_TestCase
{

    /** @runTestsInSeparateProcesses */
    public function testUniversalRouter()
    {

        $Bridge = new UniversalRouter();
        $this->assertInstanceOf( 'MOC\V\Component\Router\Component\IBridgeInterface',
            $Bridge->addRoute( new RouteOption( '/', 'Controller' ) )
        );
        $this->assertInternalType( 'string', $Bridge->getRoute() );
    }

    /** @runTestsInSeparateProcesses */
    public function testSymfonyRouter()
    {

        $Bridge = new SymfonyRouter();
        $this->assertInstanceOf( 'MOC\V\Component\Router\Component\IBridgeInterface',
            $Bridge->addRoute( new RouteOption( '/', 'Controller' ) )
        );
        try {
            $Bridge->getRoute();
        } catch( \Exception $E ) {

        }
        $this->assertInternalType( 'array', $Bridge->getRouteList() );
    }
}
