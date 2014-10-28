<?php
namespace MOC\V\TestSuite\Tests\Core\FileSystem;

use MOC\V\Core\FileSystem\Component\Option\Repository\DirectoryOption;
use MOC\V\Core\FileSystem\Component\Option\Repository\FileOption;

class OptionTest extends \PHPUnit_Framework_TestCase
{

    public function testAbstractOption()
    {

        /** @var \MOC\V\Core\FileSystem\Component\Option\Option $MockOption */
        $MockOption = $this->getMockForAbstractClass( 'MOC\V\Core\FileSystem\Component\Option\Option' );

        $Option = new $MockOption();
        $this->assertInstanceOf( 'MOC\V\Core\FileSystem\Component\Option\Option', $Option );

    }

    public function testFileOption()
    {

        try {
            new FileOption( null );
        } catch( \Exception $E ) {
            $this->assertInstanceOf( 'MOC\V\Core\FileSystem\Component\Exception\EmptyFileException', $E );
        }

        $Option = new FileOption( __FILE__ );
        $this->assertEquals( __FILE__, $Option->getFile() );

        try {
            $Option->setFile( __DIR__ );
        } catch( \Exception $E ) {
            $this->assertInstanceOf( 'MOC\V\Core\FileSystem\Component\Exception\TypeFileException', $E );
        }

    }

    public function testDirectoryOption()
    {

        try {
            new DirectoryOption( null );
        } catch( \Exception $E ) {
            $this->assertInstanceOf( 'MOC\V\Core\FileSystem\Component\Exception\EmptyDirectoryException', $E );
        }

        $Option = new DirectoryOption( __DIR__ );
        $this->assertEquals( __DIR__, $Option->getDirectory() );

        try {
            $Option->setDirectory( __FILE__ );
        } catch( \Exception $E ) {
            $this->assertInstanceOf( 'MOC\V\Core\FileSystem\Component\Exception\TypeDirectoryException', $E );
        }

    }

}
