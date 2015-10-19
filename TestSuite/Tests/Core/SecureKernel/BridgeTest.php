<?php
namespace MOC\V\TestSuite\Tests\Core\SecureKernel;

use MOC\V\Core\SecureKernel\Component\Bridge\Repository\SFTP;
use MOC\V\TestSuite\AbstractTestCase;

/**
 * Class BridgeTest
 *
 * @package MOC\V\TestSuite\Tests\Core\SecureKernel
 */
class BridgeTest extends AbstractTestCase
{

    /**
     * @throws \MOC\V\Core\SecureKernel\Component\Exception\ComponentException
     */
    public function testSFTP()
    {

        $Bridge = new SFTP();

        $Bridge->openConnection('host', 22);
        try {
            $Bridge->loginCredentialKey('user', __FILE__, 'password');
        } catch (\Exception $Exception) {
            $this->assertInstanceOf('\MOC\V\Core\SecureKernel\Component\Exception\ComponentException', $Exception);
        }
        try {
            $Bridge->changeDirectory('.');
        } catch (\Exception $Exception) {
            $this->assertInstanceOf('\MOC\V\Core\SecureKernel\Component\Exception\ComponentException', $Exception);
        }
        $Bridge->closeConnection();
    }
}
