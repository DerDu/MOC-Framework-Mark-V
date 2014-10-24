<?php
namespace MOC\V\TestSuite\Tests\Core\FileSystem;

use MOC\V\Core\FileSystem\Component\Vendor;
use MOC\V\Core\FileSystem\FileSystem;

class ModuleTest extends \PHPUnit_Framework_TestCase
{

    /** @runTestsInSeparateProcesses */
    public function testModule()
    {

        /** @var \MOC\V\Core\FileSystem\Component\Bridge\Bridge $MockBridge */
        $MockBridge = $this->getMockBuilder( 'MOC\V\Core\FileSystem\Component\Bridge\Bridge' )->getMock();
        $Vendor = new Vendor( new $MockBridge );
        $Module = new FileSystem( $Vendor );

        $this->assertInstanceOf( 'MOC\V\Core\FileSystem\Component\IVendorInterface',
            $Module->getVendorInterface()
        );
        $this->assertInstanceOf( 'MOC\V\Core\FileSystem\Component\IVendorInterface',
            $Module->setBridgeInterface( $MockBridge )
        );
        $this->assertInstanceOf( 'MOC\V\Core\FileSystem\Component\Bridge\IBridgeInterface',
            $Module->getBridgeInterface()
        );

    }

    /** @runTestsInSeparateProcesses */
    public function testStaticUniversalFileLoader()
    {

        try {
            FileSystem::getUniversalFileLoader( __DIR__ );
        } catch( \Exception $E ) {
            $this->assertInstanceOf( 'MOC\V\Core\FileSystem\Component\Exception\TypeFileException', $E );
        }

        $Loader = FileSystem::getUniversalFileLoader( __FILE__ );

        $this->assertEquals( __FILE__, $Loader->getLocation() );

        $this->assertInstanceOf( 'MOC\V\Core\FileSystem\Component\Bridge\IBridgeInterface', $Loader );
    }

    /** @runTestsInSeparateProcesses */
    public function testStaticUniversalFileWriter()
    {

        try {
            FileSystem::getUniversalFileWriter( __DIR__ );
        } catch( \Exception $E ) {
            $this->assertInstanceOf( 'MOC\V\Core\FileSystem\Component\Exception\TypeFileException', $E );
        }

        $Writer = FileSystem::getUniversalFileWriter( __FILE__ );

        $this->assertEquals( __FILE__, $Writer->getLocation() );

        $this->assertInstanceOf( 'MOC\V\Core\FileSystem\Component\Bridge\IBridgeInterface', $Writer );
    }

    /** @runTestsInSeparateProcesses */
    public function testStaticFileWriter()
    {

        try {
            FileSystem::getFileWriter( __DIR__ );
        } catch( \Exception $E ) {
            $this->assertInstanceOf( 'MOC\V\Core\FileSystem\Component\Exception\TypeFileException', $E );
        }
        try {
            FileSystem::getFileWriter( __FILE__ );
        } catch( \Exception $E ) {

        }
    }

    /** @runTestsInSeparateProcesses */
    public function testStaticFileLoader()
    {

        try {
            FileSystem::getFileLoader( __DIR__ );
        } catch( \Exception $E ) {
            $this->assertInstanceOf( 'MOC\V\Core\FileSystem\Component\Exception\TypeFileException', $E );
        }
        try {
            FileSystem::getFileLoader( __FILE__ );
        } catch( \Exception $E ) {

        }
    }
}
