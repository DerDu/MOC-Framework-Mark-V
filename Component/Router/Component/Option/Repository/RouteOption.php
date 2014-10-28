<?php
namespace MOC\V\Component\Router\Component\Option\Repository;

use MOC\V\Component\Router\Component\Exception\ComponentException;
use MOC\V\Component\Router\Component\IOptionInterface;
use MOC\V\Component\Router\Component\Option\Option;

/**
 * Class RouteOption
 *
 * @package MOC\V\Component\Router\Component\Option\Repository
 */
class RouteOption extends Option implements IOptionInterface
{

    /** @var null|string $Path */
    private $Path = null;
    /** @var null|string $Controller */
    private $Controller = null;
    /** @var array $ParameterDefault */
    private $ParameterDefault = array();
    /** @var array $ParameterPattern */
    private $ParameterPattern = array();

    /**
     * @param string $Path
     * @param string $Controller
     */
    function __construct( $Path, $Controller )
    {

        $this->setPath( $Path );
        $this->setController( $Controller );
    }

    /**
     * @param null|string $Path
     */
    private function setPath( $Path )
    {

        $this->Path = $Path;
    }

    /**
     * @param null|string $Controller
     *
     * @throws ComponentException
     */
    private function setController( $Controller )
    {

        if (false === strpos( $Controller, '::' )) {
            throw new ComponentException( $Controller );
        }
        $this->Controller = $Controller;
    }

    /**
     * @return string
     */
    public function getClass()
    {

        $List = explode( '::', $this->getController(), 2 );
        return current( $List );
    }

    /**
     * @return null|string
     */
    public function getController()
    {

        return $this->Controller;
    }

    /**
     * @return string
     */
    public function getMethod()
    {

        $List = explode( '::', $this->getController(), 2 );
        return end( $List );
    }

    /**
     * @return array
     */
    public function getParameterDefault()
    {

        return $this->ParameterDefault;
    }

    /**
     * @param string $Name
     * @param mixed  $Value
     */
    public function setParameterDefault( $Name, $Value )
    {

        $this->ParameterDefault[$Name] = $Value;
    }

    /**
     * @return array
     */
    public function getParameterPattern()
    {

        return $this->ParameterPattern;
    }

    /**
     * @param string $Name
     * @param string $Pattern
     */
    public function setParameterPattern( $Name, $Pattern )
    {

        $this->ParameterPattern[$Name] = $Pattern;
    }

    /**
     * @return null|string
     */
    public function getPath()
    {

        return $this->Path;
    }

}
