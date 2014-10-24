<?php
namespace MOC\V\TestSuite\Tests\Component\Template;

use MOC\V\Component\Template\Component\Exception\ComponentException;
use MOC\V\Component\Template\Component\Exception\EmptyFileException;
use MOC\V\Component\Template\Component\Exception\TypeFileException;
use MOC\V\Component\Template\Exception\TemplateException;
use MOC\V\Component\Template\Exception\TemplateTypeException;

class ExceptionTest extends \PHPUnit_Framework_TestCase
{

    /** @runTestsInSeparateProcesses */
    public function testTemplateException()
    {

        try {
            throw new TemplateException();
        } catch( \Exception $E ) {
            $this->assertInstanceOf( '\MOC\V\Component\Template\Exception\TemplateException', $E );
        }

        try {
            throw new TemplateTypeException();
        } catch( \Exception $E ) {
            $this->assertInstanceOf( '\MOC\V\Component\Template\Exception\TemplateTypeException', $E );
        }

        try {
            throw new ComponentException();
        } catch( \Exception $E ) {
            $this->assertInstanceOf( '\MOC\V\Component\Template\Component\Exception\ComponentException', $E );
        }

        try {
            throw new EmptyFileException();
        } catch( \Exception $E ) {
            $this->assertInstanceOf( '\MOC\V\Component\Template\Component\Exception\EmptyFileException', $E );
        }

        try {
            throw new TypeFileException();
        } catch( \Exception $E ) {
            $this->assertInstanceOf( '\MOC\V\Component\Template\Component\Exception\TypeFileException', $E );
        }


    }

}
