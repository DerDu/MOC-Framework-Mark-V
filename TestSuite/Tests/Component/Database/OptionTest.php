<?php
namespace MOC\V\TestSuite\Tests\Component\Database;

/**
 * Class OptionTest
 *
 * @package MOC\V\TestSuite\Tests\Component\Database
 */
class OptionTest extends \PHPUnit_Framework_TestCase
{

    public function testAbstractOption()
    {

        /** @var \MOC\V\Component\Database\Component\Option\Option $MockOption */
        $MockOption = $this->getMockForAbstractClass( 'MOC\V\Component\Database\Component\Option\Option' );

        $Option = new $MockOption();
        $this->assertInstanceOf( 'MOC\V\Component\Database\Component\Option\Option', $Option );

    }

}
