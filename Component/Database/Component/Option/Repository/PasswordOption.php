<?php
namespace MOC\V\Component\Database\Component\Option\Repository;

use MOC\V\Component\Database\Component\IOptionInterface;
use MOC\V\Component\Database\Component\Option\Option;

/**
 * Class PasswordOption
 *
 * @package MOC\V\Component\Database\Component\Option\Repository
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
