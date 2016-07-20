<?php
namespace MOC\V\Component\Document\Component\Bridge\Repository\PhpWord;

use MOC\V\Component\Document\Component\Bridge\Bridge;
use MOC\V\Component\Document\Component\Bridge\Repository\PhpWord;
use MOC\V\Component\Document\Component\IBridgeInterface;
use MOC\V\Component\Document\Component\Parameter\Repository\PaperOrientationParameter;
use MOC\V\Component\Document\Component\Parameter\Repository\PaperSizeParameter;

/**
 * Class Config
 *
 * @package MOC\V\Component\Document\Component\Bridge\Repository\PhpWord
 */
abstract class Config extends Bridge implements IBridgeInterface
{

    /** @var null|\PhpOffice\PhpWord\PhpWord $Source */
    protected $Source = null;

    /**
     * @param PaperOrientationParameter $PaperOrientation
     *
     * @return PhpWord
     */
    public function setPaperOrientationParameter(PaperOrientationParameter $PaperOrientation)
    {

        parent::setPaperOrientationParameter($PaperOrientation);

        // TODO: Implement

        return $this;
    }

    /**
     * @param PaperSizeParameter $PaperSize
     *
     * @return PhpWord
     */
    public function setPaperSizeParameter(PaperSizeParameter $PaperSize)
    {

        parent::setPaperSizeParameter($PaperSize);

        // TODO: Implement

        return $this;
    }
}
