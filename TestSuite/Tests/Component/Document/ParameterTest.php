<?php
namespace MOC\V\TestSuite\Tests\Component\Document;

/**
 * Class ParameterTest
 *
 * @package MOC\V\TestSuite\Tests\Component\Document
 */
class ParameterTest extends \PHPUnit_Framework_TestCase
{

    public function testAbstractParameter()
    {

        /** @var \MOC\V\Component\Document\Component\Parameter\Parameter $MockParameter */
        $MockParameter = $this->getMockForAbstractClass( 'MOC\V\Component\Document\Component\Parameter\Parameter' );

        $Parameter = new $MockParameter();
        $this->assertInstanceOf( 'MOC\V\Component\Document\Component\Parameter\Parameter', $Parameter );

    }
}
