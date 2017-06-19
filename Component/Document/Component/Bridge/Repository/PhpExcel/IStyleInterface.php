<?php

namespace MOC\V\Component\Document\Component\Bridge\Repository\PhpExcel;

/**
 * Interface IStyleInterface
 *
 * @see PHPExcel_Style_NumberFormat
 * @package MOC\V\Component\Document\Component\Bridge\Repository\PhpExcel
 */
interface IStyleInterface
{
    /* Pre-defined formats */
    const FORMAT_GENERAL = 'General';

    const FORMAT_TEXT = '@';

    const FORMAT_NUMBER = '0';
    const FORMAT_NUMBER_00 = '0.00';
    const FORMAT_NUMBER_COMMA_SEPARATED1 = '#,##0.00';
    const FORMAT_NUMBER_COMMA_SEPARATED2 = '#,##0.00_-';

    const FORMAT_PERCENTAGE = '0%';
    const FORMAT_PERCENTAGE_00 = '0.00%';

    const FORMAT_DATE_YYYYMMDD2 = 'yyyy-mm-dd';
    const FORMAT_DATE_YYYYMMDD = 'yy-mm-dd';
    const FORMAT_DATE_DDMMYYYY = 'dd/mm/yy';
    const FORMAT_DATE_DMYSLASH = 'd/m/y';
    const FORMAT_DATE_DMYMINUS = 'd-m-y';
    const FORMAT_DATE_DMMINUS = 'd-m';
    const FORMAT_DATE_MYMINUS = 'm-y';
    const FORMAT_DATE_XLSX14 = 'mm-dd-yy';
    const FORMAT_DATE_XLSX15 = 'd-mmm-yy';
    const FORMAT_DATE_XLSX16 = 'd-mmm';
    const FORMAT_DATE_XLSX17 = 'mmm-yy';
    const FORMAT_DATE_XLSX22 = 'm/d/yy h:mm';
    const FORMAT_DATE_DATETIME = 'd/m/y h:mm';
    const FORMAT_DATE_TIME1 = 'h:mm AM/PM';
    const FORMAT_DATE_TIME2 = 'h:mm:ss AM/PM';
    const FORMAT_DATE_TIME3 = 'h:mm';
    const FORMAT_DATE_TIME4 = 'h:mm:ss';
    const FORMAT_DATE_TIME5 = 'mm:ss';
    const FORMAT_DATE_TIME6 = 'h:mm:ss';
    const FORMAT_DATE_TIME7 = 'i:s.S';
    const FORMAT_DATE_TIME8 = 'h:mm:ss;@';
    const FORMAT_DATE_YYYYMMDDSLASH = 'yy/mm/dd;@';

    const FORMAT_CURRENCY_USD_SIMPLE = '"$"#,##0.00_-';
    const FORMAT_CURRENCY_USD = '$#,##0_-';
    const FORMAT_CURRENCY_EUR_SIMPLE = '[$EUR ]#,##0.00_-';
}