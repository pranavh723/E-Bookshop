<?php
/**
 * PHP Built-in Server Router for CodeIgniter 3
 */

// If we are at the root, serve home
if ($_SERVER['REQUEST_URI'] == '/' || $_SERVER['REQUEST_URI'] == '') {
    $_SERVER['REQUEST_URI'] = '/home';
}

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// 1. Serve static files directly if they exist
if ($uri !== '/' && file_exists(__DIR__ . $uri)) {
    return false;
}

// 2. Normalize server variables for CodeIgniter 3's built-in server environment
$_SERVER['SCRIPT_NAME'] = '/index.php';

// CodeIgniter 3's URI detection is very sensitive on the built-in server
// Set REQUEST_URI to exactly what CI expects if it doesn't contain index.php
if (strpos($_SERVER['REQUEST_URI'], '/index.php') !== 0) {
    $_SERVER['REQUEST_URI'] = '/index.php' . $_SERVER['REQUEST_URI'];
}

// Set PHP_SELF to match the normalized REQUEST_URI
$_SERVER['PHP_SELF'] = $_SERVER['REQUEST_URI'];

// 3. Load the index.php script
require_once __DIR__ . '/index.php';
