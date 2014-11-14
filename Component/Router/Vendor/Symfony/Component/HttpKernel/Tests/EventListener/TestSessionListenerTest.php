<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Tests\EventListener;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\HttpKernelInterface;

/**
 * SessionListenerTest.
 *
 * Tests SessionListener.
 *
 * @author Bulat Shakirzyanov <mallluhuct@gmail.com>
 */
class TestSessionListenerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var TestSessionListener
     */
    private $listener;

    /**
     * @var SessionInterface
     */
    private $session;

    public function testShouldSaveMasterRequestSession()
    {
        $this->sessionHasBeenStarted();
        $this->sessionMustBeSaved();

        $this->filterResponse(new Request());
    }

    private function sessionHasBeenStarted()
    {

        $this->session->expects( $this->once() )
            ->method( 'isStarted' )
            ->will( $this->returnValue( true ) );
    }

    private function sessionMustBeSaved()
    {

        $this->session->expects( $this->once() )
            ->method( 'save' );
    }

    private function filterResponse(Request $request, $type = HttpKernelInterface::MASTER_REQUEST)
    {
        $request->setSession($this->session);
        $response = new Response();
        $kernel = $this->getMock('Symfony\Component\HttpKernel\HttpKernelInterface');
        $event = new FilterResponseEvent($kernel, $request, $type, $response);

        $this->listener->onKernelResponse($event);

        $this->assertSame($response, $event->getResponse());

        return $response;
    }

    public function testShouldNotSaveSubRequestSession()
    {

        $this->sessionMustNotBeSaved();

        $this->filterResponse( new Request(), HttpKernelInterface::SUB_REQUEST );
    }

    private function sessionMustNotBeSaved()
    {
        $this->session->expects($this->never())
            ->method('save');
    }

    public function testDoesNotDeleteCookieIfUsingSessionLifetime()
    {

        $this->sessionHasBeenStarted();

        $params = session_get_cookie_params();
        session_set_cookie_params( 0, $params['path'], $params['domain'], $params['secure'], $params['httponly'] );

        $response = $this->filterResponse( new Request(), HttpKernelInterface::MASTER_REQUEST );
        $cookies = $response->headers->getCookies();

        $this->assertEquals( 0, reset( $cookies )->getExpiresTime() );
    }

    public function testUnstartedSessionIsNotSave()
    {

        $this->sessionHasNotBeenStarted();
        $this->sessionMustNotBeSaved();

        $this->filterResponse( new Request() );
    }

    private function sessionHasNotBeenStarted()
    {
        $this->session->expects($this->once())
            ->method('isStarted')
            ->will($this->returnValue(false));
    }

    protected function setUp()
    {

        $this->listener = $this->getMockForAbstractClass( 'Symfony\Component\HttpKernel\EventListener\TestSessionListener' );
        $this->session = $this->getSession();
    }

    private function getSession()
    {
        $mock = $this->getMockBuilder('Symfony\Component\HttpFoundation\Session\Session')
            ->disableOriginalConstructor()
            ->getMock();

        // set return value for getName()
        $mock->expects($this->any())->method('getName')->will($this->returnValue('MOCKSESSID'));

        return $mock;
    }
}
