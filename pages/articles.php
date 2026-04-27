<?php
$pageTitle = 'Articles – ScriptServer';
$pageDesc  = 'Read long-form articles and guides produced by the ScriptServer content automation pipeline.';
require __DIR__ . '/../includes/header.php';
?>

<section class="page-hero" aria-labelledby="articles-heading">
    <div class="container page-hero-content">
        <span class="section-label">Articles</span>
        <h1 id="articles-heading">ScriptServer Articles</h1>
        <p>Long-form articles, guides, and deep dives — all generated automatically from video content using the ScriptServer pipeline.</p>
    </div>
</section>

<section class="section" aria-labelledby="articles-list-heading">
    <div class="container">
        <h2 id="articles-list-heading" class="sr-only">Article library</h2>
        <div class="grid grid-3" role="list">
            <?php
            $articles = [
                ['10 Ways AI Is Changing Content Creation Forever',               'An in-depth analysis of how automation tools are reshaping the creator economy and marketing landscape.',                            '8 min read',  '1 week ago'],
                ['How to Write 30 Blog Posts a Month with AI',                    'Step-by-step guide to building an AI-assisted content calendar that runs on autopilot with minimal human input.',                    '6 min read',  '2 weeks ago'],
                ['The Complete Guide to Building a Faceless YouTube Channel',     'Everything you need to know about creating, growing, and monetising a faceless YouTube channel in 2025.',                          '12 min read', '3 weeks ago'],
                ['ScriptServer Pipeline Deep Dive: All 8 Stages Explained',      'A technical look at every stage of the ScriptServer content pipeline, from idea capture to analytics and optimisation.',            '10 min read', '1 month ago'],
                ["Social Media Automation: What Works and What Doesn't in 2025", 'A data-driven analysis of which social automation strategies drive real engagement versus which ones get you shadowbanned.',       '9 min read',  '1 month ago'],
                ['How Brands Are Using AI Content to 10× Their Marketing ROI',   'Real case studies from brands that have integrated AI content automation into their marketing stack with measurable results.',        '11 min read', '6 weeks ago'],
            ];
            foreach ($articles as $a): ?>
            <article class="content-card" data-reveal role="listitem">
                <div class="content-card-thumb" style="font-size:2.5rem;padding:2rem;align-items:flex-start;">📰</div>
                <div class="content-card-body">
                    <div class="content-card-meta">
                        <span class="tag tag-blue">Article</span>
                        <span class="text-muted text-xs"><?= htmlspecialchars($a[3], ENT_QUOTES, 'UTF-8') ?></span>
                    </div>
                    <h4><?= htmlspecialchars($a[0], ENT_QUOTES, 'UTF-8') ?></h4>
                    <p><?= htmlspecialchars($a[1], ENT_QUOTES, 'UTF-8') ?></p>
                </div>
                <div class="content-card-footer">
                    <span class="text-muted text-xs"><?= htmlspecialchars($a[2], ENT_QUOTES, 'UTF-8') ?></span>
                    <a href="#" class="btn btn-ghost btn-sm">Read →</a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section-sm">
    <div class="container">
        <div class="cta-banner" data-reveal>
            <h2>Auto-publish articles like these to your site</h2>
            <p>Connect your CMS and ScriptServer will publish articles alongside every video — automatically.</p>
            <a href="/platform" class="btn btn-lg" style="background:#fff;color:var(--clr-accent-1);font-weight:700;">Learn More</a>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
