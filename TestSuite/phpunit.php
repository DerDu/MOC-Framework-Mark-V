<?php
namespace MOC\V\TestSuite;

/**
 * MUST start session at this point for tests
 */
\session_start();

/**
 * Setup: Php
 */
header('Content-type: text/html; charset=utf-8');
error_reporting(E_ALL ^ E_WARNING);
//ini_set('display_errors', 1);
ini_set('display_errors', 0);
date_default_timezone_set('Europe/Berlin');
session_write_close();
set_time_limit(240);
ob_implicit_flush();
ini_set('memory_limit', '1024M');
set_include_path(get_include_path().PATH_SEPARATOR.__DIR__.'/../');

/**
 * Setup: Loader
 */
use MOC\V\Core\AutoLoader\AutoLoader;

require_once( __DIR__.'/../Core/AutoLoader/AutoLoader.php' );
AutoLoader::getNamespaceAutoLoader('\MOC\V', __DIR__.'/../');

// Compatibility PhpUnit vs. PhpVersion
// Backward PHP < 7.0 (PhpUnit < 6)
if (
    !class_exists('\PHPUnit\Framework\TestCase', true)
    && class_exists('\PHPUnit_Framework_TestCase', true)
) {
    class_alias('\PHPUnit_Framework_TestCase', '\PHPUnit\Framework\TestCase', true);
    // PHP 5.3
//    class_alias('\PHPUnit_Framework_TestCase', 'PHPUnit\Framework\TestCase', true);
}
// Forward PHP 7.0 (PhpUnit 6)
if (
    class_exists('\PHPUnit\Framework\TestCase', true)
    && !class_exists('\PHPUnit_Framework_TestCase', true)
) {
    class_alias('\PHPUnit\Framework\TestCase', '\PHPUnit_Framework_TestCase', true);
}
if (
    class_exists('\PHPUnit\Framework\TestResult', true)
    && !class_exists('\PHPUnit_Framework_TestResult', true)
) {
    class_alias('\PHPUnit\Framework\TestResult', '\PHPUnit_Framework_TestResult', true);
}
if (
    class_exists('\PHPUnit\Framework\Error\Notice', true)
    && !class_exists('\PHPUnit_Framework_Error_Notice', true)
) {
    class_alias('\PHPUnit\Framework\Error\Notice', '\PHPUnit_Framework_Error_Notice', true);
}