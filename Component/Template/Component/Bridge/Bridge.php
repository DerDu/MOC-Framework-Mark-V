<?php
namespace MOC\V\Component\Template\Component\Bridge;

use MOC\V\Component\Template\Component\Option\FileOption;

/**
 * Interface IBridgeInterface
 *
 * @package MOC\V\Component\Template\Component\Bridge
 */
interface IBridgeInterface
{

    /**
     * @param FileOption $Location
     *
     * @return IBridgeInterface
     */
    public function loadFile( FileOption $Location );

    /**
     * @param string $Identifier
     * @param mixed  $Value
     *
     * @return IBridgeInterface
     */
    public function setVariable( $Identifier, $Value );

    /**
     * @return string
     */
    public function getContent();
}

/**
 * Class Bridge
 *
 * @package MOC\V\Component\Template\Component\Bridge
 */
abstract class Bridge implements IBridgeInterface
{

    /** @var array $VariableList */
    protected $VariableList = array();

    /**
     * @param string $Identifier
     * @param mixed  $Value
     *
     * @return IBridgeInterface
     */
    public function setVariable( $Identifier, $Value )
    {

        $this->VariableList[$Identifier] = $Value;
        return $this;
    }
}
