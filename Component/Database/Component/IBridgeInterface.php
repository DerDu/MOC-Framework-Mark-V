<?php
namespace MOC\V\Component\Database\Component;

use MOC\V\Component\Database\Component\Option\DatabaseOption;
use MOC\V\Component\Database\Component\Option\DriverOption;
use MOC\V\Component\Database\Component\Option\HostOption;
use MOC\V\Component\Database\Component\Option\PasswordOption;
use MOC\V\Component\Database\Component\Option\PortOption;
use MOC\V\Component\Database\Component\Option\UsernameOption;

/**
 * Interface IBridgeInterface
 *
 * @package MOC\V\Component\Database\Component
 */
interface IBridgeInterface
{

    /**
     * @param UsernameOption $Username
     * @param PasswordOption $Password
     * @param DatabaseOption $Database
     * @param DriverOption   $Driver
     * @param HostOption     $Host
     * @param PortOption     $Port
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
