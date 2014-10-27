<?php
namespace MOC\V\TestSuite\Tests\Core\AutoLoader;

use MOC\V\Core\AutoLoader\AutoLoader;
use MOC\V\Core\AutoLoader\Component\Vendor;

class ModuleTest extends \PHPUnit_Framework_TestCase
{

    /** @runTestsInSeparateProcesses */
    public function testModule()
    {

        /** @var \MOC\V\Core\AutoLoader\Component\Bridge\Bridge $MockBridge */
        $MockBridge = $this->getMockBuilder( 'MOC\V\Core\AutoLoader\Component\Bridge\Bridge' )->getMock();
        $Vendor = new Vendor( new $MockBridge );
        $Module = new AutoLoader( $Vendor );

        $this->assertInstanceOf( 'MOC\V\Core\AutoLoader\Component\IVendorInterface',
            $Module->getVendorInterface()
        );
        $this->assertInstanceOf( 'MOC\V\Core\AutoLoader\Component\IVendorInterface',
            $Module->setBridgeInterface( $MockBridge )
        );
        $this->assertInstanceOf( 'MOC\V\Core\AutoLoader\Component\Bridge\IBridgeInterface',
            $Module->getBridgeInterface()
        );

    }

    /** @runTestsInSeparateProcesses */
    public function testStaticUniversalNamespaceAutoLoader()
    {

        $Loader = AutoLoader::getUniversalNamespaceAutoLoader( __NAMESPACE__, __DIR__ );
        $this->assertInstanceOf( 'MOC\V\Core\AutoLoader\Component\Bridge\IBridgeInterface', $Loader );
        $Loader->unregisterLoader();
    }

    /** @runTestsInSeparateProcesses */
    public function testStaticNamespaceAutoLoader()
    {

        $Loader = AutoLoader::getNamespaceAutoLoader( __NAMESPACE__, __DIR__ );
        $this->assertInstanceOf( 'MOC\V\Core\AutoLoader\Component\Bridge\IBridgeInterface', $Loader );
        $Loader->unregisterLoader();
    }
}
