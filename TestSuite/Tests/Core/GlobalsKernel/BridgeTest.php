<?php
namespace MOC\V\TestSuite\Tests\Core\GlobalsKernel;

use MOC\V\Core\GlobalsKernel\Component\Bridge\Repository\UniversalGlobals;
use MOC\V\TestSuite\AbstractTestCase;

/**
 * Class BridgeTest
 *
 * @package MOC\V\TestSuite\Tests\Core\GlobalsKernel
 */
class BridgeTest extends AbstractTestCase
{

    public function testUniversalGlobals()
    {

        $Bridge = new UniversalGlobals();

        $this->assertInternalType('array', $Bridge->getGET());
        $this->assertInternalType('array', $Bridge->getPOST());
        $this->assertInternalType('array', $Bridge->getSESSION());
        $this->assertInternalType('array', $Bridge->getSERVER());
    }
}
