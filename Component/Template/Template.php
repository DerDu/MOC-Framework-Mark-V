<?php
namespace MOC\V\Component\Template;

use MOC\V\Component\Template\Component\Bridge\TwigTemplate;
use MOC\V\Component\Template\Component\IBridgeInterface;
use MOC\V\Component\Template\Component\IVendorInterface;
use MOC\V\Component\Template\Component\Option\Repository\FileOption;
use MOC\V\Component\Template\Component\Vendor;
use MOC\V\Component\Template\Exception\TemplateTypeException;

/**
 * Class Template
 *
 * @package MOC\V\Component\Template
 */
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
     * @param string $Location
     *
     * @throws TemplateTypeException
     * @return IBridgeInterface
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
     * @return IBridgeInterface
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

    /**
     * @return IBridgeInterface
     */
    public function getBridgeInterface()
    {

        return $this->VendorInterface->getBridgeInterface();
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
     * @param IBridgeInterface $BridgeInterface
     *
     * @return IBridgeInterface
     */
    public function setBridgeInterface( IBridgeInterface $BridgeInterface )
    {

        return $this->VendorInterface->setBridgeInterface( $BridgeInterface );
    }
}
