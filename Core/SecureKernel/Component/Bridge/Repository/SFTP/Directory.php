<?php
namespace MOC\V\Core\SecureKernel\Component\Bridge\Repository\SFTP;

use MOC\V\Core\SecureKernel\Component\Bridge\Repository\SFTP;

/**
 * Class Directory
 *
 * @package MOC\V\Core\SecureKernel\Component\Bridge\Repository\SFTP
 */
class Directory extends Attributes
{

    /**
     * @param SFTP  $Connection
     * @param array $Attributes
     */
    public function __construct(SFTP $Connection, $Attributes)
    {

        $this->setName($Attributes['filename']);
        $this->setPermission(substr(decoct($Attributes['permissions']), -4));
        $this->setMode(substr(decoct($Attributes['mode']), -4));
        $this->setLastAccess($Attributes['atime']);
        $this->setLastChange($Attributes['mtime']);
        $this->setConnection($Connection);
    }

    /**
     * @return string
     */
    public function getPermission()
    {

        return $this->getPermission();
    }

    /**
     * @return string
     */
    public function getMode()
    {

        return $this->getMode();
    }

    /**
     * @return int
     */
    public function getLastAccess()
    {

        return $this->getLastAccess();
    }

    /**
     * @return int
     */
    public function getLastChange()
    {

        return $this->getLastChange();
    }

    /**
     * @return SFTP\Directory[]|SFTP\File[]
     */
    public function listDirectory()
    {

        return $this->getConnection()->listDirectory($this->getName());
    }

    /**
     * @return string
     */
    public function getName()
    {

        return $this->getName();
    }

    /**
     * @return bool
     */
    public function existsDirectory()
    {

        return $this->getConnection()->existsDirectory($this->getName());
    }
}
