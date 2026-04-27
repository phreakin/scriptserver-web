<?php
/**
 * PHP Built-in Server Router
 * Usage: php -S 127.0.0.1:8080 router.php
 *
 * When using the PHP built-in server, returning false tells PHP to
 * serve the requested file from disk directly (for CSS, JS, images, etc.).
 * All other requests are routed through the front controller.
 */

// Serve static files directly
$requestedFile = __DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if (is_file($requestedFile)) {
    return false; // Let PHP serve the file natively
}

// Route dynamic requests through the front controller
require __DIR__ . '/index.php';
