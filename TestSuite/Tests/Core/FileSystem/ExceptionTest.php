<?php
namespace MOC\V\TestSuite\Tests\Core\FileSystem;

use MOC\V\Core\FileSystem\Component\Exception\ComponentException;
use MOC\V\Core\FileSystem\Component\Exception\EmptyDirectoryException;
use MOC\V\Core\FileSystem\Component\Exception\EmptyFileException;
use MOC\V\Core\FileSystem\Component\Exception\MissingDirectoryException;
use MOC\V\Core\FileSystem\Component\Exception\MissingFileException;
use MOC\V\Core\FileSystem\Component\Exception\TypeDirectoryException;
use MOC\V\Core\FileSystem\Component\Exception\TypeFileException;
use MOC\V\Core\FileSystem\Exception\FileSystemException;

class ExceptionTest extends \PHPUnit_Framework_TestCase
{

    /** @runTestsInSeparateProcesses */
    public function testFileSystemException()
    {

        try {
            throw new FileSystemException();
        } catch( \Exception $E ) {
            $this->assertInstanceOf( '\MOC\V\Core\FileSystem\Exception\FileSystemException', $E );
        }

        try {
            throw new ComponentException();
        } catch( \Exception $E ) {
            $this->assertInstanceOf( '\MOC\V\Core\FileSystem\Component\Exception\ComponentException', $E );
        }

        try {
            throw new EmptyDirectoryException();
        } catch( \Exception $E ) {
            $this->assertInstanceOf( '\MOC\V\Core\FileSystem\Component\Exception\EmptyDirectoryException', $E );
        }

        try {
            throw new EmptyFileException();
        } catch( \Exception $E ) {
            $this->assertInstanceOf( '\MOC\V\Core\FileSystem\Component\Exception\EmptyFileException', $E );
        }

        try {
            throw new MissingDirectoryException();
        } catch( \Exception $E ) {
            $this->assertInstanceOf( '\MOC\V\Core\FileSystem\Component\Exception\MissingDirectoryException', $E );
        }

        try {
            throw new MissingFileException();
        } catch( \Exception $E ) {
            $this->assertInstanceOf( '\MOC\V\Core\FileSystem\Component\Exception\MissingFileException', $E );
        }

        try {
            throw new TypeDirectoryException();
        } catch( \Exception $E ) {
            $this->assertInstanceOf( '\MOC\V\Core\FileSystem\Component\Exception\TypeDirectoryException', $E );
        }

        try {
            throw new TypeFileException();
        } catch( \Exception $E ) {
            $this->assertInstanceOf( '\MOC\V\Core\FileSystem\Component\Exception\TypeFileException', $E );
        }

    }

}
