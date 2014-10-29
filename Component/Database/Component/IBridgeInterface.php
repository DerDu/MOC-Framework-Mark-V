<?php
namespace MOC\V\Component\Database\Component;

use MOC\V\Component\Database\Component\Parameter\Repository\DatabaseParameter;
use MOC\V\Component\Database\Component\Parameter\Repository\DriverParameter;
use MOC\V\Component\Database\Component\Parameter\Repository\HostParameter;
use MOC\V\Component\Database\Component\Parameter\Repository\PasswordParameter;
use MOC\V\Component\Database\Component\Parameter\Repository\PortParameter;
use MOC\V\Component\Database\Component\Parameter\Repository\UsernameParameter;

/**
 * Interface IBridgeInterface
 *
 * @package MOC\V\Component\Database\Component
 */
interface IBridgeInterface
{

    /**
     * @param \MOC\V\Component\Database\Component\Parameter\Repository\UsernameParameter $Username
     * @param PasswordParameter                                                          $Password
     * @param DatabaseParameter                                                          $Database
     * @param \MOC\V\Component\Database\Component\Parameter\Repository\DriverParameter   $Driver
     * @param HostParameter                                                              $Host
     * @param \MOC\V\Component\Database\Component\Parameter\Repository\PortParameter     $Port
     *
     * @return IBridgeInterface
     */
    public function registerConnection(
        UsernameParameter $Username,
        PasswordParameter $Password,
        DatabaseParameter $Database,
        DriverParameter $Driver,
        HostParameter $Host,
        PortParameter $Port
    );

    /**
     * Example: SELECT * FROM example WHERE id = ? AND name = ?
     *
     * @param string $Sql
     *
     * @return IBridgeInterface
     */
    public function prepareStatement( $Sql );

    /**
     * @param mixed    $Value
     * @param null|int $Type
     *
     * @return IBridgeInterface
     */
    public function defineParameter( $Value, $Type = null );

    /**
     * @return array
     */
    public function executeRead();

    /**
     * @return int
     */
    public function executeWrite();
}
