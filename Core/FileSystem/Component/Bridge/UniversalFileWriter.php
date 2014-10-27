<?php
namespace MOC\V\Core\FileSystem\Component\Bridge;

use MOC\V\Core\FileSystem\Component\IBridgeInterface;
use MOC\V\Core\FileSystem\Component\Option\Repository\FileOption;
use MOC\V\Core\FileSystem\Vendor\Universal\FileWriter;

/**
 * Class UniversalFileWriter
 *
 * @package MOC\V\Core\FileSystem\Component\Bridge
 */
class UniversalFileWriter extends Bridge implements IBridgeInterface
{

    /** @var FileWriter $Instance */
    private $Instance = null;

    /**
     * @param FileOption $FileOption
     */
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
