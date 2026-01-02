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

// If we are at root, or the URI doesn't contain index.php, force it
if ($uri == '/' || $uri == '' || strpos($uri, '/index.php') !== 0) {
    $target_uri = ($uri == '/' || $uri == '') ? '/home' : $uri;
    $_SERVER['REQUEST_URI'] = '/index.php' . $target_uri;
    $_SERVER['PHP_SELF'] = '/index.php' . $target_uri;
}

require_once __DIR__ . '/index.php';
