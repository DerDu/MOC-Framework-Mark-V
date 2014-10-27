<?php
namespace MOC\V\TestSuite\Tests\Component\Documentation;

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

}
