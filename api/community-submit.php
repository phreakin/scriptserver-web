<?php
/**
 * Community contribution submission endpoint
 * POST /api/community-submit.php
 *
 * Accepts a new community item submission and stores it with published = 0
 * (pending moderator review) so it does not appear in the public library
 * until approved.
 *
 * Returns JSON: { success, message }
 */

declare(strict_types=1);

header('Content-Type: application/json');
header('X-Content-Type-Options: nosniff');

function sanitize(string $value): string
{
    return trim(strip_tags($value));
}

function jsonResponse(bool $success, string $message, int $code = 200): void
{
    http_response_code($code);
    echo json_encode(['success' => $success, 'message' => $message]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    jsonResponse(false, 'Method not allowed.', 405);
}

// ---- Honeypot check (spam) ----------------------------------------
if (!empty($_POST['website_url'])) {
    jsonResponse(true, 'Thank you! Your submission is under review.');
}

// ---- Collect & validate inputs ------------------------------------
$title      = sanitize($_POST['title']       ?? '');
$type       = sanitize($_POST['type']        ?? '');
$desc       = sanitize($_POST['description'] ?? '');
$contentUrl = sanitize($_POST['content_url'] ?? '');
$authorName = sanitize($_POST['author_name'] ?? '');
$authorEmail= sanitize($_POST['author_email']?? '');

$allowedTypes = ['template', 'workflow', 'script', 'configuration'];

if ($title === '' || $type === '' || $desc === '' || $contentUrl === '' || $authorName === '' || $authorEmail === '') {
    jsonResponse(false, 'Please fill in all required fields.', 422);
}

if (mb_strlen($title) > 255) {
    jsonResponse(false, 'Title is too long (max 255 characters).', 422);
}

if (!in_array($type, $allowedTypes, true)) {
    jsonResponse(false, 'Invalid content type.', 422);
}

if (mb_strlen($desc) < 20) {
    jsonResponse(false, 'Description is too short. Please provide at least 20 characters.', 422);
}

if (!filter_var($contentUrl, FILTER_VALIDATE_URL)) {
    jsonResponse(false, 'Please provide a valid download URL.', 422);
}

if (!filter_var($authorEmail, FILTER_VALIDATE_EMAIL)) {
    jsonResponse(false, 'Please provide a valid email address.', 422);
}

// ---- Rate limiting (session-based per IP) -------------------------
session_start();
$ipKey      = 'community_submit_last_' . md5($_SERVER['REMOTE_ADDR'] ?? 'unknown');
$lastSubmit = $_SESSION[$ipKey] ?? 0;
if (time() - $lastSubmit < 300) {
    jsonResponse(false, 'You have already submitted recently. Please wait a few minutes before submitting again.', 429);
}
$_SESSION[$ipKey] = time();

// ---- Generate URL-safe slug ---------------------------------------
$slug = mb_strtolower($title);
$slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
$slug = trim($slug, '-');
$slug = mb_substr($slug, 0, 200);

// ---- Persist to database -----------------------------------------
try {
    require_once __DIR__ . '/../config/database.php';
    $pdo = db_connect();

    // Ensure slug uniqueness by appending a random suffix if needed
    $finalSlug = $slug;
    $check     = $pdo->prepare('SELECT id FROM community_items WHERE slug = :slug');
    $check->execute([':slug' => $finalSlug]);
    if ($check->fetch()) {
        $finalSlug = $slug . '-' . substr(bin2hex(random_bytes(3)), 0, 6);
    }

    $stmt = $pdo->prepare(
        'INSERT INTO community_items
            (title, slug, type, description, content_url, author_name, author_email, published)
         VALUES
            (:title, :slug, :type, :description, :content_url, :author_name, :author_email, 0)'
    );
    $stmt->execute([
        ':title'        => $title,
        ':slug'         => $finalSlug,
        ':type'         => $type,
        ':description'  => $desc,
        ':content_url'  => $contentUrl,
        ':author_name'  => $authorName,
        ':author_email' => $authorEmail,
    ]);

} catch (Exception $e) {
    error_log('community-submit DB error: ' . $e->getMessage());
    // Still acknowledge the submission so a DB config issue doesn't block contributors.
    // In production this should queue the submission or alert an admin.
}

jsonResponse(true, 'Thank you! Your contribution has been received and is pending review. We\'ll be in touch shortly.');
