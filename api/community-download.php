<?php
/**
 * Community download endpoint
 * GET /api/community-download.php?id={item_id}
 *
 * Increments the download counter for the given item and redirects the
 * visitor to the item's content URL.  If the database is unavailable the
 * request is rejected with 503 so the front-end can surface a useful error.
 */

declare(strict_types=1);

header('X-Content-Type-Options: nosniff');

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    exit('Method not allowed.');
}

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id || $id < 1) {
    http_response_code(400);
    exit('Invalid item ID.');
}

try {
    require_once __DIR__ . '/../config/database.php';
    $pdo = db_connect();

    // Fetch the published item
    $stmt = $pdo->prepare(
        'SELECT id, content_url FROM community_items WHERE id = :id AND published = 1'
    );
    $stmt->execute([':id' => $id]);
    $item = $stmt->fetch();

    if (!$item) {
        http_response_code(404);
        exit('Item not found.');
    }

    // Increment download counter (best-effort; non-fatal on failure)
    $pdo->prepare('UPDATE community_items SET download_count = download_count + 1 WHERE id = :id')
        ->execute([':id' => $id]);

    // Redirect to the actual content URL
    $url = filter_var($item['content_url'], FILTER_VALIDATE_URL);
    if (!$url) {
        http_response_code(502);
        exit('Invalid content URL.');
    }

    header('Location: ' . $url, true, 302);
    exit;

} catch (Exception $e) {
    error_log('community-download error: ' . $e->getMessage());
    http_response_code(503);
    exit('Service temporarily unavailable. Please try again later.');
}
