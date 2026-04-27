<?php
$pageTitle = 'Platform Overview – ScriptServer';
$pageDesc  = 'Discover how ScriptServer automates your entire content pipeline from idea to published content, analytics, and optimisation.';
require __DIR__ . '/../includes/header.php';
?>

<section class="page-hero" aria-labelledby="platform-heading">
    <div class="container page-hero-content">
        <span class="section-label">Platform Overview</span>
        <h1 id="platform-heading">The ScriptServer Platform</h1>
        <p>An end-to-end automation system that transforms a single text idea into a complete, multi-format content package.</p>
    </div>
</section>

<!-- How it works -->
<section class="section" id="how-it-works" aria-labelledby="hiw-heading">
    <div class="container">
        <div class="section-header">
            <span class="section-label">How It Works</span>
            <h2 id="hiw-heading">The Pipeline</h2>
            <p>Eight interconnected modules take your idea all the way from raw text to fully published, optimised content.</p>
        </div>

        <?php
        $steps = [
            ['💡','1. Idea Capture',      'Submit a text-based video concept using natural language. ScriptServer analyses intent, target audience, and content type.'],
            ['📝','2. Script Generation', 'AI generates a complete production script with hook, body, CTA, chapter markers, and SEO metadata.'],
            ['🎨','3. Asset Creation',    'Thumbnails, graphics, overlays, and B-roll imagery are automatically created and aligned to your brand kit.'],
            ['🎬','4. Video Production',  'Full-length videos are rendered with AI voiceover, captions, music, and custom transitions — no editing required.'],
            ['✂️','5. Clip Extraction',   'The best 30–90 second moments are automatically extracted and formatted for YouTube Shorts, TikTok, and Instagram Reels.'],
            ['📱','6. Social Publishing', 'Platform-native social posts are generated and scheduled across Twitter/X, LinkedIn, Facebook, and Instagram.'],
            ['📰','7. Article Writing',   'Long-form SEO articles are generated from video transcripts and published to your connected website.'],
            ['📊','8. Analytics & Optimisation', 'Performance data from all channels is aggregated and used to continuously refine future content strategy.'],
        ];
        foreach ($steps as $i => $s):
        ?>
        <div class="feature-block <?= $i % 2 === 1 ? 'reverse' : '' ?>" data-reveal>
            <div class="feature-text">
                <span class="section-label"><?= htmlspecialchars($s[1], ENT_QUOTES, 'UTF-8') ?></span>
                <h2><?= htmlspecialchars($s[1], ENT_QUOTES, 'UTF-8') ?></h2>
                <p><?= htmlspecialchars($s[2], ENT_QUOTES, 'UTF-8') ?></p>
                <ul class="feature-list">
                    <li>Fully automated — no manual steps required</li>
                    <li>Connected to all downstream pipeline stages</li>
                    <li>Configurable to match your brand and voice</li>
                </ul>
            </div>
            <div class="feature-visual" aria-hidden="true">
                <span style="position:relative;z-index:1;font-size:5rem;"><?= $s[0] ?></span>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- Modules / docs links -->
<section class="section" style="background:var(--clr-surface);" id="docs" aria-labelledby="modules-heading">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Platform Modules</span>
            <h2 id="modules-heading">Explore Each Module</h2>
            <p>Each stage of the pipeline is a standalone module — configure, extend, or integrate individually.</p>
        </div>
        <div class="grid grid-4" role="list">
            <?php
            $modules = [
                ['💡','Idea Engine',     'Natural language idea processing and content strategy AI.'],
                ['📝','Script Studio',   'AI scriptwriting with templates, tones, and SEO optimisation.'],
                ['🎨','Asset Factory',   'Automated visual asset creation from brand kit and content data.'],
                ['🎬','Video Renderer',  'Cloud rendering pipeline for full-length AI-narrated videos.'],
                ['✂️','Clip Cutter',     'AI-powered clip extraction and vertical format conversion.'],
                ['📱','Social Poster',   'Multi-platform post generation and scheduling engine.'],
                ['📰','Article Writer',  'Transcript-to-article conversion with SEO metadata.'],
                ['📊','Analytics Core',  'Unified analytics dashboard across all channels and formats.'],
            ];
            foreach ($modules as $m): ?>
            <article class="card" data-reveal role="listitem">
                <div class="card-icon" aria-hidden="true"><?= $m[0] ?></div>
                <h3><?= htmlspecialchars($m[1], ENT_QUOTES, 'UTF-8') ?></h3>
                <p><?= htmlspecialchars($m[2], ENT_QUOTES, 'UTF-8') ?></p>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Pricing -->
<section class="section" id="pricing" aria-labelledby="pricing-heading">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Pricing</span>
            <h2 id="pricing-heading">Simple, transparent pricing</h2>
            <p>Start free, scale as you grow. Every plan includes the full pipeline.</p>
        </div>
        <div class="grid grid-3">
            <!-- Starter -->
            <div class="pricing-card" data-reveal>
                <h3>Starter</h3>
                <div class="price-amount mt-2"><sup>$</sup>0</div>
                <div class="price-period">per month</div>
                <ul class="price-features">
                    <li><span class="check">✓</span> 5 videos / month</li>
                    <li><span class="check">✓</span> Script generation</li>
                    <li><span class="check">✓</span> Basic asset templates</li>
                    <li><span class="check">✓</span> 15 social posts / month</li>
                    <li><span class="cross">✗</span> Custom branding</li>
                    <li><span class="cross">✗</span> Analytics dashboard</li>
                </ul>
                <a href="/contact" class="btn btn-outline w-full" style="justify-content:center;">Get Started Free</a>
            </div>
            <!-- Pro (featured) -->
            <div class="pricing-card featured" data-reveal>
                <div class="badge-featured">Most Popular</div>
                <h3>Pro</h3>
                <div class="price-amount mt-2"><sup>$</sup>99</div>
                <div class="price-period">per month</div>
                <ul class="price-features">
                    <li><span class="check">✓</span> 30 videos / month</li>
                    <li><span class="check">✓</span> Advanced scriptwriting</li>
                    <li><span class="check">✓</span> Full asset suite</li>
                    <li><span class="check">✓</span> Unlimited social posts</li>
                    <li><span class="check">✓</span> Custom branding</li>
                    <li><span class="check">✓</span> Analytics dashboard</li>
                </ul>
                <a href="/contact" class="btn btn-primary w-full" style="justify-content:center;">Start Pro Trial</a>
            </div>
            <!-- Agency -->
            <div class="pricing-card" data-reveal>
                <h3>Agency</h3>
                <div class="price-amount mt-2"><sup>$</sup>399</div>
                <div class="price-period">per month</div>
                <ul class="price-features">
                    <li><span class="check">✓</span> Unlimited videos</li>
                    <li><span class="check">✓</span> White-label output</li>
                    <li><span class="check">✓</span> Multi-brand support</li>
                    <li><span class="check">✓</span> Priority rendering</li>
                    <li><span class="check">✓</span> Dedicated account manager</li>
                    <li><span class="check">✓</span> Custom API access</li>
                </ul>
                <a href="/contact" class="btn btn-outline w-full" style="justify-content:center;">Contact Sales</a>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="cta-banner" data-reveal>
            <h2>Start your content automation journey</h2>
            <p>ScriptServer handles the entire pipeline so you can focus on ideas and growth.</p>
            <a href="/contact" class="btn btn-lg" style="background:#fff;color:var(--clr-accent-1);font-weight:700;">Get Started Free</a>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
