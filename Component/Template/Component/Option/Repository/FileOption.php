<?php
namespace MOC\V\Component\Template\Component\Option\Repository;

use MOC\V\Component\Template\Component\Exception\EmptyFileException;
use MOC\V\Component\Template\Component\Exception\TypeFileException;
use MOC\V\Component\Template\Component\IOptionInterface;
use MOC\V\Component\Template\Component\Option\Option;

/**
 * Class FileOption
 *
 * @package MOC\V\Component\Template\Component\Option\Repository
 */
class FileOption extends Option implements IOptionInterface
{

    /** @var string $File */
    private $File = null;

    /**
     * @param string $File
     */
    function __construct( $File )
    {

        $this->setFile( $File );
    }

    /**
     * @return string
     */
    public function getFile()
    {

        return $this->File;
    }

    /**
     * @param string $File
     *
     * @throws EmptyFileException
     * @throws TypeFileException
     */
    public function setFile( $File )
    {

        if (empty( $File )) {
            throw new EmptyFileException();
        } else {
            if (!is_dir( $File )) {
                $this->File = $File;
            } else {
                throw new TypeFileException( $File );
            }
        }
    }
}
