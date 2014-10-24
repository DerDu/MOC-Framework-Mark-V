<?php
namespace MOC\V\Core\FileSystem\Component\Bridge;

use MOC\V\Core\FileSystem\Component\Option\FileOption;
use MOC\V\Core\FileSystem\Vendor\Universal\FileLoader;

class UniversalFileLoader extends Bridge implements IBridgeInterface
{

    /** @var FileLoader $Instance */
    private $Instance = null;

    function __construct( FileOption $FileOption )
    {

        $this->Instance = new FileLoader( $FileOption->getFile() );
    }

    /**
     * @return string
     */
    public function getLocation()
    {

        return $this->Instance->getLocation();
    }

}
