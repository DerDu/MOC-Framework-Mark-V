<?php
namespace MOC\V\Component\Template;

use MOC\V\Component\Template\Component\Bridge\IBridgeInterface;
use MOC\V\Component\Template\Component\Bridge\TwigTemplate;
use MOC\V\Component\Template\Component\IVendorInterface;
use MOC\V\Component\Template\Component\Option\FileOption;
use MOC\V\Component\Template\Component\Vendor;
use MOC\V\Component\Template\Exception\TemplateTypeException;

class Template implements IVendorInterface
{

    /** @var IVendorInterface $VendorInterface */
    private $VendorInterface = null;

    /**
     * @param IVendorInterface $VendorInterface
     */
    function __construct( IVendorInterface $VendorInterface )
    {

        $this->setVendorInterface( $VendorInterface );
    }

    /**
     * @return IVendorInterface
     */
    public function getVendorInterface()
    {

        return $this->VendorInterface;
    }

    /**
     * @param IVendorInterface $VendorInterface
     *
     * @return IVendorInterface
     */
    public function setVendorInterface( IVendorInterface $VendorInterface )
    {

        $this->VendorInterface = $VendorInterface;
        return $this;
    }

    /**
     * @return \MOC\V\Component\Template\Component\Bridge\IBridgeInterface
     */
    public function getBridgeInterface()
    {

        return $this->VendorInterface->getBridgeInterface();
    }

    /**
     * @param IBridgeInterface $BridgeInterface
     *
     * @return \MOC\V\Component\Template\Component\Bridge\IBridgeInterface
     */
    public function setBridgeInterface( IBridgeInterface $BridgeInterface )
    {

        return $this->VendorInterface->setBridgeInterface( $BridgeInterface );
    }

    /**
     * @param string $Location
     *
     * @throws TemplateTypeException
     * @return \MOC\V\Component\Template\Component\Bridge\IBridgeInterface
     */
    public static function getTemplate( $Location )
    {

        switch ($Type = strtoupper( pathinfo( $Location, PATHINFO_EXTENSION ) )) {
            case 'TWIG': {
                return self::getTwigTemplate( $Location );
                break;
            }
            default: {
            throw new TemplateTypeException( $Type );
            break;
            }
        }
    }

    /**
     * @param string $Location
     *
     * @return \MOC\V\Component\Template\Component\Bridge\IBridgeInterface
     */
    public static function getTwigTemplate( $Location )
    {

        $Template = new Template(
            new Vendor(
                new TwigTemplate()
            )
        );

        $Template->getBridgeInterface()->loadFile( new FileOption( $Location ) );

        return $Template->getBridgeInterface();
    }
}
