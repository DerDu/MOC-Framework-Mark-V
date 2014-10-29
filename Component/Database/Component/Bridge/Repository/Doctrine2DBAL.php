<?php
namespace MOC\V\Component\Database\Component\Bridge\Repository;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Statement;
use MOC\V\Component\Database\Component\Bridge\Bridge;
use MOC\V\Component\Database\Component\Exception\ComponentException;
use MOC\V\Component\Database\Component\Exception\Repository\NoConnectionException;
use MOC\V\Component\Database\Component\IBridgeInterface;
use MOC\V\Component\Database\Component\Parameter\Repository\DatabaseParameter;
use MOC\V\Component\Database\Component\Parameter\Repository\DriverParameter;
use MOC\V\Component\Database\Component\Parameter\Repository\HostParameter;
use MOC\V\Component\Database\Component\Parameter\Repository\PasswordParameter;
use MOC\V\Component\Database\Component\Parameter\Repository\PortParameter;
use MOC\V\Component\Database\Component\Parameter\Repository\UsernameParameter;
use MOC\V\Core\AutoLoader\AutoLoader;

/**
 * Class Doctrine2DBAL
 *
 * @package MOC\V\Component\Database\Component\Bridge
 */
class Doctrine2DBAL extends Bridge implements IBridgeInterface
{

    /** @var Connection[] $ConnectionList */
    private static $ConnectionList = array();

    function __construct()
    {

        AutoLoader::getNamespaceAutoLoader( 'Doctrine\DBAL', __DIR__.'/../../../Vendor/Doctrine2DBAL/lib' );
        AutoLoader::getNamespaceAutoLoader( 'Doctrine\Common',
            __DIR__.'/../../../Vendor/Doctrine2DBAL/vendor/doctrine/common/lib' );
    }

    /**
     * @param UsernameParameter                                                        $Username
     * @param PasswordParameter                                                        $Password
     * @param DatabaseParameter                                                        $Database
     * @param \MOC\V\Component\Database\Component\Parameter\Repository\DriverParameter $Driver
     * @param HostParameter                                                            $Host
     * @param PortParameter                                                            $Port
     *
     * @throws ComponentException
     * @return IBridgeInterface
     */
    public function registerConnection(
        UsernameParameter $Username,
        PasswordParameter $Password,
        DatabaseParameter $Database,
        DriverParameter $Driver,
        HostParameter $Host,
        PortParameter $Port
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
     * @throws NoConnectionException
     * @return Connection
     */
    private function prepareConnection()
    {

        $Index = count( self::$ConnectionList ) - 1;
        if (!isset( self::$ConnectionList[$Index] )) {
            // @codeCoverageIgnoreStart
            throw new NoConnectionException( $Index );
            // @codeCoverageIgnoreEnd
        }
        return self::$ConnectionList[$Index];
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
