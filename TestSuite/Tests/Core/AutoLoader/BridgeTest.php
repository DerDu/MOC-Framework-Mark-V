<?php
namespace MOC\V\TestSuite\Tests\Core\AutoLoader;

use MOC\V\Core\AutoLoader\Component\Bridge\UniversalNamespace;
use MOC\V\Core\AutoLoader\Component\Option\DirectoryOption;
use MOC\V\Core\AutoLoader\Component\Option\NamespaceOption;

class BridgeTest extends \PHPUnit_Framework_TestCase
{

    /** @runTestsInSeparateProcesses */
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
            $Bridge->loadSourceFile( 'IErrorInterface' )
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
