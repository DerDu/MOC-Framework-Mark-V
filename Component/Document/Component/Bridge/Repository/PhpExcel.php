<?php
namespace MOC\V\Component\Document\Component\Bridge\Repository;

use MOC\V\Component\Document\Component\Bridge\Bridge;
use MOC\V\Component\Document\Component\IBridgeInterface;
use MOC\V\Component\Document\Component\Parameter\Repository\FileParameter;
use MOC\V\Component\Document\Component\Parameter\Repository\PaperOrientationParameter;
use MOC\V\Component\Document\Component\Parameter\Repository\PaperSizeParameter;
use MOC\V\Core\AutoLoader\AutoLoader;

class PhpExcel extends Bridge implements IBridgeInterface
{

    function __construct()
    {

        AutoLoader::getNamespaceAutoLoader( 'PHPExcel', __DIR__.'/../../../Vendor/PhpExcel/1.8.0/Classes' );
    }

    /**
     * @param FileParameter $Location
     *
     * @return IBridgeInterface
     */
    public function loadFile( FileParameter $Location )
    {

        $this->setFileParameter( $Location );
        return $this;
    }

    /**
     * @param null|FileParameter $Location
     *
     * @return IBridgeInterface
     */
    public function saveFile( FileParameter $Location = null )
    {

        return $this;
    }

    /**
     * @param PaperOrientationParameter $PaperOrientation
     *
     * @return IBridgeInterface
     */
    public function setPaperOrientationParameter( PaperOrientationParameter $PaperOrientation )
    {

        return parent::setPaperOrientationParameter( $PaperOrientation );
    }

    /**
     * @param PaperSizeParameter $PaperSize
     *
     * @return IBridgeInterface
     */
    public function setPaperSizeParameter( PaperSizeParameter $PaperSize )
    {

        return parent::setPaperSizeParameter( $PaperSize );
    }
}
