<?php
namespace MOC\V\TestSuite\Tests\Component\Template;

use MOC\V\Component\Template\Component\Bridge\Repository\SmartyTemplate;
use MOC\V\Component\Template\Component\Bridge\Repository\TwigTemplate;
use MOC\V\Component\Template\Component\Parameter\Repository\FileParameter;

/**
 * Class BridgeTest
 *
 * @package MOC\V\TestSuite\Tests\Component\Template
 */
class BridgeTest extends \PHPUnit_Framework_TestCase
{

    public function tearDown()
    {

        if (false !== ( $Path = realpath( __DIR__.'/../../../../Component/Template/Component/Bridge/Repository/SmartyTemplate' ) )) {
            foreach (new \DirectoryIterator( $Path ) as $fileInfo) {
                if (!$fileInfo->isDot()) {
                    unlink( $fileInfo->getPathname() );
                }
            }
        }
    }

    public function testTwigTemplate()
    {

        $Bridge = new TwigTemplate();

        $Bridge->loadFile( new FileParameter( __FILE__ ) );

        $Bridge->setVariable( 'Foo', 'Bar' );
        $Bridge->setVariable( 'Foo', array( 'Bar' ) );

        $Bridge->getContent();
    }

    public function testSmartyTemplate()
    {

        $Bridge = new SmartyTemplate();

        $Bridge->loadFile( new FileParameter( __FILE__ ) );

        $Bridge->setVariable( 'Foo', 'Bar' );
        $Bridge->setVariable( 'Foo', array( 'Bar' ) );

        $Bridge->getContent();
    }

}
