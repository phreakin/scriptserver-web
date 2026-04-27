<?php
$pageTitle = 'Features – ScriptServer';
$pageDesc  = 'Explore every feature of the ScriptServer content automation platform — from AI scriptwriting to multi-channel publishing and analytics.';
require __DIR__ . '/../includes/header.php';
?>

<section class="page-hero" aria-labelledby="features-heading">
    <div class="container page-hero-content">
        <span class="section-label">Features</span>
        <h1 id="features-heading">Everything you need to automate content</h1>
        <p>ScriptServer packs every tool required to go from idea to viral content into a single, connected platform.</p>
    </div>
</section>

<!-- Core features grid -->
<section class="section" aria-labelledby="core-features-heading">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Core Capabilities</span>
            <h2 id="core-features-heading">Platform Features</h2>
        </div>
        <div class="grid grid-3" role="list">
            <?php
            $coreFeatures = [
                ['🤖','AI Script Generation',    'GPT-powered scriptwriting with brand voice, SEO keywords, hooks, and CTAs built-in. Supports multiple tones and formats.'],
                ['🎨','Brand Kit Integration',   'Upload your logo, color palette, fonts, and style guide once. Every asset produced matches your brand automatically.'],
                ['🎬','Cloud Video Rendering',   'HD video rendering in the cloud with AI voiceover, auto-captions, background music, transitions, and B-roll.'],
                ['✂️','Smart Clip Extraction',   'AI identifies the most engaging moments and extracts them as vertical short-form clips optimised for each platform.'],
                ['📱','Multi-Platform Publisher','Schedule and publish to YouTube, TikTok, Instagram, Twitter/X, LinkedIn, and Facebook from one dashboard.'],
                ['📰','SEO Article Generator',  'Convert video transcripts into SEO-rich long-form articles with structured headings, schema markup, and internal links.'],
                ['📊','Unified Analytics',       'Aggregate performance data from all channels, track KPIs, and see which content drives the most growth.'],
                ['🔄','A/B Testing Engine',      'Automatically test thumbnail variants, titles, and post copy to maximise click-through and engagement rates.'],
                ['🔌','API & Webhooks',          'Integrate ScriptServer with your existing tools via REST API and webhooks. Full documentation included.'],
                ['📦','Asset Library',           'All generated assets are stored in a searchable library. Reuse, remix, and repurpose previous content instantly.'],
                ['🌐','Multi-Language Support',  'Generate content in 25+ languages with native-quality voiceovers and culturally adapted copy.'],
                ['🛡️','Content Safety',          'Built-in content moderation and brand-safety checks before every publish. Stay compliant automatically.'],
            ];
            foreach ($coreFeatures as $f): ?>
            <article class="card" data-reveal role="listitem">
                <div class="card-icon" aria-hidden="true"><?= $f[0] ?></div>
                <h3><?= htmlspecialchars($f[1], ENT_QUOTES, 'UTF-8') ?></h3>
                <p><?= htmlspecialchars($f[2], ENT_QUOTES, 'UTF-8') ?></p>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Comparison table -->
<section class="section" style="background:var(--clr-surface);" aria-labelledby="compare-heading">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Why ScriptServer</span>
            <h2 id="compare-heading">ScriptServer vs. manual workflows</h2>
        </div>
        <div class="table-wrapper">
            <table aria-label="Feature comparison">
                <thead>
                    <tr>
                        <th>Task</th>
                        <th>Manual Workflow</th>
                        <th>ScriptServer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $comparisons = [
                        ['Write a script',          '2–4 hours',     '< 2 minutes'],
                        ['Create video thumbnail',  '30–60 minutes', '< 10 seconds'],
                        ['Edit & render a video',   '4–8 hours',     '< 15 minutes'],
                        ['Cut clips from video',    '1–2 hours',     '< 5 minutes'],
                        ['Write social posts',      '30–60 minutes', '< 1 minute'],
                        ['Publish to all platforms','45–90 minutes', '< 1 minute'],
                        ['Write an article',        '2–3 hours',     '< 5 minutes'],
                        ['Analyse performance',     '1–2 hours/week','Real-time dashboard'],
                    ];
                    foreach ($comparisons as $c): ?>
                    <tr>
                        <td><?= htmlspecialchars($c[0], ENT_QUOTES, 'UTF-8') ?></td>
                        <td style="color:var(--clr-muted);"><?= htmlspecialchars($c[1], ENT_QUOTES, 'UTF-8') ?></td>
                        <td style="color:var(--clr-success);font-weight:600;"><?= htmlspecialchars($c[2], ENT_QUOTES, 'UTF-8') ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- FAQ accordion -->
<section class="section" aria-labelledby="faq-heading">
    <div class="container" style="max-width:760px;">
        <div class="section-header">
            <span class="section-label">FAQ</span>
            <h2 id="faq-heading">Frequently asked questions</h2>
        </div>
        <div class="accordion" role="list">
            <?php
            $faqs = [
                ['Do I need any video editing experience?', 'No. ScriptServer is fully automated. You submit an idea, configure your brand settings once, and the platform handles everything from scriptwriting to publishing.'],
                ['What social platforms are supported?', 'YouTube, YouTube Shorts, TikTok, Instagram (Feed + Reels + Stories), Twitter/X, LinkedIn, and Facebook — with more being added regularly.'],
                ['Can I use my own voice?', 'Yes. You can upload voice samples for AI voice cloning, use text-to-speech from 50+ voices, or upload your own pre-recorded audio per video.'],
                ['Is the generated content unique?', 'Yes. Every script, asset, and article is generated fresh based on your unique idea and brand. No templated or recycled content.'],
                ['Can ScriptServer publish directly to my website?', 'Yes. Connect your WordPress, Webflow, or any CMS via API to auto-publish articles alongside your videos.'],
                ['How does pricing work?', 'Plans are based on the number of videos produced per month. All plans include access to the full pipeline. See the Platform page for details.'],
            ];
            foreach ($faqs as $faq): ?>
            <div class="accordion-item" role="listitem">
                <button class="accordion-trigger" aria-expanded="false">
                    <span><?= htmlspecialchars($faq[0], ENT_QUOTES, 'UTF-8') ?></span>
                    <span class="icon" aria-hidden="true">+</span>
                </button>
                <div class="accordion-body" role="region">
                    <div class="accordion-body-inner"><?= htmlspecialchars($faq[1], ENT_QUOTES, 'UTF-8') ?></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="cta-banner" data-reveal>
            <h2>See ScriptServer in action</h2>
            <p>Try it free — no credit card required. Your first video is on us.</p>
            <a href="/platform" class="btn btn-lg" style="background:#fff;color:var(--clr-accent-1);font-weight:700;">Start Free Trial</a>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
