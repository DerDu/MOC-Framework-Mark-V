<?php
namespace MOC\V\TestSuite\Tests\Component\Documentation;

use MOC\V\Component\Documentation\Documentation;
use MOC\V\Component\Documentation\Vendor\Vendor;

/**
 * Class ModuleTest
 *
 * @package MOC\V\TestSuite\Tests\Component\Documentation
 */
class ModuleTest extends \PHPUnit_Framework_TestCase
{

    public function testModule()
    {

        /** @var \MOC\V\Component\Documentation\Component\Bridge\Bridge $MockBridge */
        $MockBridge = $this->getMockBuilder( 'MOC\V\Component\Documentation\Component\Bridge\Bridge' )->getMock();
        $Vendor = new Vendor( new $MockBridge );
        $Module = new Documentation( $Vendor );

        $this->assertInstanceOf( 'MOC\V\Component\Documentation\Component\IVendorInterface',
            $Module->getVendorInterface()
        );
        $this->assertInstanceOf( 'MOC\V\Component\Documentation\Component\IVendorInterface',
            $Module->setBridgeInterface( $MockBridge )
        );
        $this->assertInstanceOf( 'MOC\V\Component\Documentation\Component\IBridgeInterface',
            $Module->getBridgeInterface()
        );

    }

    public function testStaticApiGenDocumentation()
    {

        $Documentation = Documentation::getApiGenDocumentation();
        $this->assertInstanceOf( 'MOC\V\Component\Documentation\Component\IBridgeInterface', $Documentation );
    }

    public function testStaticDocumentation()
    {

        $Documentation = Documentation::getDocumentation();
        $this->assertInstanceOf( 'MOC\V\Component\Documentation\Component\IBridgeInterface', $Documentation );
    }
}
