<?php
namespace MOC\V\TestSuite\Tests\Component\Documentation;

use MOC\V\Component\Documentation\Component\Bridge\ApiGenDocumentation;
use MOC\V\Component\Documentation\Component\Option\Repository\DirectoryOption;

/**
 * Class BridgeTest
 *
 * @package MOC\V\TestSuite\Tests\Component\Documentation
 */
class BridgeTest extends \PHPUnit_Framework_TestCase
{

    public function testApiGen()
    {

        new ApiGenDocumentation(
            new DirectoryOption( __DIR__ ),
            new DirectoryOption( __DIR__.'/Content/' )
        );
    }

}
