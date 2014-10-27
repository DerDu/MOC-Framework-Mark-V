<?php
namespace MOC\V\Component\Database\Component\Option\Repository;

use MOC\V\Component\Database\Component\IOptionInterface;
use MOC\V\Component\Database\Component\Option\Option;

/**
 * Class DriverOption
 *
 * @package MOC\V\Component\Database\Component\Option\Repository
 */
class DriverOption extends Option implements IOptionInterface
{

    const DRIVER_PDO_MYSQL = 'pdo_mysql';
    const DRIVER_PDO_ORACLE = 'pdo_oci';
    const DRIVER_PDO_PGSQL = 'pdo_pgsql';
    const DRIVER_PDO_SQLITE = 'pdo_sqlite';
    const DRIVER_PDO_SQLSRV = 'pdo_sqlsrv';
    const DRIVER_DRIZZLE_PDO_MYSQL = 'drizzle_pdo_mysql';
    const DRIVER_MYSQLI = 'mysqli';
    const DRIVER_ORACLE = 'oci8';
    const DRIVER_SQLSRV = 'sqlsrv';

    /** @var string $Driver */
    private $Driver = self::DRIVER_PDO_MYSQL;

    /**
     * @param string $Driver
     */
    function __construct( $Driver )
    {

        $this->setDriver( $Driver );
    }

    /**
     * @return string
     */
    public function getDriver()
    {

        return $this->Driver;
    }

    /**
     * @param string $Driver
     */
    public function setDriver( $Driver )
    {

        $this->Driver = $Driver;
    }
}
