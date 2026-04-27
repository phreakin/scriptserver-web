<?php
$pageTitle = 'About – ScriptServer';
$pageDesc  = 'Learn about ScriptServer — the content automation platform built to help creators and brands publish more, stress less.';
require __DIR__ . '/../includes/header.php';
?>

<section class="page-hero" aria-labelledby="about-heading">
    <div class="container page-hero-content">
        <span class="section-label">About ScriptServer</span>
        <h1 id="about-heading">Building the future of content creation</h1>
        <p>We started ScriptServer because we were tired of spending more time editing than creating. Now we're automating the entire pipeline so you don't have to.</p>
    </div>
</section>

<!-- Mission -->
<section class="section" aria-labelledby="mission-heading">
    <div class="container">
        <div class="feature-block">
            <div class="feature-text">
                <span class="section-label">Our Mission</span>
                <h2 id="mission-heading">Help creators do more with less</h2>
                <p>The best creators spend their time on what matters — ideas, storytelling, and community. Not editing, formatting, scheduling, and writing.</p>
                <p class="mt-2">ScriptServer automates every downstream task so creators can focus on the upstream: the spark of an idea and the vision to execute it.</p>
                <ul class="feature-list mt-3">
                    <li>Turn one idea into a complete content package</li>
                    <li>Publish across every major platform automatically</li>
                    <li>Grow faster by producing consistently, at scale</li>
                    <li>Data-driven optimisation built into every workflow</li>
                </ul>
            </div>
            <div class="feature-visual" aria-hidden="true">
                <span style="position:relative;z-index:1;font-size:5rem;">🚀</span>
            </div>
        </div>
    </div>
</section>

<!-- Origin story -->
<section class="section" style="background:var(--clr-surface);" aria-labelledby="story-heading">
    <div class="container" style="max-width:800px;">
        <div class="section-header">
            <span class="section-label">Our Story</span>
            <h2 id="story-heading">How ScriptServer was born</h2>
        </div>
        <div style="display:flex;flex-direction:column;gap:1.5rem;color:var(--clr-light);">
            <p>ScriptServer started as an internal tool. We were building content for our own channels and spending 80% of our time on tasks that had nothing to do with the core idea — editing videos, writing blog posts, scheduling social posts, creating thumbnails.</p>
            <p>We started automating those tasks one by one. First the scripting. Then the thumbnails. Then the video rendering. Then the social posts. Then the articles. Then we looked up and realised we had a full pipeline.</p>
            <p>When we shared it with other creators, the response was immediate: <em>"Can we use this?"</em></p>
            <p>So we turned it into a platform. ScriptServer is that platform — built by creators, for creators. Every feature exists because we needed it ourselves first.</p>
        </div>
    </div>
</section>

<!-- Values -->
<section class="section" aria-labelledby="values-heading">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Our Values</span>
            <h2 id="values-heading">What we believe</h2>
        </div>
        <div class="grid grid-3" role="list">
            <?php
            $values = [
                ['⚡','Speed without sacrifice',  'Automation should never mean lower quality. We obsess over output quality as much as production speed.'],
                ['🎯','Creator-first always',     'Every decision starts with: does this help creators do better work? Features built for creators, not boardrooms.'],
                ['🔁','Systems over hustle',      'Sustainable content output comes from great systems, not grinding 16-hour days. We build the systems.'],
                ['📊','Data-driven growth',       'Gut feelings are a starting point. Real growth comes from testing, measuring, and iterating on what works.'],
                ['🌐','Open by default',          'APIs, webhooks, and integrations from day one. ScriptServer fits into your workflow, not the other way around.'],
                ['🤝','Ecosystem thinking',       'We grow when our creators grow. Our success is tied directly to the success of the people using our platform.'],
            ];
            foreach ($values as $v): ?>
            <article class="card" data-reveal role="listitem">
                <div class="card-icon" aria-hidden="true"><?= $v[0] ?></div>
                <h3><?= htmlspecialchars($v[1], ENT_QUOTES, 'UTF-8') ?></h3>
                <p><?= htmlspecialchars($v[2], ENT_QUOTES, 'UTF-8') ?></p>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="section">
    <div class="container">
        <div class="cta-banner" data-reveal>
            <h2>Join the ScriptServer community</h2>
            <p>Thousands of creators and brands are already automating their content pipeline. Come build with us.</p>
            <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;">
                <a href="/platform" class="btn btn-lg" style="background:#fff;color:var(--clr-accent-1);font-weight:700;">Get Started</a>
                <a href="/contact"  class="btn btn-lg" style="background:rgba(255,255,255,.15);color:#fff;border:1px solid rgba(255,255,255,.3);">Get in Touch</a>
            </div>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
