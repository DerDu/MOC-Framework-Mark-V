<?php
namespace MOC\V\TestSuite\Tests\Component\Document;

use MOC\V\Component\Document\Component\Bridge\Repository\DomPdf;
use MOC\V\Component\Document\Component\Bridge\Repository\PhpExcel;
use MOC\V\Component\Document\Component\Parameter\Repository\FileParameter;
use MOC\V\Component\Document\Component\Parameter\Repository\PaperOrientationParameter;
use MOC\V\Component\Document\Component\Parameter\Repository\PaperSizeParameter;
use MOC\V\Component\Template\Template;

/**
 * Class BridgeTest
 *
 * @package MOC\V\TestSuite\Tests\Component\Document
 */
class BridgeTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @codeCoverageIgnore
     */
    public function tearDown()
    {

        if (false !== ( $Path = realpath( __DIR__.'/Content' ) )) {
            $Iterator = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator( $Path, \RecursiveDirectoryIterator::SKIP_DOTS ),
                \RecursiveIteratorIterator::CHILD_FIRST
            );
            /** @var \SplFileInfo $FileInfo */
            foreach ($Iterator as $FileInfo) {
                if (
                    $FileInfo->getBasename() != 'README.md'
                    && $FileInfo->getBasename() != 'BridgeTest.tpl'
                    && $FileInfo->getBasename() != 'BridgeTest.twig'
                ) {
                    if ($FileInfo->isFile()) {
                        unlink( $FileInfo->getPathname() );
                    }
                    if ($FileInfo->isDir()) {
                        rmdir( $FileInfo->getPathname() );
                    }
                }
            }
        }

        $Template = new \MOC\V\TestSuite\Tests\Component\Template\BridgeTest();
        $Template->tearDown();
    }

    public function testPhpExcelDocument()
    {

        $Bridge = new PhpExcel();

        $this->assertInstanceOf( 'MOC\V\Component\Document\Component\IBridgeInterface',
            $Bridge->loadFile( new FileParameter( __FILE__ ) )
        );
        $this->assertInstanceOf( 'MOC\V\Component\Document\Component\IBridgeInterface',
            $Bridge->setPaperSizeParameter( new PaperSizeParameter( 'A4' ) )
        );
        $this->assertInstanceOf( 'MOC\V\Component\Document\Component\IBridgeInterface',
            $Bridge->setPaperOrientationParameter( new PaperOrientationParameter( 'PORTRAIT' ) )
        );

        $this->assertInstanceOf( 'MOC\V\Component\Document\Component\IBridgeInterface',
            $Bridge->saveFile()
        );
        $this->assertInstanceOf( 'MOC\V\Component\Document\Component\IBridgeInterface',
            $Bridge->saveFile( new FileParameter( __DIR__.'/Content/BridgeTest-Excel-As.csv' ) )
        );
        $this->assertInstanceOf( 'MOC\V\Component\Document\Component\IBridgeInterface',
            $Bridge->saveFile( new FileParameter( __DIR__.'/Content/BridgeTest-Excel-As.xls' ) )
        );
        $this->assertInstanceOf( 'MOC\V\Component\Document\Component\IBridgeInterface',
            $Bridge->saveFile( new FileParameter( __DIR__.'/Content/BridgeTest-Excel-As.xlsx' ) )
        );

    }

    public function testDomPdfDocument()
    {

        $Bridge = new DomPdf();

        $this->assertInstanceOf( 'MOC\V\Component\Document\Component\IBridgeInterface',
            $Bridge->loadFile( new FileParameter( __DIR__.'/Content/BridgeTest-Twig.pdf' ) )
        );
        $this->assertInstanceOf( 'MOC\V\Component\Document\Component\IBridgeInterface',
            $Bridge->setPaperSizeParameter( new PaperSizeParameter( 'A4' ) )
        );
        $this->assertInstanceOf( 'MOC\V\Component\Document\Component\IBridgeInterface',
            $Bridge->setPaperOrientationParameter( new PaperOrientationParameter( 'PORTRAIT' ) )
        );
        $this->assertInstanceOf( 'MOC\V\Component\Document\Component\IBridgeInterface',
            $Bridge->setContent( Template::getTemplate( __DIR__.'/Content/BridgeTest.twig' ) )
        );

        $this->assertStringStartsWith( '%PDF-', $Bridge->getContent() );

        $this->assertInstanceOf( 'MOC\V\Component\Document\Component\IBridgeInterface',
            $Bridge->saveFile()
        );
        $this->assertInstanceOf( 'MOC\V\Component\Document\Component\IBridgeInterface',
            $Bridge->saveFile( new FileParameter( __DIR__.'/Content/BridgeTest-Twig-As.pdf' ) )
        );

        $this->assertInstanceOf( 'MOC\V\Component\Document\Component\IBridgeInterface',
            $Bridge->loadFile( new FileParameter( __DIR__.'/Content/BridgeTest-Tpl.pdf' ) )
        );
        $this->assertInstanceOf( 'MOC\V\Component\Document\Component\IBridgeInterface',
            $Bridge->setPaperSizeParameter( new PaperSizeParameter( 'A4' ) )
        );
        $this->assertInstanceOf( 'MOC\V\Component\Document\Component\IBridgeInterface',
            $Bridge->setPaperOrientationParameter( new PaperOrientationParameter( 'PORTRAIT' ) )
        );
        $this->assertInstanceOf( 'MOC\V\Component\Document\Component\IBridgeInterface',
            $Bridge->setContent( Template::getTemplate( __DIR__.'/Content/BridgeTest.tpl' ) )
        );

        $this->assertStringStartsWith( '%PDF-', $Bridge->getContent() );

        $this->assertInstanceOf( 'MOC\V\Component\Document\Component\IBridgeInterface',
            $Bridge->saveFile()
        );
        $this->assertInstanceOf( 'MOC\V\Component\Document\Component\IBridgeInterface',
            $Bridge->saveFile( new FileParameter( __DIR__.'/Content/BridgeTest-Tpl-As.pdf' ) )
        );
    }
}
