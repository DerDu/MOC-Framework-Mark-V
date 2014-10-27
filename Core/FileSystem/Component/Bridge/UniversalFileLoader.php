<?php
namespace MOC\V\Core\FileSystem\Component\Bridge;

use MOC\V\Core\FileSystem\Component\IBridgeInterface;
use MOC\V\Core\FileSystem\Component\Option\FileOption;
use MOC\V\Core\FileSystem\Vendor\Universal\FileLoader;

/**
 * Class UniversalFileLoader
 *
 * @package MOC\V\Core\FileSystem\Component\Bridge
 */
class UniversalFileLoader extends Bridge implements IBridgeInterface
{

    /** @var FileLoader $Instance */
    private $Instance = null;

    /**
     * @param FileOption $FileOption
     */
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
