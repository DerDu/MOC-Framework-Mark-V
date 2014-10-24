<?php
namespace MOC\V\Component\Database\Component\Option;

/**
 * Class PortOption
 *
 * @package MOC\V\Component\Database\Component\Option
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
