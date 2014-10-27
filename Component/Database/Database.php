<?php
namespace MOC\V\Component\Database;

use MOC\V\Component\Database\Component\Bridge\Doctrine2DBAL;
use MOC\V\Component\Database\Component\IBridgeInterface;
use MOC\V\Component\Database\Component\IVendorInterface;
use MOC\V\Component\Database\Component\Option\Repository\DatabaseOption;
use MOC\V\Component\Database\Component\Option\Repository\DriverOption;
use MOC\V\Component\Database\Component\Option\Repository\HostOption;
use MOC\V\Component\Database\Component\Option\Repository\PasswordOption;
use MOC\V\Component\Database\Component\Option\Repository\PortOption;
use MOC\V\Component\Database\Component\Option\Repository\UsernameOption;
use MOC\V\Component\Database\Component\Vendor;
use MOC\V\Component\Database\Exception\DatabaseException;

class Database implements IVendorInterface
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
     * @param string $Username
     * @param string $Password
     * @param string $Database
     * @param int    $Driver
     * @param string $Host
     * @param null   $Port
     *
     * @throws DatabaseException
     * @return IBridgeInterface
     */
    public static function getDatabase( $Username, $Password, $Database, $Driver, $Host, $Port = null )
    {

        if (class_exists( '\MOC\V\Component\Database\Component\Bridge\Doctrine2DBAL', true )) {
            return self::getDoctrineDatabase( $Username, $Password, $Database, $Driver, $Host, $Port );
        }
        throw new DatabaseException();
    }

    /**
     * @param string $Username
     * @param string $Password
     * @param string $Database
     * @param int    $Driver
     * @param string $Host
     * @param null   $Port
     *
     * @return IBridgeInterface
     */
    public static function getDoctrineDatabase( $Username, $Password, $Database, $Driver, $Host, $Port = null )
    {

        $Doctrine = new Database(
            new Vendor(
                new Doctrine2DBAL()
            )
        );

        $Doctrine->getBridgeInterface()->registerConnection(
            new UsernameOption( $Username ),
            new PasswordOption( $Password ),
            new DatabaseOption( $Database ),
            new DriverOption( $Driver ),
            new HostOption( $Host ),
            new PortOption( $Port )
        );

        return $Doctrine->getBridgeInterface();
    }

    /**
     * @return \MOC\V\Component\Database\Component\IBridgeInterface
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
     * @return \MOC\V\Component\Database\Component\IBridgeInterface
     */
    public function setBridgeInterface( IBridgeInterface $BridgeInterface )
    {

        return $this->VendorInterface->setBridgeInterface( $BridgeInterface );
    }
}
