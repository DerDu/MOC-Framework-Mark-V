<?php
namespace MOC\V\TestSuite\Tests\Core\FileSystem;

use MOC\V\Core\FileSystem\Component\Bridge\UniversalFileLoader;
use MOC\V\Core\FileSystem\Component\Bridge\UniversalFileWriter;
use MOC\V\Core\FileSystem\Component\Option\FileOption;

class BridgeTest extends \PHPUnit_Framework_TestCase
{

    /** @runTestsInSeparateProcesses */
    public function testUniversalFileLoader()
    {

        $Bridge = new UniversalFileLoader(
            new FileOption( __FILE__ )
        );
    }

    /** @runTestsInSeparateProcesses */
    public function testUniversalFileWriter()
    {

        $Bridge = new UniversalFileWriter(
            new FileOption( __FILE__ )
        );
    }
}
