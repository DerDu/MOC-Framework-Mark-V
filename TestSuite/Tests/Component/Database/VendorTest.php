<?php
namespace MOC\V\TestSuite\Tests\Component\Database;

use MOC\V\Component\Database\Component\Vendor;

class VendorTest extends \PHPUnit_Framework_TestCase
{

    /** @runTestsInSeparateProcesses */
    public function testVendor()
    {

        /** @var \MOC\V\Component\Database\Component\Bridge\Bridge $MockBridge */
        $MockBridge = $this->getMockForAbstractClass( 'MOC\V\Component\Database\Component\Bridge\Bridge' );

        $Vendor = new Vendor( $MockBridge );

        $this->assertInstanceOf( 'MOC\V\Component\Database\Component\Bridge\IBridgeInterface',
            $Vendor->getBridgeInterface() );

        $this->assertInstanceOf( 'MOC\V\Component\Database\Component\IVendorInterface',
            $Vendor->setBridgeInterface( $MockBridge ) );
    }
}
