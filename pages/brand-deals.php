<?php
$pageTitle = 'Brand Deals – ScriptServer';
$pageDesc  = 'Explore brand deal opportunities with ScriptServer. Integrate your product into our content or co-create custom branded content.';
require __DIR__ . '/../includes/header.php';
?>

<section class="page-hero" aria-labelledby="brand-deals-heading">
    <div class="container page-hero-content">
        <span class="section-label">Brand Deals</span>
        <h1 id="brand-deals-heading">Brand Deal Opportunities</h1>
        <p>Collaborate with ScriptServer to integrate your product into our content, co-create branded videos, or run custom campaigns at scale.</p>
    </div>
</section>

<!-- Deal types -->
<section class="section" aria-labelledby="deal-types-heading">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Deal Types</span>
            <h2 id="deal-types-heading">Ways to work together</h2>
        </div>
        <div class="grid grid-3" role="list">
            <?php
            $dealTypes = [
                ['🎬','Integrated Video Content',
                 'Your product is naturally integrated into our video scripts and production. Authentic, engaging, and non-disruptive.',
                 ['Script-level integration', 'Custom demo sections', 'Authentic creator presentation', 'Repurposed across all formats']],
                ['🤝','Co-Created Campaigns',
                 'We build an entire content campaign around your product — scripts, videos, clips, articles, and social posts — all aligned to your campaign goals.',
                 ['Dedicated campaign strategy', 'Multi-format content package', 'Cross-channel publishing', 'Full analytics report']],
                ['🔌','Platform Integration',
                 'Integrate your tool or service directly into the ScriptServer platform as a recommended integration, reaching active platform users.',
                 ['Integration page listing', 'In-platform promotion', 'Email campaign feature', 'Case study co-creation']],
            ];
            foreach ($dealTypes as $d): ?>
            <article class="card" data-reveal role="listitem">
                <div class="card-icon" aria-hidden="true"><?= $d[0] ?></div>
                <h3><?= htmlspecialchars($d[1], ENT_QUOTES, 'UTF-8') ?></h3>
                <p><?= htmlspecialchars($d[2], ENT_QUOTES, 'UTF-8') ?></p>
                <ul class="feature-list mt-3">
                    <?php foreach ($d[3] as $item): ?>
                    <li><?= htmlspecialchars($item, ENT_QUOTES, 'UTF-8') ?></li>
                    <?php endforeach; ?>
                </ul>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Who we work with -->
<section class="section" style="background:var(--clr-surface);" aria-labelledby="ideal-brands-heading">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Ideal Partners</span>
            <h2 id="ideal-brands-heading">Who is a great fit?</h2>
            <p>We partner with brands whose products genuinely serve creators, marketers, and builders.</p>
        </div>
        <div class="grid grid-4" role="list">
            <?php
            $categories = [
                ['🛠️','Creator Tools',      'Video editing, recording, design, and productivity software for content creators.'],
                ['🤖','AI Platforms',       'AI writing, image generation, voice synthesis, and automation tools.'],
                ['📈','Marketing Software', 'Analytics, CRM, email marketing, and growth hacking platforms.'],
                ['🎓','Online Education',   'Courses, communities, and learning platforms for digital skills.'],
            ];
            foreach ($categories as $c): ?>
            <article class="card" data-reveal role="listitem">
                <div class="card-icon" aria-hidden="true"><?= $c[0] ?></div>
                <h3><?= htmlspecialchars($c[1], ENT_QUOTES, 'UTF-8') ?></h3>
                <p><?= htmlspecialchars($c[2], ENT_QUOTES, 'UTF-8') ?></p>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Brand deal form -->
<section class="section" id="brand-deal-form-section" aria-labelledby="brand-deal-form-heading">
    <div class="container" style="max-width:680px;">
        <div class="section-header">
            <span class="section-label">Get in Touch</span>
            <h2 id="brand-deal-form-heading">Brand Deal Inquiry</h2>
        </div>
        <form id="brand-deal-form" novalidate>
            <input type="hidden" name="inquiry_type" value="brand_deal">
            <div class="form-row">
                <div class="form-group">
                    <label for="company_name">Company / Brand Name <span aria-hidden="true">*</span></label>
                    <input type="text" id="company_name" name="company_name" required autocomplete="organization">
                </div>
                <div class="form-group">
                    <label for="contact_name">Your Name <span aria-hidden="true">*</span></label>
                    <input type="text" id="contact_name" name="contact_name" required autocomplete="name">
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email Address <span aria-hidden="true">*</span></label>
                <input type="email" id="email" name="email" required autocomplete="email">
            </div>
            <div class="form-group">
                <label for="deal_type">Deal Type</label>
                <select id="deal_type" name="deal_type">
                    <option value="">Select deal type…</option>
                    <option>Integrated Video Content</option>
                    <option>Co-Created Campaign</option>
                    <option>Platform Integration</option>
                    <option>Other / Not sure yet</option>
                </select>
            </div>
            <div class="form-group">
                <label for="budget">Campaign Budget</label>
                <select id="budget" name="budget">
                    <option value="">Select a range…</option>
                    <option>Under $1,000</option>
                    <option>$1,000 – $5,000</option>
                    <option>$5,000 – $15,000</option>
                    <option>$15,000+</option>
                </select>
            </div>
            <div class="form-group">
                <label for="message">Describe your product and campaign goals <span aria-hidden="true">*</span></label>
                <textarea id="message" name="message" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-full" style="justify-content:center;">Send Brand Deal Inquiry</button>
        </form>
    </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
