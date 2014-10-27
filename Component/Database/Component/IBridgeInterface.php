<?php
namespace MOC\V\Component\Database\Component;

use MOC\V\Component\Database\Component\Option\Repository\DatabaseOption;
use MOC\V\Component\Database\Component\Option\Repository\DriverOption;
use MOC\V\Component\Database\Component\Option\Repository\HostOption;
use MOC\V\Component\Database\Component\Option\Repository\PasswordOption;
use MOC\V\Component\Database\Component\Option\Repository\PortOption;
use MOC\V\Component\Database\Component\Option\Repository\UsernameOption;

/**
 * Interface IBridgeInterface
 *
 * @package MOC\V\Component\Database\Component
 */
interface IBridgeInterface
{

    /**
     * @param \MOC\V\Component\Database\Component\Option\Repository\UsernameOption $Username
     * @param PasswordOption $Password
     * @param DatabaseOption $Database
     * @param \MOC\V\Component\Database\Component\Option\Repository\DriverOption   $Driver
     * @param HostOption     $Host
     * @param \MOC\V\Component\Database\Component\Option\Repository\PortOption     $Port
     *
     * @return IBridgeInterface
     */
    public function registerConnection(
        UsernameOption $Username,
        PasswordOption $Password,
        DatabaseOption $Database,
        DriverOption $Driver,
        HostOption $Host,
        PortOption $Port
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
