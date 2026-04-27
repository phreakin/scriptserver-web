<?php
/**
 * Partnership / sponsorship / brand deal inquiry endpoint
 * POST /api/inquiry.php
 */

declare(strict_types=1);

header('Content-Type: application/json');
header('X-Content-Type-Options: nosniff');

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

$inquiryType  = sanitize($_POST['inquiry_type']     ?? '');
$companyName  = sanitize($_POST['company_name']     ?? '');
$contactName  = sanitize($_POST['contact_name']     ?? '');
$email        = sanitize($_POST['email']            ?? '');
$budget       = sanitize($_POST['budget']           ?? '');
$message      = sanitize($_POST['message']          ?? '');

$allowedTypes = ['sponsorship', 'brand_deal', 'partnership'];
if (!in_array($inquiryType, $allowedTypes, true)) {
    jsonResponse(false, 'Invalid inquiry type.', 422);
}

if ($companyName === '' || $contactName === '' || $email === '' || $message === '') {
    jsonResponse(false, 'Please fill in all required fields.', 422);
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    jsonResponse(false, 'Please enter a valid email address.', 422);
}

// ---- Honeypot check ------------------------------------------------
if (!empty($_POST['website_url'])) {
    jsonResponse(true, 'Thank you! Your inquiry has been received.');
}

// ---- Rate limiting -------------------------------------------------
session_start();
$ipKey = 'inquiry_last_' . md5($_SERVER['REMOTE_ADDR'] ?? 'unknown');
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
        'INSERT INTO partnership_inquiries
            (inquiry_type, company_name, contact_name, email, budget, message, ip_address)
         VALUES
            (:inquiry_type, :company_name, :contact_name, :email, :budget, :message, :ip)'
    );
    $stmt->execute([
        ':inquiry_type'  => $inquiryType,
        ':company_name'  => $companyName,
        ':contact_name'  => $contactName,
        ':email'         => $email,
        ':budget'        => $budget,
        ':message'       => $message,
        ':ip'            => $_SERVER['REMOTE_ADDR'] ?? null,
    ]);
} catch (Exception $e) {
    error_log('inquiry submission DB error: ' . $e->getMessage());
}

jsonResponse(true, "Thank you! Your inquiry has been received. We'll review it and be in touch shortly.");
