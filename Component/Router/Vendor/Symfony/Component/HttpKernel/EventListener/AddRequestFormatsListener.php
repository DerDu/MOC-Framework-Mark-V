<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Adds configured formats to each request
 *
 * @author Gildas Quemener <gildas.quemener@gmail.com>
 */
class AddRequestFormatsListener implements EventSubscriberInterface
{

    /**
     * @var array
     */
    protected $formats;

    /**
     * @param array $formats
     */
    public function __construct(array $formats)
    {

        $this->formats = $formats;
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {

        return array(KernelEvents::REQUEST => 'onKernelRequest');
    }

    /**
     * Adds request formats
     *
     * @param GetResponseEvent $event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {

        foreach ($this->formats as $format => $mimeTypes) {
            $event->getRequest()->setFormat($format, $mimeTypes);
        }
    }
}
