<?php
$pageTitle = 'Partnerships – ScriptServer';
$pageDesc  = 'Partner with ScriptServer to build the future of content automation. We work with creators, agencies, tool builders, and enterprise brands.';
require __DIR__ . '/../includes/header.php';
?>

<section class="page-hero" aria-labelledby="partnerships-heading">
    <div class="container page-hero-content">
        <span class="section-label">Partnerships</span>
        <h1 id="partnerships-heading">Build together with ScriptServer</h1>
        <p>We partner with creators, agencies, developers, and enterprise brands to grow the content automation ecosystem.</p>
    </div>
</section>

<!-- Partnership types -->
<section class="section" aria-labelledby="partnership-types-heading">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Partnership Types</span>
            <h2 id="partnership-types-heading">How we partner</h2>
        </div>
        <div class="grid grid-2" role="list">
            <?php
            $types = [
                ['🎨','Creator Partnership',
                 'Content creators and educators who want to grow with ScriptServer, co-create content, and earn through our affiliate and revenue-sharing programme.',
                 ['Affiliate programme (up to 30% recurring commission)', 'Early access to new features', 'Co-created content opportunities', 'Dedicated partner support', 'Community promotion and shoutouts']],
                ['🏢','Agency Partnership',
                 'Content and marketing agencies that want to white-label or resell ScriptServer to their clients — complete with agency-grade features and dedicated support.',
                 ['White-label platform option', 'Reseller programme with wholesale pricing', 'Dedicated agency dashboard', 'Bulk account management', 'Priority technical support']],
                ['🔧','Technology Partnership',
                 'SaaS and developer companies that want to build integrations, plugins, or complementary tools that connect with the ScriptServer ecosystem.',
                 ['API access and webhooks', 'Listed in the ScriptServer integration directory', 'Joint marketing and co-promotion', 'Developer documentation and sandbox', 'Revenue-sharing on referred users']],
                ['🏗️','Enterprise Partnership',
                 'Large organisations looking for custom implementations, dedicated infrastructure, or deep workflow integrations at scale.',
                 ['Custom deployment and infrastructure', 'SLA-backed uptime guarantee', 'Dedicated implementation engineer', 'Custom contract and pricing', 'Executive business reviews']],
            ];
            foreach ($types as $t): ?>
            <article class="card" data-reveal role="listitem">
                <div class="card-icon" aria-hidden="true"><?= $t[0] ?></div>
                <h3><?= htmlspecialchars($t[1], ENT_QUOTES, 'UTF-8') ?></h3>
                <p><?= htmlspecialchars($t[2], ENT_QUOTES, 'UTF-8') ?></p>
                <ul class="feature-list mt-3">
                    <?php foreach ($t[3] as $item): ?>
                    <li><?= htmlspecialchars($item, ENT_QUOTES, 'UTF-8') ?></li>
                    <?php endforeach; ?>
                </ul>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Partnership form -->
<section class="section" style="background:var(--clr-surface);" id="partnership-form-section" aria-labelledby="partnership-form-heading">
    <div class="container" style="max-width:680px;">
        <div class="section-header">
            <span class="section-label">Apply</span>
            <h2 id="partnership-form-heading">Partnership Inquiry</h2>
        </div>
        <form id="partnership-form" novalidate>
            <input type="hidden" name="inquiry_type" value="partnership">
            <div class="form-row">
                <div class="form-group">
                    <label for="company_name">Company / Creator Name <span aria-hidden="true">*</span></label>
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
                <label for="partnership_type">Partnership Type <span aria-hidden="true">*</span></label>
                <select id="partnership_type" name="partnership_type" required>
                    <option value="">Select type…</option>
                    <option>Creator Partnership</option>
                    <option>Agency Partnership</option>
                    <option>Technology Partnership</option>
                    <option>Enterprise Partnership</option>
                    <option>Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="website">Your Website or Social Profile</label>
                <input type="url" id="website" name="website" placeholder="https://" autocomplete="url">
            </div>
            <div class="form-group">
                <label for="message">Tell us about yourself and what you're looking to build together <span aria-hidden="true">*</span></label>
                <textarea id="message" name="message" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-full" style="justify-content:center;">Send Partnership Inquiry</button>
        </form>
    </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
