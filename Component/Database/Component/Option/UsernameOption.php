<?php
namespace MOC\V\Component\Database\Component\Option;

/**
 * Class UsernameOption
 *
 * @package MOC\V\Component\Database\Component\Option
 */
class UsernameOption extends Option implements IOptionInterface
{

    /** @var string $Username */
    private $Username = null;

    /**
     * @param string $Username
     */
    function __construct( $Username )
    {

        $this->setUsername( $Username );
    }

    /**
     * @return string
     */
    public function getUsername()
    {

        return $this->Username;
    }

    /**
     * @param string $Username
     */
    public function setUsername( $Username )
    {

        $this->Username = $Username;
    }
}
