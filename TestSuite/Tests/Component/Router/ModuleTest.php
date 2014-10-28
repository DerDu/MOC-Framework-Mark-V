<?php
namespace MOC\V\TestSuite\Tests\Component\Router;

use MOC\V\Component\Router\Component\Vendor;
use MOC\V\Component\Router\Router;

/**
 * Class ModuleTest
 *
 * @package MOC\V\TestSuite\Tests\Component\Router
 */
class ModuleTest extends \PHPUnit_Framework_TestCase
{

    public function testModule()
    {

        /** @var \MOC\V\Component\Router\Component\Bridge\Bridge $MockBridge */
        $MockBridge = $this->getMockBuilder( 'MOC\V\Component\Router\Component\Bridge\Bridge' )->getMock();
        $Vendor = new Vendor( new $MockBridge );
        $Module = new Router( $Vendor );

        $this->assertInstanceOf( 'MOC\V\Component\Router\Component\IVendorInterface',
            $Module->getVendorInterface()
        );
        $this->assertInstanceOf( 'MOC\V\Component\Router\Component\IVendorInterface',
            $Module->setBridgeInterface( $MockBridge )
        );
        $this->assertInstanceOf( 'MOC\V\Component\Router\Component\IBridgeInterface',
            $Module->getBridgeInterface()
        );

    }

}
