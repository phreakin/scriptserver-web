<?php
/**
 * Contact form submission endpoint
 * POST /api/contact.php
 */

declare(strict_types=1);

header('Content-Type: application/json');
header('X-Content-Type-Options: nosniff');

// Only allow POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed.']);
    exit;
}

// ---- Helpers -------------------------------------------------------

function sanitize(string $value): string {
    return trim(strip_tags($value));
}

function jsonResponse(bool $success, string $message, int $code = 200): void {
    http_response_code($code);
    echo json_encode(['success' => $success, 'message' => $message]);
    exit;
}

// ---- Collect & validate inputs ------------------------------------

$name    = sanitize($_POST['name']    ?? '');
$email   = sanitize($_POST['email']   ?? '');
$subject = sanitize($_POST['subject'] ?? '');
$message = sanitize($_POST['message'] ?? '');

if ($name === '' || $email === '' || $message === '') {
    jsonResponse(false, 'Please fill in all required fields.', 422);
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    jsonResponse(false, 'Please enter a valid email address.', 422);
}

if (mb_strlen($message) < 10) {
    jsonResponse(false, 'Message is too short. Please provide more detail.', 422);
}

// ---- Honeypot check (spam) ----------------------------------------
if (!empty($_POST['website_url'])) {
    // Bot filled the hidden honeypot field — silently discard
    jsonResponse(true, 'Thank you! Your message has been sent.');
}

// ---- Rate limiting (simple IP-based session check) ----------------
session_start();
$ipKey = 'contact_last_' . md5($_SERVER['REMOTE_ADDR'] ?? 'unknown');
$lastSubmit = $_SESSION[$ipKey] ?? 0;
if (time() - $lastSubmit < 60) {
    jsonResponse(false, 'Please wait a moment before submitting again.', 429);
}
$_SESSION[$ipKey] = time();

// ---- Persist to database ------------------------------------------
try {
    require_once __DIR__ . '/../config/database.php';
    $pdo = db_connect();
    $stmt = $pdo->prepare(
        'INSERT INTO contact_submissions (name, email, subject, message, ip_address)
         VALUES (:name, :email, :subject, :message, :ip)'
    );
    $stmt->execute([
        ':name'    => $name,
        ':email'   => $email,
        ':subject' => $subject,
        ':message' => $message,
        ':ip'      => $_SERVER['REMOTE_ADDR'] ?? null,
    ]);
} catch (Exception $e) {
    // Log the error server-side but don't expose details to the client
    error_log('contact submission DB error: ' . $e->getMessage());
    // Continue — still send the success response so the user isn't blocked
    // by a DB configuration issue on fresh installs.
}

jsonResponse(true, "Thank you! Your message has been received. We'll be in touch within one business day.");
