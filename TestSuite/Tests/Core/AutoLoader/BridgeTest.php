<?php
namespace MOC\V\TestSuite\Tests\Core\AutoLoader;

use MOC\V\Core\AutoLoader\Component\Bridge\UniversalNamespace;
use MOC\V\Core\AutoLoader\Component\Option\Repository\DirectoryOption;
use MOC\V\Core\AutoLoader\Component\Option\Repository\NamespaceOption;

class BridgeTest extends \PHPUnit_Framework_TestCase
{

    public function testUniversalNamespace()
    {

        $Bridge = new UniversalNamespace();

        $this->assertInstanceOf( 'MOC\V\Core\AutoLoader\Component\IBridgeInterface',
            $Bridge->addNamespaceDirectoryMapping(
                new NamespaceOption( __NAMESPACE__ ), new DirectoryOption( __DIR__ ) )
        );
        $this->assertInstanceOf( 'MOC\V\Core\AutoLoader\Component\IBridgeInterface',
            $Bridge->addNamespaceDirectoryMapping(
                new NamespaceOption( '\MOC\V' ), new DirectoryOption( __DIR__.'/../../../../' ) )
        );
        $this->assertInstanceOf( 'MOC\V\Core\AutoLoader\Component\IBridgeInterface',
            $Bridge->registerLoader()
        );

        $this->assertFalse(
            $Bridge->loadSourceFile( 'Error' )
        );
        $this->assertFalse(
            $Bridge->loadSourceFile( 'MOC\V\NotAvailableClass' )
        );
        $this->assertFalse(
            $Bridge->loadSourceFile( 'IErrorInterface' )
        );
        $this->assertFalse(
            $Bridge->loadSourceFile( 'MOC\V\INotAvailableInterface' )
        );

        $this->assertTrue(
            $Bridge->loadSourceFile( __CLASS__ )
        );
        $this->assertTrue(
            $Bridge->loadSourceFile( 'MOC\V\Core\AutoLoader\Component\IBridgeInterface' )
        );

        $this->assertInstanceOf( 'MOC\V\Core\AutoLoader\Component\IBridgeInterface',
            $Bridge->unregisterLoader()
        );

    }

}
