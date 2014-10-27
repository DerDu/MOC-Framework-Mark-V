<?php
namespace MOC\V\Component\Router\Component;

use MOC\V\Component\Router\Component\Option\Repository\RouteOption;

/**
 * Interface IBridgeInterface
 *
 * @package MOC\V\Component\Router\Component\Bridge
 */
interface IBridgeInterface
{

    /**
     * @param \MOC\V\Component\Router\Component\Option\Repository\RouteOption $RouteOption
     *
     * @return IBridgeInterface
     */
    public function addRoute( RouteOption $RouteOption );

    /**
     * @return string
     * @throws \Exception
     */
    public function getRoute();
}
