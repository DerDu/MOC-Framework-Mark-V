<?php
namespace MOC\V\Component\Database\Component\Option\Repository;

use MOC\V\Component\Database\Component\IOptionInterface;
use MOC\V\Component\Database\Component\Option\Option;

/**
 * Class PortOption
 *
 * @package MOC\V\Component\Database\Component\Option\Repository
 */
class PortOption extends Option implements IOptionInterface
{

    /** @var string $Port */
    private $Port = null;

    /**
     * @param string $Port
     */
    function __construct( $Port )
    {

        $this->setPort( $Port );
    }

    /**
     * @return string
     */
    public function getPort()
    {

        return $this->Port;
    }

    /**
     * @param string $Port
     */
    public function setPort( $Port )
    {

        $this->Port = $Port;
    }
}
