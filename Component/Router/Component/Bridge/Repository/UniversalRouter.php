<?php
namespace MOC\V\Component\Router\Component\Bridge\Repository;

use MOC\V\Component\Router\Component\Bridge\Bridge;
use MOC\V\Component\Router\Component\Exception\ComponentException;
use MOC\V\Component\Router\Component\Exception\Repository\MissingParameterException;
use MOC\V\Component\Router\Component\IBridgeInterface;
use MOC\V\Component\Router\Component\Parameter\Repository\RouteParameter;
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
     * @param \MOC\V\Component\Router\Component\Parameter\Repository\RouteParameter $RouteOption
     *
     * @return IBridgeInterface
     */
    public function addRoute( RouteParameter $RouteOption )
    {

        $this->RouteCollection[$RouteOption->getPath()] = $RouteOption;
        return $this;
    }

    /**
     * @return string
     * @throws ComponentException
     */
    public function getRoute()
    {

        /** @var RouteParameter $Route */
        $Route = $this->RouteCollection[HttpKernel::getRequest()->getPathInfo()];

        $Controller = $this->handleController( $Route );

        if (!is_callable( $Controller )) {
            // @codeCoverageIgnoreStart
            throw new ComponentException( $Controller );
            // @codeCoverageIgnoreEnd
        }

        $Arguments = $this->handleArguments( $Controller, $Route );
        $Response = call_user_func_array( $Controller, $Arguments );

        return $Response;
    }

    /**
     * @param RouteParameter $Route
     *
     * @throws ComponentException
     * @return callable
     */
    private function handleController( RouteParameter $Route )
    {

        $Class = $Route->getClass();
        if (!class_exists( $Class, true )) {
            // @codeCoverageIgnoreStart
            throw new ComponentException( $Class );
            // @codeCoverageIgnoreEnd
        }
        $Method = $Route->getMethod();

        $Object = new $Class();
        if (!method_exists( $Object, $Method )) {
            // @codeCoverageIgnoreStart
            throw new ComponentException( $Method );
            // @codeCoverageIgnoreEnd
        }

        return array( $Object, $Method );
    }

    /**
     * @param callable                                                              $Controller
     * @param \MOC\V\Component\Router\Component\Parameter\Repository\RouteParameter $Route
     *
     * @throws \MOC\V\Component\Router\Component\Exception\Repository\MissingParameterException
     * @return array
     */
    private function handleArguments( $Controller, RouteParameter $Route )
    {

        $Reflection = new \ReflectionMethod( $Controller[0], $Controller[1] );
        $MethodParameters = $Reflection->getParameters();
        $RequestParameters = HttpKernel::getRequest()->getParameterArray();
        $MethodArguments = array();
        /** @var \ReflectionParameter $MethodParameter */
        foreach ((array)$MethodParameters as $MethodParameter) {
            if (array_key_exists( $MethodParameter->name, $RequestParameters )) {
                $MethodArguments[] = $RequestParameters[$MethodParameter->name];
            } elseif (array_key_exists( $MethodParameter->name, $Route->getParameterDefault() )) {
                $MethodArguments[] = $Route->getParameterDefault( $MethodParameter->name );
            } elseif ($MethodParameter->isDefaultValueAvailable()) {
                $MethodArguments[] = $MethodParameter->getDefaultValue();
            } else {
                throw new MissingParameterException( $MethodParameter->name );
            }
        }
        return $MethodArguments;
    }
}
