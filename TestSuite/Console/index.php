<?php
namespace Bar;

use MOC\V\Component\Document\Component\Bridge\Repository\PhpExcel;
use MOC\V\Component\Document\Component\Parameter\Repository\PaperOrientationParameter;
use MOC\V\Component\Document\Document;
use MOC\V\Core\AutoLoader\AutoLoader;

/**
 * Setup: Php
 */
header( 'Content-type: text/html; charset=utf-8' );
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );
session_start();
session_write_close();
date_default_timezone_set( 'Europe/Berlin' );
/**
 * Setup: Loader
 */
require_once( __DIR__.'/../../Core/AutoLoader/AutoLoader.php' );
AutoLoader::getNamespaceAutoLoader( '\MOC\V', __DIR__.'/../../' );

$ValueTest = array(
    '23.11.1980',
    'öäüß;',
    '001'
);
foreach ($ValueTest as $Value) {
    /** @var PhpExcel $Document */
    $Document = Document::getDocument( 'test.xlsx' );
    $Document->setPaperOrientationParameter( new PaperOrientationParameter( 'LANDSCAPE' ) );
    $Document->setValue( $Document->getCell( 'A1' ), $Value );
    $Document->saveFile();
    $Document = Document::getDocument( 'test.xlsx' );
    var_dump( $Document->getValue( $Document->getCell( 'A1' ) ) );
}
