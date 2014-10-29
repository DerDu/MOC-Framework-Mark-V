<?php
namespace MOC\V\Component\Router\Component;

use MOC\V\Component\Router\Component\Parameter\Repository\RouteParameter;

/**
 * Interface IBridgeInterface
 *
 * @package MOC\V\Component\Router\Component
 */
interface IBridgeInterface
{

    /**
     * @param RouteParameter $RouteOption
     *
     * @return IBridgeInterface
     */
    public function addRoute( RouteParameter $RouteOption );

    /**
     * @return string
     * @throws \Exception
     */
    public function getRoute();
}
