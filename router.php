<?php
/**
 * PHP Built-in Server Router for CodeIgniter
 * This handles URL rewriting similar to .htaccess
 */

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// Serve static files directly
if ($uri !== '/' && file_exists(__DIR__ . $uri)) {
    $extension = pathinfo($uri, PATHINFO_EXTENSION);
    $mimeTypes = [
        'css'  => 'text/css',
        'js'   => 'application/javascript',
        'json' => 'application/json',
        'png'  => 'image/png',
        'jpg'  => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'gif'  => 'image/gif',
        'svg'  => 'image/svg+xml',
        'ico'  => 'image/x-icon',
        'woff' => 'font/woff',
        'woff2'=> 'font/woff2',
        'ttf'  => 'font/ttf',
        'eot'  => 'application/vnd.ms-fontobject',
        'pdf'  => 'application/pdf',
    ];
    
    if (isset($mimeTypes[$extension])) {
        header('Content-Type: ' . $mimeTypes[$extension]);
    }
    
    return false; // Let PHP's built-in server handle it
}

// Pass all other requests to CodeIgniter
$_SERVER['SCRIPT_NAME'] = '/index.php';
// For built-in server, we need to handle the index.php correctly
$_SERVER['PHP_SELF'] = '/index.php' . $uri;

require_once __DIR__ . '/index.php';
