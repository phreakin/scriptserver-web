<?php
$pageTitle = 'Social Reposts – ScriptServer';
$pageDesc  = 'Social media posts and reposts generated from ScriptServer content — Twitter/X, LinkedIn, Instagram, and more.';
require __DIR__ . '/../includes/header.php';
?>

<section class="page-hero" aria-labelledby="repost-heading">
    <div class="container page-hero-content">
        <span class="section-label">Social Reposts</span>
        <h1 id="repost-heading">Social Media Reposts</h1>
        <p>Platform-native social posts auto-generated from our content and published across Twitter/X, LinkedIn, Instagram, and Facebook.</p>
    </div>
</section>

<section class="section" aria-labelledby="reposts-list-heading">
    <div class="container">
        <h2 id="reposts-list-heading" class="sr-only">Social reposts</h2>
        <div class="grid grid-3" role="list">
            <?php
            $reposts = [
                ['Twitter/X', '𝕏', '#1e1e2e', '#60a5fa',
                 'The 8-Stage Content Pipeline Thread',
                 "🧵 How we go from 1 idea → 8 pieces of content automatically:\n\n1/ Idea Capture → Natural language input processed by AI\n2/ Script Generation → Full production script in 2 mins\n3/ Asset Creation → Thumbnails, graphics, overlays\n4/ Video Rendering → HD video with AI narration\n5/ Clip Extraction → Best moments as vertical shorts\n6/ Social Publishing → Auto-post to all platforms\n7/ Article Writing → SEO article from transcript\n8/ Analytics → Track it all in one dashboard\n\nPowered by ScriptServer ⚡",
                 '3 days ago'],
                ['LinkedIn', 'in', '#0f3460', '#93c5fd',
                 'Why Content Automation Is the Next Big Shift for Brands',
                 "Most brands are still creating content the manual way.\n\nHere's what the top 1% are doing instead:\n\n✅ Automating scriptwriting\n✅ AI-rendered videos\n✅ Auto-clip extraction\n✅ Scheduled multi-platform publishing\n✅ Real-time analytics\n\nThe result? 10× content output with the same team size.\n\nScriptServer makes this possible for any creator or brand.",
                 '1 week ago'],
                ['Instagram', '📷', '#1a0a2e', '#c084fc',
                 'Behind the Scenes: ScriptServer Pipeline',
                 "✨ One idea. Eight pieces of content. Zero manual editing.\n\n📝 Script → 🎨 Assets → 🎬 Video → ✂️ Clips → 📱 Social → 📰 Article → 📊 Analytics\n\nThis is the ScriptServer pipeline running in real time.\n\nSwipe to see how it works ➡️\n\n#contentautomation #aitools #creatortips #scriptserver",
                 '2 weeks ago'],
            ];
            foreach ($reposts as $r): ?>
            <article class="card" data-reveal role="listitem" style="background:var(--clr-surface-2);">
                <div style="display:flex;align-items:center;gap:.75rem;margin-bottom:1.25rem;">
                    <div style="width:40px;height:40px;border-radius:50%;background:<?= $r[2] ?>;display:flex;align-items:center;justify-content:center;font-size:1.1rem;border:1px solid <?= $r[3] ?>;" aria-hidden="true"><?= $r[1] ?></div>
                    <div>
                        <div style="font-weight:700;font-size:.9rem;"><?= htmlspecialchars($r[0], ENT_QUOTES, 'UTF-8') ?></div>
                        <div style="color:var(--clr-muted);font-size:.75rem;"><?= htmlspecialchars($r[6], ENT_QUOTES, 'UTF-8') ?></div>
                    </div>
                    <span class="tag tag-green" style="margin-left:auto;">Repost</span>
                </div>
                <h4 style="margin-bottom:.75rem;font-size:.95rem;"><?= htmlspecialchars($r[4], ENT_QUOTES, 'UTF-8') ?></h4>
                <p style="font-size:.85rem;color:var(--clr-muted);white-space:pre-line;line-height:1.6;"><?= htmlspecialchars($r[5], ENT_QUOTES, 'UTF-8') ?></p>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section" style="background:var(--clr-surface);" aria-labelledby="social-auto-heading">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Social Automation</span>
            <h2 id="social-auto-heading">How social publishing works</h2>
            <p>ScriptServer's Social Poster module generates and schedules platform-native posts for every video you produce.</p>
        </div>
        <div class="grid grid-4" role="list">
            <?php
            $platforms = [
                ['𝕏','Twitter / X',      'Threads, short-form posts, and quote tweets optimised for engagement and reach.'],
                ['in','LinkedIn',         'Professional long-form posts, carousels, and thought leadership content.'],
                ['📷','Instagram',        'Captions, hashtag sets, and Stories copy for feed posts and Reels.'],
                ['f','Facebook',          'Page posts optimised for the Facebook algorithm and community engagement.'],
            ];
            foreach ($platforms as $p): ?>
            <article class="card" data-reveal role="listitem">
                <div class="card-icon" aria-hidden="true"><?= $p[0] ?></div>
                <h3><?= htmlspecialchars($p[1], ENT_QUOTES, 'UTF-8') ?></h3>
                <p><?= htmlspecialchars($p[2], ENT_QUOTES, 'UTF-8') ?></p>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
