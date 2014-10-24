<?php
namespace MOC\V\Component\Router\Component\Option;

/**
 * Class RouteOption
 *
 * @package MOC\V\Component\Router\Component\Option
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
     * @return null|string
     */
    public function getController()
    {

        return $this->Controller;
    }

    /**
     * @param null|string $Controller
     */
    private function setController( $Controller )
    {

        $this->Controller = $Controller;
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

    /**
     * @param null|string $Path
     */
    private function setPath( $Path )
    {

        $this->Path = $Path;
    }

}
