<?php
namespace MOC\V\TestSuite\Tests\Component\Documentation;

use MOC\V\Component\Documentation\Component\Bridge\Repository\ApiGenDocumentation;
use MOC\V\Component\Documentation\Component\Parameter\Repository\DirectoryParameter;

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
            new DirectoryParameter( __DIR__ ),
            new DirectoryParameter( __DIR__.'/Content/' )
        );
    }

}
