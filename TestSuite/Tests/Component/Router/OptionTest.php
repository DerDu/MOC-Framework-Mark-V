<?php
namespace MOC\V\TestSuite\Tests\Component\Router;

use MOC\V\Component\Router\Component\Option\Repository\RouteOption;

/**
 * Class OptionTest
 *
 * @package MOC\V\TestSuite\Tests\Component\Router
 */
class OptionTest extends \PHPUnit_Framework_TestCase
{

    public function testAbstractOption()
    {

        /** @var \MOC\V\Component\Router\Component\Option\Option $MockOption */
        $MockOption = $this->getMockForAbstractClass( 'MOC\V\Component\Router\Component\Option\Option' );

        $Option = new $MockOption();
        $this->assertInstanceOf( 'MOC\V\Component\Router\Component\Option\Option', $Option );

    }

    public function testRouteOption()
    {

        $Route = new RouteOption( '/', 'NoClass::NoMethod' );

        $this->assertInternalType( 'string', $Route->getController() );
        $Route->setParameterDefault( 'Name', 'Value' );
        $this->assertInternalType( 'array', $Route->getParameterDefault() );
        $Route->setParameterPattern( 'Name', 'Pattern' );
        $this->assertInternalType( 'array', $Route->getParameterPattern() );
        $this->assertInternalType( 'string', $Route->getPath() );
    }
}