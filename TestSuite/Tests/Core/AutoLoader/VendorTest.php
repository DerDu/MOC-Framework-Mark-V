<?php
namespace MOC\V\TestSuite\Tests\Core\AutoLoader;

use MOC\V\Core\AutoLoader\Component\Vendor;

class VendorTest extends \PHPUnit_Framework_TestCase
{

    /** @runTestsInSeparateProcesses */
    public function testVendor()
    {

        /** @var \MOC\V\Core\AutoLoader\Component\Bridge\Bridge $MockBridge */
        $MockBridge = $this->getMockForAbstractClass( 'MOC\V\Core\AutoLoader\Component\Bridge\Bridge' );

        $Vendor = new Vendor( $MockBridge );

        $this->assertInstanceOf( 'MOC\V\Core\AutoLoader\Component\Bridge\IBridgeInterface',
            $Vendor->getBridgeInterface() );

        $this->assertInstanceOf( 'MOC\V\Core\AutoLoader\Component\IVendorInterface',
            $Vendor->setBridgeInterface( $MockBridge ) );
    }
}
