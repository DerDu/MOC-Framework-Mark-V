<?php
namespace MOC\V\TestSuite\Tests\Core\AutoLoader;

use MOC\V\Core\AutoLoader\Component\Option\Repository\DirectoryOption;
use MOC\V\Core\AutoLoader\Component\Option\Repository\NamespaceOption;

class OptionTest extends \PHPUnit_Framework_TestCase
{

    public function testAbstractOption()
    {

        /** @var \MOC\V\Core\AutoLoader\Component\Option\Option $MockOption */
        $MockOption = $this->getMockForAbstractClass( 'MOC\V\Core\AutoLoader\Component\Option\Option' );

        $Option = new $MockOption();
        $this->assertInstanceOf( 'MOC\V\Core\AutoLoader\Component\Option\Option', $Option );

    }

    public function testNamespaceOption()
    {

        try {
            new NamespaceOption( null );
        } catch( \Exception $E ) {
            $this->assertInstanceOf( 'MOC\V\Core\AutoLoader\Component\Exception\EmptyNamespaceException', $E );
        }

        $Option = new NamespaceOption( __NAMESPACE__ );
        $this->assertEquals( __NAMESPACE__, $Option->getNamespace() );

        $Option->setNamespace( 'MOC\V\TestSuite' );
        $this->assertEquals( 'MOC\V\TestSuite', $Option->getNamespace() );

    }

    public function testDirectoryOption()
    {

        try {
            new DirectoryOption( null );
        } catch( \Exception $E ) {
            $this->assertInstanceOf( 'MOC\V\Core\AutoLoader\Component\Exception\EmptyDirectoryException', $E );
        }

        $Option = new DirectoryOption( __DIR__ );
        $this->assertEquals( __DIR__, $Option->getDirectory() );
        try {
            $Option->setDirectory( 'MOC\V\TestSuite' );
        } catch( \Exception $E ) {
            $this->assertInstanceOf( 'MOC\V\Core\AutoLoader\Component\Exception\DirectoryNotFoundException', $E );
        }

    }

}
