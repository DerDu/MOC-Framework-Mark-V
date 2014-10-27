<?php
namespace MOC\V\Core\AutoLoader\Component\Option;

use MOC\V\Core\AutoLoader\Component\Exception\DirectoryNotFoundException;
use MOC\V\Core\AutoLoader\Component\Exception\EmptyDirectoryException;
use MOC\V\Core\AutoLoader\Component\IOptionInterface;

/**
 * Class DirectoryOption
 *
 * @package MOC\V\Core\AutoLoader\Component\Option
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
     * @throws DirectoryNotFoundException
     */
    public function setDirectory( $Directory )
    {

        if (empty( $Directory )) {
            throw new EmptyDirectoryException();
        }
        if (is_dir( $Directory )) {
            $this->Directory = $Directory;
        } else {
            throw new DirectoryNotFoundException( $Directory );
        }
    }

}
