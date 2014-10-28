<?php
namespace MOC\V\TestSuite\Tests\Core\AutoLoader;

use MOC\V\Core\AutoLoader\Component\Exception\ComponentException;
use MOC\V\Core\AutoLoader\Component\Exception\DirectoryNotFoundException;
use MOC\V\Core\AutoLoader\Component\Exception\EmptyDirectoryException;
use MOC\V\Core\AutoLoader\Component\Exception\EmptyNamespaceException;
use MOC\V\Core\AutoLoader\Exception\AutoLoaderException;

class ExceptionTest extends \PHPUnit_Framework_TestCase
{

    public function testAutoLoaderException()
    {

        try {
            throw new AutoLoaderException();
        } catch( \Exception $E ) {
            $this->assertInstanceOf( '\MOC\V\Core\AutoLoader\Exception\AutoLoaderException', $E );
        }

        try {
            throw new ComponentException();
        } catch( \Exception $E ) {
            $this->assertInstanceOf( '\MOC\V\Core\AutoLoader\Component\Exception\ComponentException', $E );
        }

        try {
            throw new DirectoryNotFoundException();
        } catch( \Exception $E ) {
            $this->assertInstanceOf( '\MOC\V\Core\AutoLoader\Component\Exception\DirectoryNotFoundException', $E );
        }

        try {
            throw new EmptyDirectoryException();
        } catch( \Exception $E ) {
            $this->assertInstanceOf( '\MOC\V\Core\AutoLoader\Component\Exception\EmptyDirectoryException', $E );
        }

        try {
            throw new EmptyNamespaceException();
        } catch( \Exception $E ) {
            $this->assertInstanceOf( '\MOC\V\Core\AutoLoader\Component\Exception\EmptyNamespaceException', $E );
        }

    }

}
