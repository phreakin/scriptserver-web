<?php
/**
 * ScriptServer Web – Front Controller
 *
 * All requests are routed through this file via .htaccess.
 * Each route maps to a PHP file in the /pages directory.
 */

declare(strict_types=1);

// ---------- Basic hardening ----------
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN');
header('X-XSS-Protection: 1; mode=block');
header('Referrer-Policy: strict-origin-when-cross-origin');

// ---------- Routing ------------------
$requestUri  = $_SERVER['REQUEST_URI'] ?? '/';
$path        = parse_url($requestUri, PHP_URL_PATH);
$path        = rtrim($path, '/') ?: '/';

// Normalise: strip query string, decode, collapse double slashes
$path = preg_replace('#/+#', '/', $path);

// Map clean URL paths to page files
$routes = [
    '/'             => 'pages/home.php',
    '/platform'     => 'pages/platform.php',
    '/features'     => 'pages/features.php',
    '/content'      => 'pages/content.php',
    '/videos'       => 'pages/videos.php',
    '/articles'     => 'pages/articles.php',
    '/clips'        => 'pages/clips.php',
    '/repost'       => 'pages/repost.php',
    '/sponsorships' => 'pages/sponsorships.php',
    '/brand-deals'  => 'pages/brand-deals.php',
    '/partnerships' => 'pages/partnerships.php',
    '/about'        => 'pages/about.php',
    '/contact'      => 'pages/contact.php',
    '/privacy'      => 'pages/privacy.php',
    '/terms'        => 'pages/terms.php',
];

if (isset($routes[$path])) {
    $file = __DIR__ . '/' . $routes[$path];
    if (is_file($file)) {
        require $file;
        exit;
    }
}

// ---------- 404 ----------------------
http_response_code(404);
require __DIR__ . '/pages/404.php';
