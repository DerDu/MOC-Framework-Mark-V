<?php
namespace MOC\V\Component\Template\Component\Bridge;

use MOC\V\Component\Template\Component\IBridgeInterface;
use MOC\V\Component\Template\Component\Option\Repository\FileOption;

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

        require_once( __DIR__.'/../../Vendor/Twig/lib/Twig/Autoloader.php' );
        \Twig_Autoloader::register();
    }

    /**
     * @param FileOption $Location
     *
     * @return IBridgeInterface
     */
    public function loadFile( FileOption $Location )
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
