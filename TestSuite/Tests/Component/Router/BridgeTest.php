<?php
namespace MOC\V\TestSuite\Tests\Component\Router;

use MOC\V\Component\Router\Component\Bridge\SymfonyRouter;
use MOC\V\Component\Router\Component\Bridge\UniversalRouter;
use MOC\V\Component\Router\Component\Parameter\Repository\RouteParameter;

/**
 * Class BridgeTest
 *
 * @package MOC\V\TestSuite\Tests\Component\Router
 */
class BridgeTest extends \PHPUnit_Framework_TestCase
{

    public function testUniversalRouter()
    {

        $Bridge = new UniversalRouter();
        $this->assertInstanceOf( 'MOC\V\Component\Router\Component\IBridgeInterface',
            $Bridge->addRoute( new RouteParameter( '/',
                    '\MOC\V\Core\HttpKernel\Component\Bridge\UniversalRequest::getParameterArray' ) )
        );
        $this->assertInternalType( 'array', $Bridge->getRoute() );
    }

    public function testSymfonyRouter()
    {

        $Bridge = new SymfonyRouter();
        $this->assertInstanceOf( 'MOC\V\Component\Router\Component\IBridgeInterface',
            $Bridge->addRoute( new RouteParameter( '/',
                    '\MOC\V\Core\HttpKernel\Component\Bridge\UniversalRequest::getParameterArray' ) )
        );
        try {
            $Bridge->getRoute();
        } catch( \Exception $E ) {

        }
        $this->assertInternalType( 'array', $Bridge->getRouteList() );
    }
}
