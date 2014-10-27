<?php
namespace MOC\V\Component\Template\Component;

use MOC\V\Component\Template\Component\Option\Repository\FileOption;

/**
 * Interface IBridgeInterface
 *
 * @package MOC\V\Component\Template\Component
 */
interface IBridgeInterface
{

    /**
     * @param \MOC\V\Component\Template\Component\Option\Repository\FileOption $Location
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
