<?php
namespace MOC\V\TestSuite\Tests\Component\Documentation;

use MOC\V\Component\Documentation\Component\Bridge\ApiGen;
use MOC\V\Component\Documentation\Component\Option\Repository\DirectoryOption;

/**
 * Class BridgeTest
 *
 * @package MOC\V\TestSuite\Tests\Component\Documentation
 */
class BridgeTest extends \PHPUnit_Framework_TestCase
{

    /** @runTestsInSeparateProcesses */
    public function testApiGen()
    {

        $Bridge = new ApiGen(
            new DirectoryOption( __DIR__.'/../' ),
            new DirectoryOption( __DIR__.'/../../../TestDocumentation/' )
        );
        //$Bridge->createDocumentation();
    }

}
