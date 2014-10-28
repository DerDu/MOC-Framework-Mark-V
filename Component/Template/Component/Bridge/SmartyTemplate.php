<?php
namespace MOC\V\Component\Template\Component\Bridge;

use MOC\V\Component\Template\Component\IBridgeInterface;
use MOC\V\Component\Template\Component\Option\Repository\FileOption;

/**
 * Class SmartyTemplate
 *
 * @package MOC\V\Component\Template\Component\Bridge
 */
class SmartyTemplate extends Bridge implements IBridgeInterface
{

    /** @var \Smarty $Instance */
    private $Instance = null;
    /** @var string $Template */
    private $Template = null;

    /**
     *
     */
    function __construct()
    {

        if (!defined( 'SMARTY_DIR' )) {
            define( 'SMARTY_DIR', realpath( __DIR__.'/../../Vendor/Smarty/' ).DIRECTORY_SEPARATOR );
        }
        /** @noinspection PhpIncludeInspection */
        require_once( SMARTY_DIR.'Smarty.class.php' );
    }

    /**
     * @param FileOption $Location
     *
     * @return IBridgeInterface
     */
    public function loadFile( FileOption $Location )
    {

        $this->Instance = new \Smarty();
        $this->Instance->caching = false;
        $this->Instance->compile_dir = __DIR__.'/SmartyTemplate';
        $this->Template = $Location->getFile();
        return $this;
    }

    /**
     * @return string
     */
    public function getContent()
    {

        $this->Instance->assign( $this->VariableList, null, true );
        return $this->Instance->fetch( $this->Template );
    }

}
