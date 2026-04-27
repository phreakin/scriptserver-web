<?php
$pageTitle = 'Content Hub – ScriptServer';
$pageDesc  = 'Browse all content produced by ScriptServer — videos, articles, short clips, and social reposts.';
require __DIR__ . '/../includes/header.php';
?>

<section class="page-hero" aria-labelledby="content-heading">
    <div class="container page-hero-content">
        <span class="section-label">Content Hub</span>
        <h1 id="content-heading">All Content</h1>
        <p>Every piece of content produced using the ScriptServer pipeline — videos, articles, clips, and social reposts.</p>
    </div>
</section>

<section class="section" aria-labelledby="content-browse-heading">
    <div class="container">
        <!-- Category nav -->
        <div style="display:flex;gap:.75rem;flex-wrap:wrap;margin-bottom:2.5rem;" role="tablist" aria-label="Content categories">
            <a href="/content"  class="btn btn-primary btn-sm" role="tab" aria-selected="true">All</a>
            <a href="/videos"   class="btn btn-outline btn-sm" role="tab" aria-selected="false">Videos</a>
            <a href="/articles" class="btn btn-outline btn-sm" role="tab" aria-selected="false">Articles</a>
            <a href="/clips"    class="btn btn-outline btn-sm" role="tab" aria-selected="false">Clips</a>
            <a href="/repost"   class="btn btn-outline btn-sm" role="tab" aria-selected="false">Reposts</a>
        </div>

        <h2 id="content-browse-heading" class="sr-only">Browse content</h2>
        <div class="grid grid-3" role="list">
            <?php
            $items = [
                ['🎬','Video',   'tag',         'How to Build a Content Engine in 2025',               'Complete walkthrough of setting up an automated content pipeline using ScriptServer modules.',      '12 min',     '/videos'],
                ['📰','Article', 'tag tag-blue', '10 Ways AI Is Changing Content Creation Forever',    'An in-depth analysis of how automation tools are reshaping the creator economy.',                 '8 min read', '/articles'],
                ['✂️','Clip',    'tag tag-cyan', 'Stop Editing Videos Manually – Do This Instead',     '60-second clip showing how ScriptServer auto-clips long-form videos into viral shorts.',          '60 sec',     '/clips'],
                ['🎬','Video',   'tag',         'The 2025 Creator Toolkit: 10 Tools You Need',         'Every tool a modern creator needs to build a content business — and how to automate them all.',    '18 min',     '/videos'],
                ['📰','Article', 'tag tag-blue', 'How to Write 30 Blog Posts a Month with AI',         'Step-by-step guide to building an AI-assisted content calendar that runs on autopilot.',          '6 min read', '/articles'],
                ['📱','Repost',  'tag tag-green','Twitter/X Thread: The 8-Stage Content Pipeline',     'Our viral Twitter thread breaking down the ScriptServer automation pipeline in simple terms.',     '2 min read', '/repost'],
            ];
            foreach ($items as $item): ?>
            <article class="content-card" data-reveal role="listitem">
                <div class="content-card-thumb">
                    <?= $item[0] ?>
                    <?php if (in_array($item[1], ['Video', 'Clip'])): ?>
                    <div class="play-btn" aria-hidden="true">▶</div>
                    <?php endif; ?>
                </div>
                <div class="content-card-body">
                    <div class="content-card-meta">
                        <span class="<?= $item[2] ?>"><?= htmlspecialchars($item[1], ENT_QUOTES, 'UTF-8') ?></span>
                    </div>
                    <h4><?= htmlspecialchars($item[3], ENT_QUOTES, 'UTF-8') ?></h4>
                    <p><?= htmlspecialchars($item[4], ENT_QUOTES, 'UTF-8') ?></p>
                </div>
                <div class="content-card-footer">
                    <span class="text-muted text-xs"><?= htmlspecialchars($item[5], ENT_QUOTES, 'UTF-8') ?></span>
                    <a href="<?= htmlspecialchars($item[6], ENT_QUOTES, 'UTF-8') ?>" class="btn btn-ghost btn-sm">View →</a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
