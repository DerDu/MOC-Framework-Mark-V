<?php
namespace MOC\V\Core\FileSystem\Vendor\Universal;

class FileLoader
{

    /** @var string $Location */
    private $Location = null;

    function __construct( $Location )
    {

        $this->setLocation( $Location );
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
    public function setLocation( $Location )
    {

        $this->Location = $Location;
    }

}

