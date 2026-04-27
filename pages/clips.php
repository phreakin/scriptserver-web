<?php
$pageTitle = 'Clips – ScriptServer';
$pageDesc  = 'Short-form video clips extracted and optimised from full-length videos by the ScriptServer automation pipeline.';
require __DIR__ . '/../includes/header.php';
?>

<section class="page-hero" aria-labelledby="clips-heading">
    <div class="container page-hero-content">
        <span class="section-label">Clips</span>
        <h1 id="clips-heading">Short-Form Clips</h1>
        <p>The best moments from our videos — automatically extracted, formatted, and optimised for YouTube Shorts, TikTok, and Instagram Reels.</p>
    </div>
</section>

<section class="section" aria-labelledby="clips-list-heading">
    <div class="container">
        <div style="display:flex;gap:.75rem;flex-wrap:wrap;margin-bottom:2.5rem;" role="tablist" aria-label="Platform filter">
            <button class="btn btn-primary btn-sm" role="tab" aria-selected="true">All Platforms</button>
            <button class="btn btn-outline btn-sm" role="tab" aria-selected="false">YouTube Shorts</button>
            <button class="btn btn-outline btn-sm" role="tab" aria-selected="false">TikTok</button>
            <button class="btn btn-outline btn-sm" role="tab" aria-selected="false">Instagram Reels</button>
        </div>

        <h2 id="clips-list-heading" class="sr-only">Clips library</h2>
        <div class="grid grid-4" role="list">
            <?php
            $clips = [
                ['Stop Editing Videos Manually',          '60 sec', 'YouTube Shorts', 'tag tag-cyan'],
                ['This One AI Tool Changed Everything',   '45 sec', 'TikTok',         'tag tag-green'],
                ['How to 10× Your Content Output',        '58 sec', 'Instagram Reels','tag tag-orange'],
                ['The Script That Went Viral',            '52 sec', 'YouTube Shorts', 'tag tag-cyan'],
                ['AI Video Creation in 60 Seconds',       '60 sec', 'TikTok',         'tag tag-green'],
                ['Why Faceless Channels Are Winning',     '48 sec', 'Instagram Reels','tag tag-orange'],
                ['From Idea to Video in 15 Minutes',      '55 sec', 'YouTube Shorts', 'tag tag-cyan'],
                ['The Future of Content Automation',      '42 sec', 'TikTok',         'tag tag-green'],
            ];
            foreach ($clips as $c): ?>
            <article class="content-card" data-reveal role="listitem">
                <div class="content-card-thumb" style="aspect-ratio:9/16;">
                    ✂️
                    <div class="play-btn" aria-hidden="true">▶</div>
                </div>
                <div class="content-card-body">
                    <div class="content-card-meta">
                        <span class="<?= $c[3] ?>"><?= htmlspecialchars($c[2], ENT_QUOTES, 'UTF-8') ?></span>
                    </div>
                    <h4><?= htmlspecialchars($c[0], ENT_QUOTES, 'UTF-8') ?></h4>
                </div>
                <div class="content-card-footer">
                    <span class="text-muted text-xs"><?= htmlspecialchars($c[1], ENT_QUOTES, 'UTF-8') ?></span>
                    <a href="#" class="btn btn-ghost btn-sm">Watch →</a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section-sm">
    <div class="container">
        <div class="cta-banner" data-reveal>
            <h2>Auto-generate clips from every video</h2>
            <p>ScriptServer's Clip Cutter module automatically extracts the best moments from your long-form videos.</p>
            <a href="/features" class="btn btn-lg" style="background:#fff;color:var(--clr-accent-1);font-weight:700;">See How It Works</a>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
