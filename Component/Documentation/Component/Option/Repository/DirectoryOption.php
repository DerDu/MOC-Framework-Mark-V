<?php
namespace MOC\V\Component\Documentation\Component\Option\Repository;

use MOC\V\Component\Documentation\Component\Exception\EmptyDirectoryException;
use MOC\V\Component\Documentation\Component\Exception\TypeDirectoryException;
use MOC\V\Component\Documentation\Component\IOptionInterface;
use MOC\V\Component\Documentation\Component\Option\Option;

/**
 * Class DirectoryOption
 *
 * @package MOC\V\Component\Documentation\Component\Option\Repository
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
