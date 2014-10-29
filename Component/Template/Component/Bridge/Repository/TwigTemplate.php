<?php
namespace MOC\V\Component\Template\Component\Bridge\Repository;

use MOC\V\Component\Template\Component\Bridge\Bridge;
use MOC\V\Component\Template\Component\IBridgeInterface;
use MOC\V\Component\Template\Component\Parameter\Repository\FileParameter;

/**
 * Class TwigTemplate
 *
 * @package MOC\V\Component\Template\Component\Bridge
 */
class TwigTemplate extends Bridge implements IBridgeInterface
{

    /** @var null|\Twig_Environment $Instance */
    private $Instance = null;
    /** @var null|\Twig_Template $Template */
    private $Template = null;

    /**
     *
     */
    function __construct()
    {

        require_once( __DIR__.'/../../../Vendor/Twig/lib/Twig/Autoloader.php' );
        \Twig_Autoloader::register();
    }

    /**
     * @param FileParameter $Location
     *
     * @return IBridgeInterface
     */
    public function loadFile( FileParameter $Location )
    {

        $this->Instance = new \Twig_Environment( new \Twig_Loader_Filesystem( array( dirname( $Location->getFile() ) ) ) );
        $this->Template = $this->Instance->loadTemplate( basename( $Location->getFile() ) );
        return $this;
    }

    /**
     * @return string
     */
    public function getContent()
    {

        return $this->Template->render( $this->VariableList );
    }

}
