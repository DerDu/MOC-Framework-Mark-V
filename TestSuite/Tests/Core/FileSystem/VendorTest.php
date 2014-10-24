<?php
namespace MOC\V\TestSuite\Tests\Core\FileSystem;

use MOC\V\Core\FileSystem\Component\Vendor;

class VendorTest extends \PHPUnit_Framework_TestCase
{

    /** @runTestsInSeparateProcesses */
    public function testVendor()
    {

        /** @var \MOC\V\Core\FileSystem\Component\Bridge\Bridge $MockBridge */
        $MockBridge = $this->getMockForAbstractClass( 'MOC\V\Core\FileSystem\Component\Bridge\Bridge' );

        $Vendor = new Vendor( $MockBridge );

        $this->assertInstanceOf( 'MOC\V\Core\FileSystem\Component\Bridge\IBridgeInterface',
            $Vendor->getBridgeInterface() );

        $this->assertInstanceOf( 'MOC\V\Core\FileSystem\Component\IVendorInterface',
            $Vendor->setBridgeInterface( $MockBridge ) );
    }
}
