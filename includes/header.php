<?php
/**
 * Shared site header – included at the top of every page.
 *
 * Expects the following variables to be set before including:
 *   $pageTitle       (string)  – <title> tag value
 *   $pageDesc        (string)  – meta description
 *   $bodyClass       (string)  – optional extra class for <body>
 */

$pageTitle = $pageTitle ?? 'ScriptServer – Automate Your Content Pipeline';
$pageDesc  = $pageDesc  ?? 'ScriptServer is a web-based automation platform that transforms video ideas into complete content packages: scripts, assets, videos, clips, social posts, articles, and analytics.';
$bodyClass = $bodyClass ?? '';

$siteUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . ($_SERVER['HTTP_HOST'] ?? 'scriptserver.io');
$currentPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
    <meta name="description" content="<?= htmlspecialchars($pageDesc, ENT_QUOTES, 'UTF-8') ?>">
    <meta name="robots" content="index, follow">

    <!-- Open Graph -->
    <meta property="og:type"        content="website">
    <meta property="og:title"       content="<?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?>">
    <meta property="og:description" content="<?= htmlspecialchars($pageDesc, ENT_QUOTES, 'UTF-8') ?>">
    <meta property="og:url"         content="<?= htmlspecialchars($siteUrl . $currentPath, ENT_QUOTES, 'UTF-8') ?>">
    <meta property="og:image"       content="<?= htmlspecialchars($siteUrl, ENT_QUOTES, 'UTF-8') ?>/assets/img/og-default.png">

    <!-- Twitter Card -->
    <meta name="twitter:card"        content="summary_large_image">
    <meta name="twitter:title"       content="<?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($pageDesc, ENT_QUOTES, 'UTF-8') ?>">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Fira+Code:wght@400;500&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="/assets/css/style.css">

    <!-- Favicon (SVG placeholder) -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect width='100' height='100' rx='20' fill='%237c3aed'/><text y='.9em' font-size='70' x='15'>⚡</text></svg>">
</head>
<body class="<?= htmlspecialchars($bodyClass, ENT_QUOTES, 'UTF-8') ?>">

<!-- =========================================================
     NAVIGATION
     ========================================================= -->
<nav id="site-nav" role="navigation" aria-label="Main navigation">
    <div class="container nav-inner">

        <!-- Logo -->
        <a href="/" class="nav-logo" aria-label="ScriptServer home">
            <div class="logo-icon" aria-hidden="true">⚡</div>
            <span>ScriptServer</span>
        </a>

        <!-- Desktop nav links -->
        <ul class="nav-links" role="list">
            <li><a href="/">Home</a></li>
            <li class="nav-dropdown">
                <a href="/platform" role="button" aria-haspopup="true">Platform</a>
                <ul class="dropdown-menu" aria-label="Platform submenu">
                    <li><a href="/platform">Overview</a></li>
                    <li><a href="/features">Features</a></li>
                </ul>
            </li>
            <li class="nav-dropdown">
                <a href="/content" role="button" aria-haspopup="true">Content</a>
                <ul class="dropdown-menu" aria-label="Content submenu">
                    <li><a href="/content">All Content</a></li>
                    <li><a href="/videos">Videos</a></li>
                    <li><a href="/articles">Articles</a></li>
                    <li><a href="/clips">Clips</a></li>
                    <li><a href="/repost">Reposts</a></li>
                </ul>
            </li>
            <li class="nav-dropdown">
                <a href="/sponsorships" role="button" aria-haspopup="true">Grow</a>
                <ul class="dropdown-menu" aria-label="Business submenu">
                    <li><a href="/sponsorships">Sponsorships</a></li>
                    <li><a href="/brand-deals">Brand Deals</a></li>
                    <li><a href="/partnerships">Partnerships</a></li>
                </ul>
            </li>
            <li><a href="/community">Community</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/contact">Contact</a></li>
        </ul>

        <!-- Desktop CTA -->
        <div class="nav-cta">
            <a href="/contact" class="btn btn-outline btn-sm">Get in Touch</a>
            <a href="/platform" class="btn btn-primary btn-sm">Get Started</a>
        </div>

        <!-- Mobile toggle -->
        <button id="nav-toggle" class="nav-toggle" aria-label="Toggle mobile menu" aria-expanded="false" aria-controls="mobile-menu">
            <div class="hamburger" aria-hidden="true">
                <span></span><span></span><span></span>
            </div>
        </button>
    </div>

    <!-- Mobile menu -->
    <div id="mobile-menu" class="container hidden" role="menu" aria-label="Mobile navigation">
        <a href="/" role="menuitem">Home</a>
        <a href="/platform" role="menuitem">Platform</a>
        <a href="/features" role="menuitem">Features</a>
        <a href="/content" role="menuitem">Content</a>
        <a href="/videos" role="menuitem">Videos</a>
        <a href="/articles" role="menuitem">Articles</a>
        <a href="/clips" role="menuitem">Clips</a>
        <a href="/repost" role="menuitem">Reposts</a>
        <a href="/sponsorships" role="menuitem">Sponsorships</a>
        <a href="/brand-deals" role="menuitem">Brand Deals</a>
        <a href="/partnerships" role="menuitem">Partnerships</a>
        <a href="/community" role="menuitem">Community</a>
        <a href="/about" role="menuitem">About</a>
        <a href="/contact" role="menuitem">Contact</a>
        <div style="margin-top:.75rem; display:flex; gap:.5rem;">
            <a href="/contact" class="btn btn-outline btn-sm w-full" style="justify-content:center;">Get in Touch</a>
            <a href="/platform" class="btn btn-primary btn-sm w-full" style="justify-content:center;">Get Started</a>
        </div>
    </div>
</nav>
