<?php
namespace MOC\V\TestSuite\Tests\Component\Template;

use MOC\V\Component\Template\Component\Option\Repository\FileOption;

/**
 * Class OptionTest
 *
 * @package MOC\V\TestSuite\Tests\Component\Template
 */
class OptionTest extends \PHPUnit_Framework_TestCase
{

    public function testAbstractOption()
    {

        /** @var \MOC\V\Component\Template\Component\Option\Option $MockOption */
        $MockOption = $this->getMockForAbstractClass( 'MOC\V\Component\Template\Component\Option\Option' );

        $Option = new $MockOption();
        $this->assertInstanceOf( 'MOC\V\Component\Template\Component\Option\Option', $Option );

    }

    public function testFileOption()
    {

        try {
            new FileOption( null );
        } catch( \Exception $E ) {
            $this->assertInstanceOf( 'MOC\V\Component\Template\Component\Exception\EmptyFileException', $E );
        }

        $Option = new FileOption( __FILE__ );
        $this->assertEquals( __FILE__, $Option->getFile() );

        try {
            $Option->setFile( __DIR__ );
        } catch( \Exception $E ) {
            $this->assertInstanceOf( 'MOC\V\Component\Template\Component\Exception\TypeFileException', $E );
        }

    }

}