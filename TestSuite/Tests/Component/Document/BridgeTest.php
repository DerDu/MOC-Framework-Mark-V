<?php
namespace MOC\V\TestSuite\Tests\Component\Document;

use MOC\V\Component\Document\Component\Bridge\Repository\DomPdf;
use MOC\V\Component\Document\Component\Bridge\Repository\PhpExcel;
use MOC\V\Component\Document\Component\Parameter\Repository\FileParameter;

/**
 * Class BridgeTest
 *
 * @package MOC\V\TestSuite\Tests\Component\Document
 */
class BridgeTest extends \PHPUnit_Framework_TestCase
{

    public function testPhpExcelDocument()
    {

        $Bridge = new PhpExcel();

        $Bridge->loadFile( new FileParameter( __FILE__ ) );
    }

    public function testDomPdfDocument()
    {

        $Bridge = new DomPdf();

        $Bridge->loadFile( new FileParameter( __FILE__ ) );
        $Bridge->setContent( '<html><body>Test</body></html>' );

        $this->assertStringStartsWith( '%PDF-', $Bridge->getContent() );
    }
}
