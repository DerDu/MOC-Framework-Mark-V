<?php
namespace MOC\V\TestSuite\Tests\Component\Mail;

use MOC\V\Component\Mail\Component\Bridge\Repository\EdenPhpImap;
use MOC\V\Component\Mail\Component\Bridge\Repository\EdenPhpPop3;
use MOC\V\Component\Mail\Component\Bridge\Repository\EdenPhpSmtp;

/**
 * Class BridgeTest
 *
 * @package MOC\V\TestSuite\Tests\Component\Mail
 */
class BridgeTest extends \PHPUnit_Framework_TestCase
{

    public function testEmpty()
    {
    }
//    public function testPop3Mail()
//    {
//
//        try {
//            $Bridge = new EdenPhpPop3();
//            $Bridge->connectServer( '', '', '' );
//            $Bridge->disconnectServer();
//        } catch( \Exception $Exception ) {
//            $this->assertInstanceOf( '\MOC\V\Component\Mail\Exception\MailException', $Exception );
//        }
//    }
//
//    public function testSmtpMail()
//    {
//
//        try {
//            $Bridge = new EdenPhpSmtp();
//            $Bridge->connectServer( '', '', '' );
//            $Bridge->disconnectServer();
//        } catch( \Exception $Exception ) {
//            $this->assertInstanceOf( '\MOC\V\Component\Mail\Exception\MailException', $Exception );
//        }
//    }
//
//    public function testImapMail()
//    {
//
//        try {
//            $Bridge = new EdenPhpImap();
//            $Bridge->connectServer( '', '', '' );
//            $Bridge->disconnectServer();
//
//        } catch( \Exception $Exception ) {
//            $this->assertInstanceOf( '\MOC\V\Component\Mail\Exception\MailException', $Exception );
//        }
//    }
}
