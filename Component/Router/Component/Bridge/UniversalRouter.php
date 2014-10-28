<?php
namespace MOC\V\Component\Router\Component\Bridge;

use MOC\V\Component\Router\Component\IBridgeInterface;
use MOC\V\Component\Router\Component\Option\Repository\RouteOption;
use MOC\V\Core\HttpKernel\HttpKernel;

/**
 * Class UniversalRouter
 *
 * @package MOC\V\Component\Router\Component\Bridge
 */
class UniversalRouter extends Bridge implements IBridgeInterface
{

    private $RouteCollection = array();

    /**
     * @param RouteOption $RouteOption
     *
     * @return IBridgeInterface
     */
    public function addRoute( RouteOption $RouteOption )
    {

        $this->RouteCollection[$RouteOption->getPath()] = $RouteOption;
        return $this;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getRoute()
    {

        return HttpKernel::getRequest()->getPathInfo();
    }

}
