<?php
namespace MOC\V\TestSuite\Tests\Component\Database;

use MOC\V\Component\Database\Component\Exception\ComponentException;
use MOC\V\Component\Database\Exception\DatabaseException;

class ExceptionTest extends \PHPUnit_Framework_TestCase
{

    /** @runTestsInSeparateProcesses */
    public function testDatabaseException()
    {

        try {
            throw new DatabaseException();
        } catch( \Exception $E ) {
            $this->assertInstanceOf( '\MOC\V\Component\Database\Exception\DatabaseException', $E );
        }

        try {
            throw new ComponentException();
        } catch( \Exception $E ) {
            $this->assertInstanceOf( '\MOC\V\Component\Database\Component\Exception\ComponentException', $E );
        }

    }

}
