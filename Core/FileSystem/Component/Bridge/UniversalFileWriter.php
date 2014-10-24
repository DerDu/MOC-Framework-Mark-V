<?php
namespace MOC\V\Core\FileSystem\Component\Bridge;

use MOC\V\Core\FileSystem\Component\Option\FileOption;
use MOC\V\Core\FileSystem\Vendor\Universal\FileWriter;

class UniversalFileWriter extends Bridge implements IBridgeInterface
{

    /** @var FileWriter $Instance */
    private $Instance = null;

    function __construct( FileOption $FileOption )
    {

        $this->Instance = new FileWriter( $FileOption->getFile() );
    }

    /**
     * @return string
     */
    public function getLocation()
    {

        return $this->Instance->getLocation();
    }

}
