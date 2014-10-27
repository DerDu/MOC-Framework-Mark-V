<?php
namespace MOC\V\Component\Database\Component\Bridge;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Statement;
use MOC\V\Component\Database\Component\Exception\ComponentException;
use MOC\V\Component\Database\Component\IBridgeInterface;
use MOC\V\Component\Database\Component\Option\Repository\DatabaseOption;
use MOC\V\Component\Database\Component\Option\Repository\DriverOption;
use MOC\V\Component\Database\Component\Option\Repository\HostOption;
use MOC\V\Component\Database\Component\Option\Repository\PasswordOption;
use MOC\V\Component\Database\Component\Option\Repository\PortOption;
use MOC\V\Component\Database\Component\Option\Repository\UsernameOption;
use MOC\V\Core\AutoLoader\AutoLoader;

class Doctrine2DBAL extends Bridge implements IBridgeInterface
{

    /** @var Connection[] $ConnectionList */
    private static $ConnectionList = array();

    function __construct()
    {

        AutoLoader::getNamespaceAutoLoader( 'Doctrine\DBAL', __DIR__.'/../../Vendor/Doctrine2DBAL/lib' );
        AutoLoader::getNamespaceAutoLoader( 'Doctrine\Common',
            __DIR__.'/../../Vendor/Doctrine2DBAL/vendor/doctrine/common/lib' );
    }

    /**
     * @param UsernameOption $Username
     * @param PasswordOption $Password
     * @param DatabaseOption $Database
     * @param \MOC\V\Component\Database\Component\Option\Repository\DriverOption $Driver
     * @param HostOption     $Host
     * @param PortOption     $Port
     *
     * @throws ComponentException
     * @return IBridgeInterface
     */
    public function registerConnection(
        UsernameOption $Username,
        PasswordOption $Password,
        DatabaseOption $Database,
        DriverOption $Driver,
        HostOption $Host,
        PortOption $Port
    ) {

        try {
            $Connection = DriverManager::getConnection( array(
                'driver'   => $Driver->getDriver(),
                'user'     => $Username->getUsername(),
                'password' => $Password->getPassword(),
                'host'     => $Host->getHost(),
                'dbname'   => $Database->getDatabase(),
                'port'     => $Port->getPort()
            ) );
        } catch
        ( \Exception $E ) {
            throw new ComponentException( $E->getMessage(), $E->getCode(), $E );
        }

        try {
            $Connection->connect();
        } catch( \Exception $E ) {
            throw new ComponentException( $E->getMessage(), $E->getCode(), $E );
        }

        array_push( self::$ConnectionList, $Connection );
        return $this;
    }

    /**
     * @return array
     * @throws \Doctrine\DBAL\DBALException
     */
    public function executeRead()
    {

        $Query = $this->prepareQuery();
        return $this->prepareConnection()->executeQuery( $Query[0], $Query[1], $Query[2] )->fetchAll();
    }

    /**
     * @return array
     */
    private function prepareQuery()
    {

        /** @var Statement $Statement */
        $Statement = array_pop( self::$StatementList );
        $ParameterCount = substr_count( $Statement, '?' );
        $QueryValue = array();
        $QueryType = array();
        for ($Run = 0; $Run < $ParameterCount; $Run++) {
            $Parameter = array_pop( self::$ParameterList );
            array_unshift( $QueryValue, $Parameter[0] );
            array_unshift( $QueryType, $Parameter[1] );
        }
        return array( $Statement, $QueryValue, $QueryType );
    }

    /**
     * @return Connection
     */
    private function prepareConnection()
    {

        return self::$ConnectionList[count( self::$ConnectionList ) - 1];
    }

    /**
     * @return int
     * @throws \Doctrine\DBAL\DBALException
     */
    public function executeWrite()
    {

        $Query = $this->prepareQuery();
        return $this->prepareConnection()->executeUpdate( $Query[0], $Query[1], $Query[2] );
    }
}
