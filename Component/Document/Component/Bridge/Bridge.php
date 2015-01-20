<?php
namespace MOC\V\Component\Document\Component\Bridge;

use MOC\V\Component\Document\Component\IBridgeInterface;
use MOC\V\Component\Document\Component\Parameter\Repository\FileParameter;

/**
 * Class Bridge
 *
 * @package MOC\V\Component\Document\Component\Bridge
 */
abstract class Bridge implements IBridgeInterface
{

    /** @var null|FileParameter $FileParameter */
    private $FileParameter = null;

    /**
     * @return FileParameter|null
     */
    protected function getFileParameter()
    {

        return $this->FileParameter;
    }

    /**
     * @param FileParameter $FileParameter
     */
    protected function setFileParameter( FileParameter $FileParameter )
    {

        $this->FileParameter = $FileParameter;
    }
}
