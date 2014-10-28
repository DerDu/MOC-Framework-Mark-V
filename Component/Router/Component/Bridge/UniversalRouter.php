<?php
namespace MOC\V\Component\Router\Component\Bridge;

use MOC\V\Component\Router\Component\Exception\ComponentException;
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

        $Controller = $this->handleController();

        if (!is_callable( $Controller )) {
            throw new ComponentException( $Controller );
        }

        $Arguments = $this->handleArguments( $Controller );
        $Response = call_user_func_array( $Controller, $Arguments );

        return $Response;
    }

    /**
     * @return callable
     * @throws ComponentException
     */
    private function handleController()
    {

        /** @var RouteOption $Route */
        $Route = $this->RouteCollection[HttpKernel::getRequest()->getPathInfo()];
        $Class = $Route->getClass();
        if (!class_exists( $Class, true )) {
            throw new ComponentException( $Class );
        }
        $Method = $Route->getMethod();

        $Object = new $Class();
        if (!method_exists( $Object, $Method )) {
            throw new ComponentException( $Method );
        }

        return array( $Object, $Method );
    }

    /**
     * @param callable $Controller
     *
     * @return array
     * @throws ComponentException
     */
    private function handleArguments( $Controller )
    {

        $Reflection = new \ReflectionMethod( $Controller[0], $Controller[1] );
        $MethodParameters = $Reflection->getParameters();
        $RequestParameters = HttpKernel::getRequest()->getParameterArray();
        $MethodArguments = array();
        /** @var \ReflectionParameter $MethodParameter */
        foreach ((array)$MethodParameters as $MethodParameter) {
            if (array_key_exists( $MethodParameter->name, $RequestParameters )) {
                $MethodArguments[] = $RequestParameters[$MethodParameter->name];
            } elseif ($MethodParameter->isDefaultValueAvailable()) {
                $MethodArguments[] = $MethodParameter->getDefaultValue();
            } else {
                throw new ComponentException( $MethodParameter->name );
            }
        }

        return $MethodArguments;
    }
}
