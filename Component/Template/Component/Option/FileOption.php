<?php
namespace MOC\V\Component\Template\Component\Option;

use MOC\V\Component\Template\Component\Exception\EmptyFileException;
use MOC\V\Component\Template\Component\Exception\TypeFileException;

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
