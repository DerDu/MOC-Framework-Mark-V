<?php
namespace MOC\V\Component\Document\Component\Bridge\Repository;

use MOC\V\Component\Document\Component\Bridge\Bridge;
use MOC\V\Component\Document\Component\IBridgeInterface;
use MOC\V\Component\Document\Component\Parameter\Repository\FileParameter;

class DomPdf extends Bridge implements IBridgeInterface
{

    /** @var string $Source */
    private $Source = '';

    /**
     *
     */
    function __construct()
    {

        require_once( __DIR__.'/../../../Vendor/DomPdf/0.6.1/dompdf_config.inc.php' );
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
     * @param string $Html
     *
     * @return IBridgeInterface
     */
    public function setContent( $Html )
    {

        $this->Source = $Html;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent()
    {

        $Renderer = new \DOMPDF();
        $Renderer->load_html( $this->Source );
        $Renderer->render();
        return $Renderer->output();
    }

    /**
     * @param null|FileParameter $Location
     *
     * @return IBridgeInterface
     */
    public function saveFile( FileParameter $Location = null )
    {

        $Renderer = new \DOMPDF();
        $Renderer->load_html( $this->Source );
        $Renderer->render();
        if (null === $Location) {
            $Renderer->stream( $this->getFileParameter()->getFile() );
        } else {
            $Renderer->stream( $Location->getFile() );
        }
        return $this;
    }
}
