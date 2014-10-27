<?php
namespace MOC\V\TestSuite\Tests\Component\Documentation;

use MOC\V\Component\Documentation\Component\Exception\ComponentException;
use MOC\V\Component\Documentation\Component\Exception\EmptyDirectoryException;
use MOC\V\Component\Documentation\Component\Exception\TypeDirectoryException;
use MOC\V\Component\Documentation\Exception\DocumentationException;

class ExceptionTest extends \PHPUnit_Framework_TestCase
{

    /** @runTestsInSeparateProcesses */
    public function testDocumentationException()
    {

        try {
            throw new DocumentationException();
        } catch( \Exception $E ) {
            $this->assertInstanceOf( '\MOC\V\Component\Documentation\Exception\DocumentationException', $E );
        }

        try {
            throw new ComponentException();
        } catch( \Exception $E ) {
            $this->assertInstanceOf( '\MOC\V\Component\Documentation\Component\Exception\ComponentException', $E );
        }

        try {
            throw new EmptyDirectoryException();
        } catch( \Exception $E ) {
            $this->assertInstanceOf( '\MOC\V\Component\Documentation\Component\Exception\EmptyDirectoryException', $E );
        }

        try {
            throw new TypeDirectoryException();
        } catch( \Exception $E ) {
            $this->assertInstanceOf( '\MOC\V\Component\Documentation\Component\Exception\TypeDirectoryException', $E );
        }
    }

}
