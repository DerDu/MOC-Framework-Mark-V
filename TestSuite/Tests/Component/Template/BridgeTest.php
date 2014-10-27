<?php
namespace MOC\V\TestSuite\Tests\Component\Template;

use MOC\V\Component\Template\Component\Bridge\TwigTemplate;
use MOC\V\Component\Template\Component\Option\Repository\FileOption;

/**
 * Class BridgeTest
 *
 * @package MOC\V\TestSuite\Tests\Component\Template
 */
class BridgeTest extends \PHPUnit_Framework_TestCase
{

    /** @runTestsInSeparateProcesses */
    public function testTwigTemplate()
    {

        $Bridge = new TwigTemplate();

        $Bridge->loadFile( new FileOption( __FILE__ ) );

        $Bridge->setVariable( 'Foo', 'Bar' );
        $Bridge->setVariable( 'Foo', array( 'Bar' ) );

        $Bridge->getContent();
    }

}
