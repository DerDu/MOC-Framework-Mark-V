<?php
namespace MOC\V\TestSuite\Tests\Component\Documentation;

use MOC\V\Component\Documentation\Component\Parameter\Repository\DirectoryParameter;

/**
 * Class ParameterTest
 *
 * @package MOC\V\TestSuite\Tests\Component\Documentation
 */
class ParameterTest extends \PHPUnit_Framework_TestCase
{

    public function testAbstractParameter()
    {

        /** @var \MOC\V\Component\Documentation\Component\Parameter\Parameter $MockParameter */
        $MockParameter = $this->getMockForAbstractClass( 'MOC\V\Component\Documentation\Component\Parameter\Parameter' );

        $Parameter = new $MockParameter();
        $this->assertInstanceOf( 'MOC\V\Component\Documentation\Component\Parameter\Parameter', $Parameter );

    }

    public function testDirectoryParameter()
    {

        try {
            new DirectoryParameter( null );
        } catch( \Exception $E ) {
            $this->assertInstanceOf( 'MOC\V\Component\Documentation\Component\Exception\Repository\EmptyDirectoryException',
                $E );
        }

        $Parameter = new DirectoryParameter( __DIR__ );
        $this->assertEquals( __DIR__, $Parameter->getDirectory() );

        try {
            $Parameter->setDirectory( __FILE__ );
        } catch( \Exception $E ) {
            $this->assertInstanceOf( 'MOC\V\Component\Documentation\Component\Exception\Repository\TypeDirectoryException',
                $E );
        }

    }
}
