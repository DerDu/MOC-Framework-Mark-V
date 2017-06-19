<?php
namespace MOC\V\Component\Document\Component\Bridge\Repository;

use MOC\V\Component\Document\Component\Bridge\Repository\PhpExcel\Cell;
use MOC\V\Component\Document\Component\Bridge\Repository\PhpExcel\Style;
use MOC\V\Component\Document\Component\Bridge\Repository\PhpExcel\Worksheet;

/**
 * Class PhpExcel
 *
 * @package MOC\V\Component\Document\Component\Bridge\Repository
 */
class PhpExcel extends Worksheet
{
    const TYPE_STRING = 's';
    const TYPE_NUMERIC = 'n';
    const TYPE_BOOL = 'b';
    const TYPE_NULL = 'null';

    /**
     * PhpExcel constructor.
     */
    public function __construct()
    {

        require_once( __DIR__.'/../../../Vendor/PhpExcel/1.8.0/Classes/PHPExcel.php' );
    }

    /**
     * @param string|int $Column Name or Index
     * @param null|int   $Row    Index
     *
     * @return Cell
     */
    public function getCell($Column, $Row = null)
    {

        if (preg_match('![a-z]!is', $Column)) {
            $Coordinate = \PHPExcel_Cell::coordinateFromString($Column);
            $Column = \PHPExcel_Cell::columnIndexFromString($Coordinate[0]) - 1;
            $Row = $Coordinate[1];
        } else {
            $Row += 1;
        }
        return new Cell($Column, $Row);
    }

    /**
     * @param Cell  $Cell
     * @param mixed $Value
     * @param string $Type
     *
     * @return $this
     */
    public function setValue(Cell $Cell, $Value, $Type = PhpExcel::TYPE_STRING)
    {

        $this->Source->getActiveSheet()->setCellValueExplicitByColumnAndRow($Cell->getColumn(), $Cell->getRow(),
            $Value, $Type);
        return $this;
    }

    /**
     * @param Cell $Cell
     *
     * @return mixed
     */
    public function getValue(Cell $Cell)
    {

        return $this->Source->getActiveSheet()->getCellByColumnAndRow($Cell->getColumn(),
            $Cell->getRow())->getValue();
    }

    /**
     * @param Cell      $Cell  Single Cell or Top-Left
     * @param Cell|null $Range Bottom-Right
     *
     * @return Style
     */
    public function setStyle(Cell $Cell, Cell $Range = null)
    {

        return new Style($this->Source->getActiveSheet(), $Cell, $Range);
    }

    /**
     * @return int
     */
    public function getSheetColumnCount()
    {

        return \PHPExcel_Cell::columnIndexFromString(
            $this->Source->getActiveSheet()->getHighestColumn()
        );
    }

    /**
     * @return int
     */
    public function getSheetRowCount()
    {

        return $this->Source->getActiveSheet()->getHighestRow();
    }
}
