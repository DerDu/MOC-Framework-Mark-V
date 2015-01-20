<?php
namespace MOC\V\TestSuite\Tests\Component\Document;

use MOC\V\Component\Document\Component\Bridge\Repository\PhpExcel;

/**
 * Class BridgeTest
 *
 * @package MOC\V\TestSuite\Tests\Component\Document
 */
class BridgeTest extends \PHPUnit_Framework_TestCase
{

    public function testPhpExcelDocument()
    {

        new PhpExcel();
    }
}
