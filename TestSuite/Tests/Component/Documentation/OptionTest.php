<?php
namespace MOC\V\TestSuite\Tests\Component\Documentation;

use MOC\V\Component\Documentation\Component\Option\Repository\DirectoryOption;

/**
 * Class OptionTest
 *
 * @package MOC\V\TestSuite\Tests\Component\Documentation
 */
class OptionTest extends \PHPUnit_Framework_TestCase
{

    /** @runTestsInSeparateProcesses */
    public function testAbstractOption()
    {

        /** @var \MOC\V\Component\Documentation\Component\Option\Option $MockOption */
        $MockOption = $this->getMockForAbstractClass( 'MOC\V\Component\Documentation\Component\Option\Option' );

        $Option = new $MockOption();
        $this->assertInstanceOf( 'MOC\V\Component\Documentation\Component\Option\Option', $Option );

    }

    /** @runTestsInSeparateProcesses */
    public function testDirectoryOption()
    {

        try {
            new DirectoryOption( null );
        } catch( \Exception $E ) {
            $this->assertInstanceOf( 'MOC\V\Component\Documentation\Component\Exception\EmptyDirectoryException', $E );
        }

        $Option = new DirectoryOption( __DIR__ );
        $this->assertEquals( __DIR__, $Option->getDirectory() );

        try {
            $Option->setDirectory( __FILE__ );
        } catch( \Exception $E ) {
            $this->assertInstanceOf( 'MOC\V\Component\Documentation\Component\Exception\TypeDirectoryException', $E );
        }

    }
}
