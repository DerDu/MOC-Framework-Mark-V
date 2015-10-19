<?php
namespace MOC\V\Core\FileSystem\Component\Bridge\Repository;

use MOC\V\Core\FileSystem\Component\Bridge\Bridge;
use MOC\V\Core\FileSystem\Component\IBridgeInterface;
use MOC\V\Core\FileSystem\Component\Parameter\Repository\FileParameter;
use MOC\V\Core\FileSystem\Vendor\Universal\Download;

/**
 * Class UniversalDownload
 *
 * @package MOC\V\Core\FileSystem\Component\Bridge
 */
class UniversalDownload extends Bridge implements IBridgeInterface
{

    /** @var Download $Instance */
    private $Instance = null;

    /**
     * @param FileParameter $FileOption
     */
    public function __construct(FileParameter $FileOption)
    {

        $this->Instance = new Download($FileOption->getFile());
    }

    /**
     * @return string
     */
    public function getLocation()
    {

        return $this->Instance->getLocation();
    }

    /**
     * @return string
     */
    public function getRealPath()
    {

        $SplFileInfo = (new \SplFileInfo($this->Instance->getLocation()));
        if (!$SplFileInfo->getRealPath()) {
            $SplFileInfo = (new \SplFileInfo($_SERVER['DOCUMENT_ROOT'].$this->Instance->getLocation()));
        }
        return $SplFileInfo->getRealPath() ? $SplFileInfo->getRealPath() : '';
    }

    /**
     * @return string
     */
    public function __toString()
    {

        return (string)$this->Instance;
    }
}
