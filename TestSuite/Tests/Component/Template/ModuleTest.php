<?php
namespace MOC\V\TestSuite\Tests\Component\Template;

use MOC\V\Component\Template\Component\Vendor;
use MOC\V\Component\Template\Template;

/**
 * Class ModuleTest
 *
 * @package MOC\V\TestSuite\Tests\Component\Template
 */
class ModuleTest extends \PHPUnit_Framework_TestCase
{

    public function testModule()
    {

        /** @var \MOC\V\Component\Template\Component\Bridge\Bridge $MockBridge */
        $MockBridge = $this->getMockBuilder( 'MOC\V\Component\Template\Component\Bridge\Bridge' )->getMock();
        $Vendor = new Vendor( new $MockBridge );
        $Module = new Template( $Vendor );

        $this->assertInstanceOf( 'MOC\V\Component\Template\Component\IVendorInterface',
            $Module->getVendorInterface()
        );
        $this->assertInstanceOf( 'MOC\V\Component\Template\Component\IVendorInterface',
            $Module->setBridgeInterface( $MockBridge )
        );
        $this->assertInstanceOf( 'MOC\V\Component\Template\Component\IBridgeInterface',
            $Module->getBridgeInterface()
        );

    }

    public function testStaticTwigTemplate()
    {

        $Loader = Template::getTwigTemplate( __FILE__ );
        $this->assertInstanceOf( 'MOC\V\Component\Template\Component\IBridgeInterface', $Loader );
    }

    public function testStaticTemplate()
    {

        try {
            Template::getTemplate( __FILE__ );
        } catch( \Exception $E ) {
            $this->assertInstanceOf( 'MOC\V\Component\Template\Exception\TemplateTypeException', $E );
        }
        try {
            Template::getTemplate( 'Missing.twig' );
        } catch( \Exception $E ) {

        }
    }
}
