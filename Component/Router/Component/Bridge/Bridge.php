<?php
namespace MOC\V\Component\Router\Component\Bridge;

use MOC\V\Component\Router\Component\Option\RouteOption;

/**
 * Interface IBridgeInterface
 *
 * @package MOC\V\Component\Router\Component\Bridge
 */
interface IBridgeInterface
{

    /**
     * @param RouteOption $RouteOption
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

/**
 * Class Bridge
 *
 * @package MOC\V\Component\Router\Component\Bridge
 */
abstract class Bridge implements IBridgeInterface
{

}
