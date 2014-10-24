<?php
namespace MOC\V\Component\Database\Component\Option;

/**
 * Class DatabaseOption
 *
 * @package MOC\V\Component\Database\Component\Option
 */
class DatabaseOption extends Option implements IOptionInterface
{

    /** @var string $Database */
    private $Database = null;

    /**
     * @param string $Database
     */
    function __construct( $Database )
    {

        $this->setDatabase( $Database );
    }

    /**
     * @return string
     */
    public function getDatabase()
    {

        return $this->Database;
    }

    /**
     * @param string $Database
     */
    public function setDatabase( $Database )
    {

        $this->Database = $Database;
    }
}
