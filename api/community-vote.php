<?php
/**
 * Community vote endpoint
 * POST /api/community-vote.php
 *
 * Accepts an upvote (1) or downvote (-1) for a community item.
 * One vote per IP address per item, enforced via the community_votes table
 * unique constraint on (item_id, ip_hash).  A second vote with the same
 * direction cancels (removes) the existing vote; a second vote with the
 * opposite direction replaces it.
 *
 * Returns JSON: { success, score, user_vote }
 *   user_vote: 1 | -1 | 0  (0 means no active vote after this action)
 */

declare(strict_types=1);

header('Content-Type: application/json');
header('X-Content-Type-Options: nosniff');

function jsonResponse(bool $success, string $message, array $extra = [], int $code = 200): void
{
    http_response_code($code);
    echo json_encode(array_merge(['success' => $success, 'message' => $message], $extra));
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    jsonResponse(false, 'Method not allowed.', [], 405);
}

$itemId = filter_input(INPUT_POST, 'item_id', FILTER_VALIDATE_INT);
$vote   = filter_input(INPUT_POST, 'vote',    FILTER_VALIDATE_INT);

if (!$itemId || $itemId < 1) {
    jsonResponse(false, 'Invalid item ID.', [], 400);
}

if ($vote !== 1 && $vote !== -1) {
    jsonResponse(false, 'Vote must be 1 (upvote) or -1 (downvote).', [], 400);
}

$ipHash = hash('sha256', $_SERVER['REMOTE_ADDR'] ?? 'unknown');

try {
    require_once __DIR__ . '/../config/database.php';
    $pdo = db_connect();

    // Verify the item exists and is published
    $stmt = $pdo->prepare('SELECT id FROM community_items WHERE id = :id AND published = 1');
    $stmt->execute([':id' => $itemId]);
    if (!$stmt->fetch()) {
        jsonResponse(false, 'Item not found.', [], 404);
    }

    // Check for an existing vote from this IP on this item
    $stmt = $pdo->prepare(
        'SELECT vote FROM community_votes WHERE item_id = :item_id AND ip_hash = :ip_hash'
    );
    $stmt->execute([':item_id' => $itemId, ':ip_hash' => $ipHash]);
    $existing = $stmt->fetchColumn();

    $pdo->beginTransaction();

    if ($existing !== false) {
        if ((int)$existing === $vote) {
            // Same vote again → cancel (remove the vote)
            $pdo->prepare('DELETE FROM community_votes WHERE item_id = :item_id AND ip_hash = :ip_hash')
                ->execute([':item_id' => $itemId, ':ip_hash' => $ipHash]);

            // Reverse the score change
            $pdo->prepare('UPDATE community_items SET vote_score = vote_score - :v WHERE id = :id')
                ->execute([':v' => $vote, ':id' => $itemId]);

            $userVote = 0;
        } else {
            // Opposite vote → replace
            $pdo->prepare(
                'UPDATE community_votes SET vote = :vote WHERE item_id = :item_id AND ip_hash = :ip_hash'
            )->execute([':vote' => $vote, ':item_id' => $itemId, ':ip_hash' => $ipHash]);

            // Score changes by 2× the new vote (removes old, adds new)
            $delta = $vote * 2;
            $pdo->prepare('UPDATE community_items SET vote_score = vote_score + :d WHERE id = :id')
                ->execute([':d' => $delta, ':id' => $itemId]);

            $userVote = $vote;
        }
    } else {
        // New vote
        $pdo->prepare(
            'INSERT INTO community_votes (item_id, ip_hash, vote) VALUES (:item_id, :ip_hash, :vote)'
        )->execute([':item_id' => $itemId, ':ip_hash' => $ipHash, ':vote' => $vote]);

        $pdo->prepare('UPDATE community_items SET vote_score = vote_score + :v WHERE id = :id')
            ->execute([':v' => $vote, ':id' => $itemId]);

        $userVote = $vote;
    }

    // Fetch updated score
    $stmt = $pdo->prepare('SELECT vote_score FROM community_items WHERE id = :id');
    $stmt->execute([':id' => $itemId]);
    $newScore = (int)$stmt->fetchColumn();

    $pdo->commit();

    jsonResponse(true, 'Vote recorded.', ['score' => $newScore, 'user_vote' => $userVote]);

} catch (Exception $e) {
    if (isset($pdo) && $pdo->inTransaction()) {
        $pdo->rollBack();
    }
    error_log('community-vote error: ' . $e->getMessage());
    jsonResponse(false, 'Could not record your vote. Please try again.', [], 500);
}
