<?php

/**
 * ICLABS - Laboratory Information System
 * Front Controller
 */

// 1. SET TIMEZONE WITA (MAKASSAR)
date_default_timezone_set('Asia/Makassar');

// Start session
session_start();

// Define constants
define('ROOT_PATH', dirname(__DIR__));
define('APP_PATH', ROOT_PATH . '/app');
define('PUBLIC_PATH', ROOT_PATH . '/public');

// Dynamic BASE_URL detection
if (isset($_SERVER['HTTP_HOST']) && isset($_SERVER['SCRIPT_NAME'])) {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    $dir = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/');
    define('BASE_URL', $protocol . '://' . $host . $dir);
} else {
    define('BASE_URL', 'http://localhost/SistemInformasiFikom/public');
}

// Autoload
require_once APP_PATH . '/core/Router.php';
require_once APP_PATH . '/core/Controller.php';
require_once APP_PATH . '/core/Model.php';
require_once APP_PATH . '/controllers/ErrorController.php'; // Error handling
require_once APP_PATH . '/config/constants.php';
require_once APP_PATH . '/config/database.php';
require_once APP_PATH . '/helpers/functions.php';
require_once ROOT_PATH . '/vendor/autoload.php'; // Composer autoload for PhpSpreadsheet

// Initialize Router
$router = new Router();

// Define routes
require_once APP_PATH . '/config/routes.php';

// Run router
$router->dispatch();
