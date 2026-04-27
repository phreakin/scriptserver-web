<?php
$pageTitle = 'Community Hub – ScriptServer';
$pageDesc  = 'Download community-contributed templates, workflows, scripts, and configurations. Rate content, track the most popular, and share your own with the ScriptServer community.';
require __DIR__ . '/../includes/header.php';

// Fetch all published community items from the database (fall back to demo data if DB not available)
$items = [];
try {
    require_once __DIR__ . '/../config/database.php';
    $pdo  = db_connect();
    $stmt = $pdo->query(
        'SELECT id, title, slug, type, description, author_name, download_count, vote_score, created_at
         FROM community_items
         WHERE published = 1
         ORDER BY created_at DESC'
    );
    $items = $stmt->fetchAll();
} catch (Exception $e) {
    error_log('community page DB error: ' . $e->getMessage());
    // Use demo data so the page is still useful before the DB is configured
    $items = [
        ['id'=>1,'title'=>'YouTube Automation Workflow','slug'=>'youtube-automation-workflow','type'=>'workflow','description'=>'End-to-end workflow for automating YouTube video production and scheduling with ScriptServer.','author_name'=>'Alex M.','download_count'=>312,'vote_score'=>87,'created_at'=>'2025-04-01 10:00:00'],
        ['id'=>2,'title'=>'Weekly Newsletter Template','slug'=>'weekly-newsletter-template','type'=>'template','description'=>'A ready-to-use email newsletter template that pairs with ScriptServer article output.','author_name'=>'Jamie L.','download_count'=>198,'vote_score'=>64,'created_at'=>'2025-04-03 12:00:00'],
        ['id'=>3,'title'=>'Viral Short-Form Script Framework','slug'=>'viral-short-form-script','type'=>'script','description'=>'Battle-tested script structure for creating highly shareable 60-second vertical videos.','author_name'=>'Taylor R.','download_count'=>457,'vote_score'=>142,'created_at'=>'2025-04-05 08:00:00'],
        ['id'=>4,'title'=>'Multi-Platform Config Bundle','slug'=>'multi-platform-config','type'=>'configuration','description'=>'Pre-configured settings for publishing to YouTube, TikTok, Instagram, and LinkedIn simultaneously.','author_name'=>'Jordan K.','download_count'=>276,'vote_score'=>91,'created_at'=>'2025-04-07 14:00:00'],
        ['id'=>5,'title'=>'Brand Voice Template Pack','slug'=>'brand-voice-template-pack','type'=>'template','description'=>'A set of tone-of-voice templates covering casual, professional, and educational styles.','author_name'=>'Morgan P.','download_count'=>183,'vote_score'=>55,'created_at'=>'2025-04-10 09:00:00'],
        ['id'=>6,'title'=>'Repurposing Pipeline Workflow','slug'=>'repurposing-pipeline-workflow','type'=>'workflow','description'=>'Automate turning a single long-form video into 8 pieces of content across different formats.','author_name'=>'Sam W.','download_count'=>389,'vote_score'=>118,'created_at'=>'2025-04-12 11:00:00'],
        ['id'=>7,'title'=>'SEO Article Script Generator','slug'=>'seo-article-script-generator','type'=>'script','description'=>'Script prompts and variables designed to produce SEO-optimised articles from video transcripts.','author_name'=>'Casey B.','download_count'=>221,'vote_score'=>73,'created_at'=>'2025-04-14 16:00:00'],
        ['id'=>8,'title'=>'Analytics Dashboard Config','slug'=>'analytics-dashboard-config','type'=>'configuration','description'=>'Custom analytics dashboard configuration tracking cross-platform views, CTR, and engagement.','author_name'=>'Riley D.','download_count'=>147,'vote_score'=>44,'created_at'=>'2025-04-16 10:00:00'],
    ];
}

// Derive top-rated (top 4 by vote_score)
$topRated = $items;
usort($topRated, fn($a, $b) => $b['vote_score'] <=> $a['vote_score']);
$topRated = array_slice($topRated, 0, 4);

// Category metadata
$categories = [
    'template'      => ['icon' => '📄', 'label' => 'Templates',      'desc' => 'Ready-to-use content templates for scripts, emails, articles, and social posts.'],
    'workflow'      => ['icon' => '🔄', 'label' => 'Workflows',       'desc' => 'Step-by-step automation workflows you can import directly into ScriptServer.'],
    'script'        => ['icon' => '💻', 'label' => 'Scripts',         'desc' => 'Reusable script prompts, prompt chains, and generation frameworks.'],
    'configuration' => ['icon' => '⚙️', 'label' => 'Configurations',  'desc' => 'Platform configuration presets to quickly set up publishing, analytics, and branding.'],
];

// Count per type
$counts = array_fill_keys(array_keys($categories), 0);
foreach ($items as $item) {
    if (isset($counts[$item['type']])) {
        $counts[$item['type']]++;
    }
}
?>

<!-- =========================================================
     PAGE HERO
     ========================================================= -->
<section class="page-hero" aria-labelledby="community-heading">
    <div class="container page-hero-content">
        <span class="section-label">Community Hub</span>
        <h1 id="community-heading">Shared by the Community,<br><span class="text-accent">Built for Creators</span></h1>
        <p>Download community-contributed templates, workflows, scripts, and configurations. Rate content, track what's trending, and share your own creations.</p>
        <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;margin-top:2rem;">
            <a href="#browse" class="btn btn-primary btn-lg">Browse Content</a>
            <button type="button" class="btn btn-outline btn-lg" id="open-contribute-btn">Contribute ↑</button>
        </div>
    </div>
</section>

<!-- =========================================================
     STATS BAR
     ========================================================= -->
<section class="section-sm" style="background:var(--clr-surface);" aria-label="Community stats">
    <div class="container">
        <div class="stats-row">
            <div class="stat-item" data-reveal>
                <div class="stat-value"><?= count($items) ?>+</div>
                <div class="stat-label">Community items</div>
            </div>
            <div class="stat-item" data-reveal>
                <div class="stat-value"><?= array_sum(array_column($items, 'download_count')) ?>+</div>
                <div class="stat-label">Total downloads</div>
            </div>
            <div class="stat-item" data-reveal>
                <div class="stat-value"><?= count($categories) ?></div>
                <div class="stat-label">Content types</div>
            </div>
            <div class="stat-item" data-reveal>
                <div class="stat-value">Free</div>
                <div class="stat-label">Always free to download</div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================
     CATEGORY CARDS
     ========================================================= -->
<section class="section" id="browse" aria-labelledby="categories-heading">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Browse by Type</span>
            <h2 id="categories-heading">What kind of content are you looking for?</h2>
            <p>Click a card to filter the library to that content type, or scroll down to see everything.</p>
        </div>

        <div class="community-category-grid" role="list" aria-label="Content type filters">
            <?php foreach ($categories as $type => $cat): ?>
            <button
                class="community-cat-card"
                type="button"
                data-filter="<?= $type ?>"
                role="listitem"
                aria-pressed="false"
                aria-label="Filter by <?= htmlspecialchars($cat['label'], ENT_QUOTES, 'UTF-8') ?>: <?= (int)$counts[$type] ?> items"
            >
                <div class="community-cat-icon" aria-hidden="true"><?= $cat['icon'] ?></div>
                <div class="community-cat-count"><?= (int)$counts[$type] ?> items</div>
                <h3><?= htmlspecialchars($cat['label'], ENT_QUOTES, 'UTF-8') ?></h3>
                <p><?= htmlspecialchars($cat['desc'], ENT_QUOTES, 'UTF-8') ?></p>
                <span class="community-cat-cta">View <?= htmlspecialchars($cat['label'], ENT_QUOTES, 'UTF-8') ?> →</span>
            </button>
            <?php endforeach; ?>
        </div>

        <!-- Active filter indicator -->
        <div id="active-filter-bar" class="community-filter-bar" aria-live="polite" hidden>
            <span>Showing: <strong id="active-filter-label"></strong></span>
            <button type="button" id="clear-filter-btn" class="btn btn-ghost btn-sm">✕ Show All</button>
        </div>
    </div>
</section>

<!-- =========================================================
     HIGHEST RATED
     ========================================================= -->
<section class="section" style="background:var(--clr-surface);" aria-labelledby="top-rated-heading">
    <div class="container">
        <div class="section-header">
            <span class="section-label">⭐ Highest Rated</span>
            <h2 id="top-rated-heading">Community Favourites</h2>
            <p>The most loved content, ranked by community votes.</p>
        </div>

        <div class="grid grid-4" role="list" aria-label="Top rated community content">
            <?php foreach ($topRated as $item): ?>
            <article
                class="community-item-card top-rated"
                data-type="<?= htmlspecialchars($item['type'], ENT_QUOTES, 'UTF-8') ?>"
                data-id="<?= (int)$item['id'] ?>"
                role="listitem"
                data-reveal
            >
                <div class="community-item-header">
                    <span class="community-type-badge badge-<?= htmlspecialchars($item['type'], ENT_QUOTES, 'UTF-8') ?>">
                        <?= htmlspecialchars($categories[$item['type']]['icon'], ENT_QUOTES, 'UTF-8') ?>
                        <?= htmlspecialchars($categories[$item['type']]['label'], ENT_QUOTES, 'UTF-8') ?>
                    </span>
                    <span class="community-rank-badge">⭐ Top Rated</span>
                </div>
                <h4><?= htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') ?></h4>
                <p class="text-sm"><?= htmlspecialchars($item['description'], ENT_QUOTES, 'UTF-8') ?></p>
                <div class="community-item-meta">
                    <span class="text-muted text-xs">by <?= htmlspecialchars($item['author_name'], ENT_QUOTES, 'UTF-8') ?></span>
                    <span class="text-muted text-xs">⬇ <?= number_format((int)$item['download_count']) ?></span>
                </div>
                <div class="community-item-footer">
                    <div class="community-vote-row" data-item-id="<?= (int)$item['id'] ?>">
                        <button type="button" class="vote-btn upvote" aria-label="Upvote" title="Upvote">▲</button>
                        <span class="vote-score"><?= (int)$item['vote_score'] ?></span>
                        <button type="button" class="vote-btn downvote" aria-label="Downvote" title="Downvote">▼</button>
                    </div>
                    <button
                        type="button"
                        class="btn btn-primary btn-sm community-dl-btn"
                        data-item-id="<?= (int)$item['id'] ?>"
                        data-item-title="<?= htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') ?>"
                    >Download</button>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- =========================================================
     ALL ITEMS / FILTERED LIBRARY
     ========================================================= -->
<section class="section" aria-labelledby="library-heading">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Community Library</span>
            <h2 id="library-heading">All Contributed Content</h2>
            <p>Sorted by newest first. Use the category cards above to filter by type.</p>
        </div>

        <?php if (empty($items)): ?>
        <p class="text-center text-muted">No community content yet. Be the first to contribute!</p>
        <?php else: ?>
        <div class="community-library-grid" id="community-library" role="list" aria-label="Community library">
            <?php foreach ($items as $item): ?>
            <article
                class="community-item-card"
                data-type="<?= htmlspecialchars($item['type'], ENT_QUOTES, 'UTF-8') ?>"
                data-id="<?= (int)$item['id'] ?>"
                role="listitem"
                data-reveal
            >
                <div class="community-item-header">
                    <span class="community-type-badge badge-<?= htmlspecialchars($item['type'], ENT_QUOTES, 'UTF-8') ?>">
                        <?= htmlspecialchars($categories[$item['type']]['icon'], ENT_QUOTES, 'UTF-8') ?>
                        <?= htmlspecialchars($categories[$item['type']]['label'], ENT_QUOTES, 'UTF-8') ?>
                    </span>
                    <span class="text-muted text-xs"><?= date('M j, Y', strtotime($item['created_at'])) ?></span>
                </div>
                <h4><?= htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') ?></h4>
                <p class="text-sm"><?= htmlspecialchars($item['description'], ENT_QUOTES, 'UTF-8') ?></p>
                <div class="community-item-meta">
                    <span class="text-muted text-xs">by <?= htmlspecialchars($item['author_name'], ENT_QUOTES, 'UTF-8') ?></span>
                    <span class="text-muted text-xs">⬇ <?= number_format((int)$item['download_count']) ?></span>
                </div>
                <div class="community-item-footer">
                    <div class="community-vote-row" data-item-id="<?= (int)$item['id'] ?>">
                        <button type="button" class="vote-btn upvote" aria-label="Upvote" title="Upvote">▲</button>
                        <span class="vote-score"><?= (int)$item['vote_score'] ?></span>
                        <button type="button" class="vote-btn downvote" aria-label="Downvote" title="Downvote">▼</button>
                    </div>
                    <button
                        type="button"
                        class="btn btn-outline btn-sm community-dl-btn"
                        data-item-id="<?= (int)$item['id'] ?>"
                        data-item-title="<?= htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') ?>"
                    >Download</button>
                </div>
            </article>
            <?php endforeach; ?>
        </div>

        <p id="no-results-msg" class="text-center text-muted mt-4" hidden>No items found for this filter.</p>
        <?php endif; ?>
    </div>
</section>

<!-- =========================================================
     CONTRIBUTE CTA
     ========================================================= -->
<section class="section" style="background:var(--clr-surface);" aria-labelledby="contribute-heading">
    <div class="container" style="max-width:760px;">
        <div class="section-header">
            <span class="section-label">Share Your Work</span>
            <h2 id="contribute-heading">Contribute to the Community</h2>
            <p>Have a template, workflow, script, or configuration that other creators would find useful? Share it here — for free.</p>
        </div>
        <div class="text-center">
            <button type="button" class="btn btn-primary btn-lg" id="open-contribute-btn-2">Contribute Content ↑</button>
        </div>
    </div>
</section>

<!-- =========================================================
     DOWNLOAD DISCLAIMER MODAL
     ========================================================= -->
<div id="disclaimer-modal" class="community-modal" role="dialog" aria-modal="true" aria-labelledby="disclaimer-title" hidden>
    <div class="community-modal-backdrop"></div>
    <div class="community-modal-box">
        <h3 id="disclaimer-title">⚠️ Download Disclaimer</h3>
        <p>Community-contributed content is provided <strong>as-is</strong> by members of the ScriptServer community. ScriptServer does not review, verify, or endorse any community content.</p>
        <ul style="margin:.75rem 0 1rem 1.25rem;color:var(--clr-light);font-size:.9rem;line-height:1.8;">
            <li>Always review files before use.</li>
            <li>You are responsible for how you use downloaded content.</li>
            <li>ScriptServer accepts no liability for any direct or indirect damage arising from the use of community content.</li>
        </ul>
        <p style="font-size:.85rem;color:var(--clr-muted);">This notice will not be shown again for future downloads.</p>
        <div style="display:flex;gap:1rem;justify-content:flex-end;margin-top:1.5rem;flex-wrap:wrap;">
            <button type="button" class="btn btn-ghost" id="disclaimer-cancel-btn">Cancel</button>
            <button type="button" class="btn btn-primary" id="disclaimer-accept-btn">I Understand – Download</button>
        </div>
    </div>
</div>

<!-- =========================================================
     SHARING POLICY MODAL
     ========================================================= -->
<div id="policy-modal" class="community-modal" role="dialog" aria-modal="true" aria-labelledby="policy-title" hidden>
    <div class="community-modal-backdrop"></div>
    <div class="community-modal-box">
        <h3 id="policy-title">📋 Community Sharing Policy</h3>
        <p>Before contributing, please read and agree to our sharing policy:</p>
        <div class="community-policy-body">
            <h4>1. Original Work</h4>
            <p>By submitting content you confirm it is your original work or that you have the rights to share it.</p>
            <h4>2. License</h4>
            <p>Submitted content is shared under the <strong>Creative Commons Attribution 4.0 (CC BY 4.0)</strong> license, meaning others may use, adapt, and distribute it with attribution.</p>
            <h4>3. No Harmful Content</h4>
            <p>Do not submit content containing malicious code, offensive material, or content that violates any applicable law.</p>
            <h4>4. Moderation</h4>
            <p>ScriptServer reserves the right to review, edit, or remove any submitted content at its discretion.</p>
            <h4>5. No Warranty</h4>
            <p>Content is provided as-is. ScriptServer makes no guarantees about the accuracy or fitness of community submissions.</p>
        </div>
        <div style="margin-top:1.25rem;">
            <label class="community-policy-agree">
                <input type="checkbox" id="policy-agree-checkbox">
                <span>I have read and agree to the Community Sharing Policy.</span>
            </label>
        </div>
        <div style="display:flex;gap:1rem;justify-content:flex-end;margin-top:1.5rem;flex-wrap:wrap;">
            <button type="button" class="btn btn-ghost" id="policy-cancel-btn">Cancel</button>
            <button type="button" class="btn btn-primary" id="policy-accept-btn" disabled>Continue to Contribute</button>
        </div>
    </div>
</div>

<!-- =========================================================
     CONTRIBUTE FORM MODAL
     ========================================================= -->
<div id="contribute-modal" class="community-modal" role="dialog" aria-modal="true" aria-labelledby="contribute-modal-title" hidden>
    <div class="community-modal-backdrop"></div>
    <div class="community-modal-box" style="max-width:560px;">
        <h3 id="contribute-modal-title">📤 Submit Your Contribution</h3>
        <form id="community-submit-form" novalidate>
            <div class="form-group">
                <label for="c-title">Title <span aria-hidden="true">*</span></label>
                <input type="text" id="c-title" name="title" required placeholder="e.g. Weekly Newsletter Template">
            </div>
            <div class="form-group">
                <label for="c-type">Content Type <span aria-hidden="true">*</span></label>
                <select id="c-type" name="type" required>
                    <option value="">Choose a type…</option>
                    <option value="template">Template</option>
                    <option value="workflow">Workflow</option>
                    <option value="script">Script</option>
                    <option value="configuration">Configuration</option>
                </select>
            </div>
            <div class="form-group">
                <label for="c-desc">Description <span aria-hidden="true">*</span></label>
                <textarea id="c-desc" name="description" rows="3" required placeholder="Describe what your contribution does and how to use it."></textarea>
            </div>
            <div class="form-group">
                <label for="c-url">Download / File URL <span aria-hidden="true">*</span></label>
                <input type="url" id="c-url" name="content_url" required placeholder="https://…">
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="c-author">Your Name <span aria-hidden="true">*</span></label>
                    <input type="text" id="c-author" name="author_name" required autocomplete="name">
                </div>
                <div class="form-group">
                    <label for="c-email">Your Email <span aria-hidden="true">*</span></label>
                    <input type="email" id="c-email" name="author_email" required autocomplete="email">
                </div>
            </div>
            <!-- Honeypot -->
            <input type="text" name="website_url" style="display:none;" tabindex="-1" autocomplete="off">
            <div style="display:flex;gap:1rem;justify-content:flex-end;margin-top:1.5rem;flex-wrap:wrap;">
                <button type="button" class="btn btn-ghost" id="contribute-cancel-btn">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit Contribution</button>
            </div>
        </form>
    </div>
</div>

<?php require __DIR__ . '/../includes/footer.php'; ?>
