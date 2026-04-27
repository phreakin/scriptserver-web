<?php
$pageTitle = '404 – Page Not Found – ScriptServer';
$pageDesc  = 'The page you are looking for does not exist.';
require __DIR__ . '/../includes/header.php';
?>

<div class="error-page section" role="main" aria-labelledby="error-heading">
    <div class="container" style="text-align:center;">
        <div class="error-code" aria-hidden="true">404</div>
        <h1 id="error-heading" style="margin-bottom:.75rem;">Page not found</h1>
        <p style="max-width:420px;margin-inline:auto;margin-bottom:2rem;">
            The page you're looking for doesn't exist or has been moved.
        </p>
        <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;">
            <a href="/" class="btn btn-primary btn-lg">Back to Home</a>
            <a href="/contact" class="btn btn-outline btn-lg">Contact Us</a>
        </div>
    </div>
</div>

<?php require __DIR__ . '/../includes/footer.php'; ?>
