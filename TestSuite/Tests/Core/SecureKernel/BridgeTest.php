<?php
namespace MOC\V\TestSuite\Tests\Core\SecureKernel;

use MOC\V\Core\SecureKernel\Component\Bridge\Repository\SFTP;

/**
 * Class BridgeTest
 *
 * @package MOC\V\TestSuite\Tests\Core\SecureKernel
 */
class BridgeTest extends \PHPUnit_Framework_TestCase
{

    public function testUniversalRequest()
    {

        $Bridge = new SFTP();

        $Bridge->openConnection( '127.0.0.1', 22 );
        $Bridge->loginCredentialKey( 'test', __DIR__.'/oasis-sftp-ssh2-rsa-4096-private.ppk', 'oasis' );
        //$Bridge->loginCredential( 'test','test' );
        var_dump( $Bridge->listDirectory() );
        $Bridge->closeConnection();

//        $this->assertInternalType( 'string', $Bridge->getPathBase() );
//        $this->assertInternalType( 'string', $Bridge->getPathInfo() );
//        $this->assertInternalType( 'string', $Bridge->getUrlBase() );
//        $this->assertInternalType( 'string', $Bridge->getPort() );
//
//        $this->assertInternalType( 'array', $Bridge->getRequestGETArray() );
//        $this->assertInternalType( 'array', $Bridge->getRequestPOSTArray() );
//        $this->assertInternalType( 'array', $Bridge->getRequestCUSTOMArray() );
//        $this->assertInternalType( 'array', $Bridge->getParameterArray() );
    }

}
