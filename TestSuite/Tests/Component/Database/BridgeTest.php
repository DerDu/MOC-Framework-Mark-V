<?php
namespace MOC\V\TestSuite\Tests\Component\Database;

use MOC\V\Component\Database\Component\Bridge\Doctrine2DBAL;
use MOC\V\Component\Database\Component\Exception\ComponentException;
use MOC\V\Component\Database\Component\Option\DatabaseOption;
use MOC\V\Component\Database\Component\Option\DriverOption;
use MOC\V\Component\Database\Component\Option\HostOption;
use MOC\V\Component\Database\Component\Option\PasswordOption;
use MOC\V\Component\Database\Component\Option\PortOption;
use MOC\V\Component\Database\Component\Option\UsernameOption;

class BridgeTest extends \PHPUnit_Framework_TestCase
{

    /** @runTestsInSeparateProcesses */
    public function testDoctrine2DBAL()
    {

        $Bridge = new Doctrine2DBAL();

        try {
            $Bridge->registerConnection(
                new UsernameOption( '' ),
                new PasswordOption( '' ),
                new DatabaseOption( '' ),
                new DriverOption( DriverOption::DRIVER_PDO_MYSQL ),
                new HostOption( null ),
                new PortOption( null )
            );
        } catch( \Exception $E ) {
            $this->assertInstanceOf( 'MOC\V\Component\Database\Component\Exception\ComponentException', $E );
        }

        $Bridge->registerConnection(
            new UsernameOption( '' ),
            new PasswordOption( '' ),
            new DatabaseOption( '' ),
            new DriverOption( DriverOption::DRIVER_PDO_SQLITE ),
            new HostOption( 'sqlite::memory:' ),
            new PortOption( null )
        );

        $this->assertInstanceOf( 'MOC\V\Component\Database\Component\Bridge\IBridgeInterface',
            $Bridge->prepareStatement( "SELECT * FROM UnitTest WHERE Id = ?" )
        );
        $this->assertInstanceOf( 'MOC\V\Component\Database\Component\Bridge\IBridgeInterface',
            $Bridge->defineParameter( 1 )
        );
        try {
            try {
                $Bridge->executeRead();
            } catch( \Exception $E ) {
                throw new ComponentException( $E->getMessage(), $E->getCode(), $E );
            }
        } catch( \Exception $E ) {
            $this->assertInstanceOf( 'MOC\V\Component\Database\Component\Exception\ComponentException', $E );
        }
        try {
            try {
                $Bridge->executeWrite();
            } catch( \Exception $E ) {
                throw new ComponentException( $E->getMessage(), $E->getCode(), $E );
            }
        } catch( \Exception $E ) {
            $this->assertInstanceOf( 'MOC\V\Component\Database\Component\Exception\ComponentException', $E );
        }
    }

}
