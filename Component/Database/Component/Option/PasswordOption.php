<?php
namespace MOC\V\Component\Database\Component\Option;

/**
 * Class PasswordOption
 *
 * @package MOC\V\Component\Database\Component\Option
 */
class PasswordOption extends Option implements IOptionInterface
{

    /** @var string $Password */
    private $Password = null;

    /**
     * @param string $Password
     */
    function __construct( $Password )
    {

        $this->setPassword( $Password );
    }

    /**
     * @return string
     */
    public function getPassword()
    {

        return $this->Password;
    }

    /**
     * @param string $Password
     */
    public function setPassword( $Password )
    {

        $this->Password = $Password;
    }
}
