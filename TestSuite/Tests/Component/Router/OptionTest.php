<?php
namespace MOC\V\TestSuite\Tests\Component\Router;

class OptionTest extends \PHPUnit_Framework_TestCase
{

    /** @runTestsInSeparateProcesses */
    public function testAbstractOption()
    {

        /** @var \MOC\V\Component\Router\Component\Option\Option $MockOption */
        $MockOption = $this->getMockForAbstractClass( 'MOC\V\Component\Router\Component\Option\Option' );

        $Option = new $MockOption();
        $this->assertInstanceOf( 'MOC\V\Component\Router\Component\Option\Option', $Option );

    }

}
