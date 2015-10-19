<?php
namespace MOC\V\Core\FileSystem\Component\Bridge\Repository;

use MOC\V\Core\FileSystem\Component\Bridge\Bridge;
use MOC\V\Core\FileSystem\Component\IBridgeInterface;
use MOC\V\Core\FileSystem\Component\Parameter\Repository\FileParameter;
use MOC\V\Core\FileSystem\Vendor\Universal\FileWriter;
use MOC\V\Core\GlobalsKernel\GlobalsKernel;

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
     * @param FileParameter $FileOption
     */
    public function __construct(FileParameter $FileOption)
    {

        $this->Instance = new FileWriter($FileOption->getFile());
    }

    /**
     * @return string
     */
    public function getRealPath()
    {

        $SERVER = GlobalsKernel::getGlobals()->getSERVER();
        $SplFileInfo = (new \SplFileInfo($this->Instance->getLocation()));
        if (!$SplFileInfo->getRealPath()) {
            $SplFileInfo = (new \SplFileInfo($SERVER['DOCUMENT_ROOT'].$this->Instance->getLocation()));
        }
        return $SplFileInfo->getRealPath() ? $SplFileInfo->getRealPath() : '';
    }

    /**
     * @return string
     */
    public function __toString()
    {

        return (string)$this->getLocation();
    }

    /**
     * @return string
     */
    public function getLocation()
    {

        return $this->Instance->getLocation();
    }
}
