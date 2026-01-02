<?php
/**
 * PHP Built-in Server Router for CodeIgniter 3
 */

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// 1. Handle potential subdirectory in URI (e.g., /e-bookshop/)
// This allows the app to work both on Replit (root) and local XAMPP (/e-bookshop/)
$base_path = '/e-bookshop';
if (strpos($uri, $base_path) === 0) {
    $uri = substr($uri, strlen($base_path));
}

// Ensure $uri starts with a slash
if (empty($uri) || $uri[0] !== '/') {
    $uri = '/' . $uri;
}

// 2. Serve static files directly if they exist
// We ensure we don't try to serve directory indexes as static files
if ($uri !== '/' && !is_dir(__DIR__ . $uri) && file_exists(__DIR__ . $uri)) {
    return false;
}

// 3. Normalize server variables for CodeIgniter 3
$_SERVER['SCRIPT_NAME'] = '/index.php';

// Force the URI to be handled by index.php
// Map empty, root, or index.php URIs to the home controller
if ($uri == '/' || $uri == '/index.php' || $uri == '/index.php/') {
    $_SERVER['REQUEST_URI'] = '/index.php/home';
    $_SERVER['PHP_SELF'] = '/index.php/home';
} else {
    // If index.php is not present in the URI, prepend it for CodeIgniter's routing
    if (strpos($uri, '/index.php') !== 0) {
        $_SERVER['REQUEST_URI'] = '/index.php' . $uri;
        $_SERVER['PHP_SELF'] = '/index.php' . $uri;
    } else {
        $_SERVER['REQUEST_URI'] = $uri;
        $_SERVER['PHP_SELF'] = $uri;
    }
}

require_once __DIR__ . '/index.php';
