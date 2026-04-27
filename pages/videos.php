<?php
$pageTitle = 'Videos – ScriptServer';
$pageDesc  = 'Watch full-length videos produced by the ScriptServer content automation pipeline.';
require __DIR__ . '/../includes/header.php';
?>

<section class="page-hero" aria-labelledby="videos-heading">
    <div class="container page-hero-content">
        <span class="section-label">Videos</span>
        <h1 id="videos-heading">ScriptServer Videos</h1>
        <p>Full-length video content produced end-to-end using our automated pipeline — scripted, rendered, and published by ScriptServer.</p>
    </div>
</section>

<section class="section" aria-labelledby="videos-list-heading">
    <div class="container">
        <h2 id="videos-list-heading" class="sr-only">Video library</h2>
        <div class="grid grid-3" role="list">
            <?php
            $videos = [
                ['How to Build a Content Engine in 2025',              'Complete walkthrough of setting up an automated content pipeline using ScriptServer modules.',                              '12 min', '5 days ago'],
                ['The 2025 Creator Toolkit: 10 Tools You Need',        'Every tool a modern creator needs to build a content business — and how to automate them all.',                              '18 min', '1 week ago'],
                ['AI Video Production: Behind the Scenes',             'A deep-dive into how ScriptServer renders full-length AI-narrated videos without any manual editing.',                        '22 min', '2 weeks ago'],
                ['From 0 to 10K Subscribers Using Automation',         'Real case study: how one creator grew from zero to 10,000 YouTube subscribers using ScriptServer in 90 days.',              '15 min', '3 weeks ago'],
                ['Social Media in 2025: What Actually Works',          'Data-backed analysis of which social platforms are driving the most growth for content creators right now.',                 '20 min', '1 month ago'],
                ['The Ultimate Guide to Faceless YouTube Channels',    'How to build a profitable faceless YouTube channel using AI-generated content and automation tools.',                        '25 min', '1 month ago'],
            ];
            foreach ($videos as $v): ?>
            <article class="content-card" data-reveal role="listitem">
                <div class="content-card-thumb">
                    🎬
                    <div class="play-btn" aria-hidden="true">▶</div>
                </div>
                <div class="content-card-body">
                    <div class="content-card-meta">
                        <span class="tag">Video</span>
                        <span class="text-muted text-xs"><?= htmlspecialchars($v[3], ENT_QUOTES, 'UTF-8') ?></span>
                    </div>
                    <h4><?= htmlspecialchars($v[0], ENT_QUOTES, 'UTF-8') ?></h4>
                    <p><?= htmlspecialchars($v[1], ENT_QUOTES, 'UTF-8') ?></p>
                </div>
                <div class="content-card-footer">
                    <span class="text-muted text-xs"><?= htmlspecialchars($v[2], ENT_QUOTES, 'UTF-8') ?></span>
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
            <h2>Create your own videos like these</h2>
            <p>ScriptServer produces videos like these automatically. Start your free trial today.</p>
            <a href="/platform" class="btn btn-lg" style="background:#fff;color:var(--clr-accent-1);font-weight:700;">Get Started Free</a>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
