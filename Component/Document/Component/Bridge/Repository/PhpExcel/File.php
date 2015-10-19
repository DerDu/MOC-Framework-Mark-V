<?php
namespace MOC\V\Component\Document\Component\Bridge\Repository\PhpExcel;

use MOC\V\Component\Document\Component\Bridge\Repository\PhpExcel;
use MOC\V\Component\Document\Component\Exception\Repository\TypeFileException;
use MOC\V\Component\Document\Component\Parameter\Repository\FileParameter;

/**
 * Class File
 *
 * @package MOC\V\Component\Document\Component\Bridge\Repository\PhpExcel
 */
abstract class File extends Config
{

    /**
     * @param FileParameter $Location
     * @param \PHPExcel_Cell_IValueBinder $ValueBinder
     *
     * @return PhpExcel
     */
    public function newFile(FileParameter $Location, \PHPExcel_Cell_IValueBinder $ValueBinder = null)
    {

        $this->setFileParameter($Location);
        $this->setConfiguration($ValueBinder);
        $this->Source = new \PHPExcel();
        return $this;
    }

    /**
     * @param FileParameter $Location
     * @param \PHPExcel_Cell_IValueBinder $ValueBinder
     *
     * @return PhpExcel
     * @throws TypeFileException
     * @throws \PHPExcel_Reader_Exception
     */
    public function loadFile(FileParameter $Location, \PHPExcel_Cell_IValueBinder $ValueBinder = null)
    {

        $this->setFileParameter($Location);
        $this->setConfiguration($ValueBinder);

        $Info = $Location->getFileInfo();
        $ReaderType = $this->getReaderType($Info);

        if ($ReaderType) {
            /** @var \PHPExcel_Reader_IReader|\PHPExcel_Reader_CSV $Reader */
            $Reader = \PHPExcel_IOFactory::createReader($ReaderType);
            /**
             * Find CSV Delimiter
             */
            if ('CSV' == $ReaderType) {
                $Result = $this->getDelimiterType();
                if ($Result) {
                    $Reader->setDelimiter($Result);
                }
            }
            $this->Source = $Reader->load($Location->getFile());
        } else {
            throw new TypeFileException('No Reader for ' . $Info->getExtension() . ' available!');
        }
        return $this;
    }

    /**
     * @param \SplFileInfo $Info
     * @return string
     */
    private function getReaderType(\SplFileInfo $Info)
    {
        switch ($Info->getExtension()) {
            case 'xlsx':
            case 'xlsm':
            case 'xltx':
            case 'xltm':
                $ReaderType = 'Excel2007';
                break;
            case 'xls':
            case 'xlt':
                $ReaderType = 'Excel5';
                break;
            // @codeCoverageIgnoreStart
            case 'ods':
            case 'ots':
                $ReaderType = 'OOCalc';
                break;
            case 'slk':
                $ReaderType = 'SYLK';
                break;
            case 'xml':
                $ReaderType = 'Excel2003XML';
                break;
            case 'gnumeric':
                $ReaderType = 'Gnumeric';
                break;
            // @codeCoverageIgnoreEnd
            case 'htm':
            case 'html':
                $ReaderType = 'HTML';
                break;
            case 'txt':
            case 'csv':
                $ReaderType = 'CSV';
                break;
            default:
                $ReaderType = null;
                break;
        }
        return $ReaderType;
    }

    /**
     * @return bool|string
     */
    private function getDelimiterType()
    {
        $Delimiter = array(
            ',',
            ';',
            "\t"
        );
        $Result = array();
        $Content = file($this->getFileParameter());
        for ($Line = 0; $Line < 5; $Line++) {
            if (isset($Content[$Line])) {
                foreach ($Delimiter as $Char) {
                    $Result[$Char][$Line] = substr_count($Content[$Line], $Char);
                }
            }
        }
        array_walk($Result, function ($Count, $Delimiter) use (&$Result) {
            if (0 == array_sum($Count)) {
                $Result[$Delimiter] = false;
            } else {
                $Count = array_unique($Count);
                if (1 == count($Count)) {
                    $Result[$Delimiter] = true;
                } else {
                    $Result[$Delimiter] = false;
                }
            }
        });
        $Result = array_filter($Result);
        if (1 == count($Result)) {
            return key($Result);
        } else {
            return false;
        }
    }

    /**
     * @param null|FileParameter $Location
     *
     * @return PhpExcel
     * @throws TypeFileException
     * @throws \PHPExcel_Reader_Exception
     */
    public function saveFile(FileParameter $Location = null)
    {

        if (null === $Location) {
            $Info = $this->getFileParameter()->getFileInfo();
        } else {
            $Info = $Location->getFileInfo();
        }

        $WriterType = $this->getWriterType($Info);

        if (null === $Location) {
            $Location = $this->getFileParameter();
        } else {
            $Location = $Location->getFile();
        }

        if ($WriterType) {
            $Writer = \PHPExcel_IOFactory::createWriter($this->Source, $WriterType);
            $Writer->save($Location);
        } else {
            // @codeCoverageIgnoreStart
            throw new TypeFileException('No Writer for ' . $Info->getExtension() . ' available!');
            // @codeCoverageIgnoreEnd
        }

        return $this;
    }

    /**
     * @param \SplFileInfo $Info
     * @return null|string
     */
    private function getWriterType(\SplFileInfo $Info)
    {
        switch ($Info->getExtension()) {
            case 'xlsx':
            case 'xlsm':
            case 'xltx':
            case 'xltm':
                $WriterType = 'Excel2007';
                break;
            case 'xls':
            case 'xlt':
                $WriterType = 'Excel5';
                break;
            case 'htm':
            case 'html':
                $WriterType = 'HTML';
                break;
            case 'csv':
                $WriterType = 'CSV';
                break;
            // @codeCoverageIgnoreStart
            default:
                $WriterType = null;
                break;
            // @codeCoverageIgnoreEnd
        }
        return $WriterType;
    }
}
