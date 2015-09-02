<?php
namespace MOC\V\Core\FileSystem\Vendor\Universal;

/**
 * Class FileWriter
 *
 * @package MOC\V\Core\FileSystem\Vendor\Universal
 */
class FileWriter
{

    /** @var string $Location */
    private $Location = null;

    /**
     * @param string $Location
     */
    function __construct($Location)
    {

        $this->setLocation($Location);
    }

    /**
     * @return string
     */
    public function getLocation()
    {

        return $this->Location;
    }

    /**
     * @param string $Location
     */
    public function setLocation($Location)
    {

        $this->Location = $Location;
    }

}

