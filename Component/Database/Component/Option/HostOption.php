<?php
namespace MOC\V\Component\Database\Component\Option;

/**
 * Class HostOption
 *
 * @package MOC\V\Component\Database\Component\Option
 */
class HostOption extends Option implements IOptionInterface
{

    /** @var string $Host */
    private $Host = 'localhost';

    /**
     * @param string $Host
     */
    function __construct( $Host )
    {

        $this->setHost( $Host );
    }

    /**
     * @return string
     */
    public function getHost()
    {

        return $this->Host;
    }

    /**
     * @param string $Host
     */
    public function setHost( $Host )
    {

        $this->Host = $Host;
    }
}
