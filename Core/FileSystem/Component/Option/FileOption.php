<?php
namespace MOC\V\Core\FileSystem\Component\Option;

use MOC\V\Core\FileSystem\Component\Exception\EmptyFileException;
use MOC\V\Core\FileSystem\Component\Exception\TypeFileException;

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

    /**
     * @return string
     */
    public function getFile()
    {

        return $this->File;
    }
}
