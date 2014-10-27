<?php
namespace MOC\V\Core\FileSystem\Component\Option\Repository;

use MOC\V\Core\FileSystem\Component\Exception\EmptyDirectoryException;
use MOC\V\Core\FileSystem\Component\Exception\TypeDirectoryException;
use MOC\V\Core\FileSystem\Component\IOptionInterface;
use MOC\V\Core\FileSystem\Component\Option\Option;

/**
 * Class DirectoryOption
 *
 * @package MOC\V\Core\FileSystem\Component\Option\Repository
 */
class DirectoryOption extends Option implements IOptionInterface
{

    /** @var string $Directory */
    private $Directory = null;

    /**
     * @param string $Directory
     */
    function __construct( $Directory )
    {

        $this->setDirectory( $Directory );
    }

    /**
     * @return string
     */
    public function getDirectory()
    {

        return $this->Directory;
    }

    /**
     * @param string $Directory
     *
     * @throws EmptyDirectoryException
     * @throws TypeDirectoryException
     */
    public function setDirectory( $Directory )
    {

        if (empty( $Directory )) {
            throw new EmptyDirectoryException();
        } else {
            if (is_dir( $Directory )) {
                $this->Directory = $Directory;
            } else {
                throw new TypeDirectoryException( $Directory );
            }
        }
    }

}
