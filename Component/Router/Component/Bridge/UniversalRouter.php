<?php
namespace MOC\V\Component\Router\Component\Bridge;

use MOC\V\Component\Router\Component\IBridgeInterface;
use MOC\V\Component\Router\Component\Option\RouteOption;

/**
 * Class UniversalRouter
 *
 * @package MOC\V\Component\Router\Component\Bridge
 */
class UniversalRouter extends Bridge implements IBridgeInterface
{

    /**
     * @param RouteOption $RouteOption
     *
     * @return IBridgeInterface
     */
    public function addRoute( RouteOption $RouteOption )
    {
        // TODO: Implement addRoute() method.
        return $this;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getRoute()
    {
        // TODO: Implement getRoute() method.
        return '';
    }

}
