<?php
/**
 * PHP Built-in Server Router for CodeIgniter 3
 */

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// 1. Serve static files directly if they exist
if ($uri !== '/' && file_exists(__DIR__ . $uri)) {
    return false;
}

// 2. Normalize server variables for CodeIgniter 3
$_SERVER['SCRIPT_NAME'] = '/index.php';

// Force the URI to be handled by index.php
// If we are at root, go to /index.php/home
if ($uri == '/' || $uri == '') {
    $_SERVER['REQUEST_URI'] = '/index.php/home';
    $_SERVER['PHP_SELF'] = '/index.php/home';
} else {
    // If index.php is not present in the URI, prepend it
    if (strpos($uri, '/index.php') !== 0) {
        $_SERVER['REQUEST_URI'] = '/index.php' . $uri;
        $_SERVER['PHP_SELF'] = '/index.php' . $uri;
    } else {
        $_SERVER['REQUEST_URI'] = $uri;
        $_SERVER['PHP_SELF'] = $uri;
    }
}

require_once __DIR__ . '/index.php';
