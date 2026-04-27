<?php
$pageTitle = 'ScriptServer – Automate Your Content Pipeline';
$pageDesc  = 'ScriptServer transforms a single video idea into a complete content package: script, assets, video, clips, social posts, articles, and analytics — all automated.';
require __DIR__ . '/../includes/header.php';
?>

<!-- =========================================================
     HERO
     ========================================================= -->
<section class="hero" aria-labelledby="hero-heading">
    <div class="hero-bg" aria-hidden="true"></div>
    <div class="container hero-content">
        <div class="hero-badge" aria-label="New">
            <span>⚡</span> Introducing ScriptServer 2.0
        </div>
        <h1 id="hero-heading">
            One Idea.<br>
            <span class="text-accent">Infinite Content.</span>
        </h1>
        <p class="hero-desc">
            ScriptServer is the automation platform that takes your initial video idea and turns it into a
            complete content package — scripts, assets, videos, clips, social posts, articles, and analytics.
        </p>
        <div class="hero-actions">
            <a href="/platform" class="btn btn-primary btn-lg">Explore the Platform</a>
            <a href="/content"  class="btn btn-outline btn-lg">See Our Content ↓</a>
        </div>

        <!-- Pipeline visualisation -->
        <div class="pipeline" aria-label="Content pipeline stages" role="list">
            <div class="pipeline-step active" role="listitem">💡 Idea</div>
            <div class="pipeline-arrow" aria-hidden="true">→</div>
            <div class="pipeline-step" role="listitem">📝 Script</div>
            <div class="pipeline-arrow" aria-hidden="true">→</div>
            <div class="pipeline-step" role="listitem">🎨 Assets</div>
            <div class="pipeline-arrow" aria-hidden="true">→</div>
            <div class="pipeline-step" role="listitem">🎬 Video</div>
            <div class="pipeline-arrow" aria-hidden="true">→</div>
            <div class="pipeline-step" role="listitem">✂️ Clips</div>
            <div class="pipeline-arrow" aria-hidden="true">→</div>
            <div class="pipeline-step" role="listitem">📱 Social</div>
            <div class="pipeline-arrow" aria-hidden="true">→</div>
            <div class="pipeline-step" role="listitem">📰 Article</div>
            <div class="pipeline-arrow" aria-hidden="true">→</div>
            <div class="pipeline-step" role="listitem">📊 Analytics</div>
        </div>
    </div>
</section>

<!-- =========================================================
     STATS
     ========================================================= -->
<section class="section-sm" aria-labelledby="stats-heading">
    <div class="container">
        <h2 id="stats-heading" class="sr-only">Platform stats</h2>
        <div class="stats-row">
            <div class="stat-item" data-reveal>
                <div class="stat-value">10×</div>
                <div class="stat-label">Content output boost</div>
            </div>
            <div class="stat-item" data-reveal>
                <div class="stat-value">8</div>
                <div class="stat-label">Pipeline stages automated</div>
            </div>
            <div class="stat-item" data-reveal>
                <div class="stat-value">100%</div>
                <div class="stat-label">Automated publishing</div>
            </div>
            <div class="stat-item" data-reveal>
                <div class="stat-value">∞</div>
                <div class="stat-label">Content formats</div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================
     FEATURES OVERVIEW
     ========================================================= -->
<section class="section" aria-labelledby="features-heading">
    <div class="container">
        <div class="section-header">
            <span class="section-label">What We Build</span>
            <h2 id="features-heading">Everything from one idea</h2>
            <p>Every stage of the content pipeline is automated, connected, and optimised for maximum reach.</p>
        </div>
        <div class="grid grid-3" role="list">
            <?php
            $features = [
                ['💡','Idea to Script',    'AI-powered scriptwriting that transforms raw video concepts into production-ready scripts with hooks, structure, and CTAs.'],
                ['🎨','Asset Generation', 'Automatically create thumbnails, graphics, overlays, and supporting visuals aligned with your brand.'],
                ['🎬','Video Production',  'Render full-length videos with voiceover, captions, b-roll, and music — no editing required.'],
                ['✂️','Clip Creation',     'Automatically extract the best moments into short-form vertical clips for YouTube Shorts, TikTok, and Reels.'],
                ['📱','Social Automation', 'Generate and schedule platform-native posts for every major social network from a single video.'],
                ['📰','Article Publishing','Turn video content into SEO-optimised long-form articles, published directly to your website.'],
                ['📊','Analytics Hub',    'Track performance across every format and channel with a unified analytics dashboard.'],
                ['🔄','Optimisation Loop', 'Continuously refine strategy based on real performance data to increase reach and engagement.'],
                ['🤝','Partnerships',      'Connect with brands, sponsors, and creators through our built-in partnership network.'],
            ];
            foreach ($features as $f): ?>
                <article class="card" data-reveal role="listitem">
                    <div class="card-icon" aria-hidden="true"><?= $f[0] ?></div>
                    <h3><?= htmlspecialchars($f[1], ENT_QUOTES, 'UTF-8') ?></h3>
                    <p><?= htmlspecialchars($f[2], ENT_QUOTES, 'UTF-8') ?></p>
                </article>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-4">
            <a href="/features" class="btn btn-outline">View All Features →</a>
        </div>
    </div>
</section>

<!-- =========================================================
     LATEST CONTENT
     ========================================================= -->
<section class="section" style="background:var(--clr-surface);" aria-labelledby="content-heading">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Latest Content</span>
            <h2 id="content-heading">Produced by ScriptServer</h2>
            <p>Real content created using our own platform — videos, articles, clips, and social reposts.</p>
        </div>
        <div class="grid grid-3">
            <article class="content-card" data-reveal>
                <div class="content-card-thumb">🎬<div class="play-btn" aria-hidden="true">▶</div></div>
                <div class="content-card-body">
                    <div class="content-card-meta">
                        <span class="tag">Video</span>
                        <span class="text-muted text-xs">5 days ago</span>
                    </div>
                    <h4>How to Build a Content Engine in 2025</h4>
                    <p>Complete walkthrough of setting up an automated content pipeline using ScriptServer modules.</p>
                </div>
                <div class="content-card-footer">
                    <span>12 min</span>
                    <a href="/videos" class="btn btn-ghost btn-sm">Watch →</a>
                </div>
            </article>
            <article class="content-card" data-reveal>
                <div class="content-card-thumb" style="font-size:2rem;padding:1.5rem;align-items:flex-start;">📰</div>
                <div class="content-card-body">
                    <div class="content-card-meta">
                        <span class="tag tag-blue">Article</span>
                        <span class="text-muted text-xs">1 week ago</span>
                    </div>
                    <h4>10 Ways AI Is Changing Content Creation Forever</h4>
                    <p>An in-depth analysis of how automation tools are reshaping the creator economy and marketing landscape.</p>
                </div>
                <div class="content-card-footer">
                    <span>8 min read</span>
                    <a href="/articles" class="btn btn-ghost btn-sm">Read →</a>
                </div>
            </article>
            <article class="content-card" data-reveal>
                <div class="content-card-thumb">✂️<div class="play-btn" aria-hidden="true">▶</div></div>
                <div class="content-card-body">
                    <div class="content-card-meta">
                        <span class="tag tag-cyan">Clip</span>
                        <span class="text-muted text-xs">2 days ago</span>
                    </div>
                    <h4>Stop Editing Videos Manually – Do This Instead</h4>
                    <p>60-second clip showing how ScriptServer auto-clips long-form videos into viral shorts.</p>
                </div>
                <div class="content-card-footer">
                    <span>60 sec</span>
                    <a href="/clips" class="btn btn-ghost btn-sm">Watch →</a>
                </div>
            </article>
        </div>
        <div class="text-center mt-4">
            <a href="/content" class="btn btn-outline">Browse All Content →</a>
        </div>
    </div>
</section>

<!-- =========================================================
     PLATFORM CTA
     ========================================================= -->
<section class="section">
    <div class="container">
        <div class="cta-banner" data-reveal>
            <h2>Ready to automate your content pipeline?</h2>
            <p>Join creators and brands using ScriptServer to 10× their content output without 10× the effort.</p>
            <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;">
                <a href="/platform" class="btn btn-lg" style="background:#fff;color:var(--clr-accent-1);font-weight:700;">Get Started Free</a>
                <a href="/contact"  class="btn btn-lg" style="background:rgba(255,255,255,.15);color:#fff;border:1px solid rgba(255,255,255,.3);">Talk to Us</a>
            </div>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
