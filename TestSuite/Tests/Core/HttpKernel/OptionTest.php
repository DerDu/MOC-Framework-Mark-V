<?php
namespace MOC\V\TestSuite\Tests\Core\HttpKernel;

/**
 * Class OptionTest
 *
 * @package MOC\V\TestSuite\Tests\Core\HttpKernel
 */
class OptionTest extends \PHPUnit_Framework_TestCase
{

    public function testAbstractOption()
    {

        /** @var \MOC\V\Core\HttpKernel\Component\Option\Option $MockOption */
        $MockOption = $this->getMockForAbstractClass( 'MOC\V\Core\HttpKernel\Component\Option\Option' );

        $Option = new $MockOption();
        $this->assertInstanceOf( 'MOC\V\Core\HttpKernel\Component\Option\Option', $Option );

    }
}
