<?php
$pageTitle = 'Sponsorships – ScriptServer';
$pageDesc  = 'Sponsor ScriptServer and reach a highly engaged audience of creators, marketers, and builders. Explore our sponsorship packages.';
require __DIR__ . '/../includes/header.php';
?>

<section class="page-hero" aria-labelledby="sponsorships-heading">
    <div class="container page-hero-content">
        <span class="section-label">Sponsorships</span>
        <h1 id="sponsorships-heading">Partner with ScriptServer</h1>
        <p>Reach thousands of creators, marketers, and tech builders through ScriptServer video sponsorships, newsletter placements, and platform integrations.</p>
    </div>
</section>

<!-- Audience stats -->
<section class="section-sm" aria-labelledby="audience-heading">
    <div class="container">
        <h2 id="audience-heading" class="sr-only">Audience statistics</h2>
        <div class="stats-row">
            <div class="stat-item" data-reveal>
                <div class="stat-value">50K+</div>
                <div class="stat-label">Monthly video views</div>
            </div>
            <div class="stat-item" data-reveal>
                <div class="stat-value">15K+</div>
                <div class="stat-label">Newsletter subscribers</div>
            </div>
            <div class="stat-item" data-reveal>
                <div class="stat-value">8K+</div>
                <div class="stat-label">Platform users</div>
            </div>
            <div class="stat-item" data-reveal>
                <div class="stat-value">75%</div>
                <div class="stat-label">Audience: creators & marketers</div>
            </div>
        </div>
    </div>
</section>

<!-- Sponsorship packages -->
<section class="section" aria-labelledby="packages-heading">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Packages</span>
            <h2 id="packages-heading">Sponsorship options</h2>
            <p>Choose the package that fits your goals and budget. All packages include a dedicated performance report.</p>
        </div>
        <div class="grid grid-3">
            <div class="pricing-card" data-reveal>
                <h3>Video Mention</h3>
                <div class="price-amount mt-2"><sup>$</sup>500</div>
                <div class="price-period">per video</div>
                <ul class="price-features">
                    <li><span class="check">✓</span> 30-second mid-roll read</li>
                    <li><span class="check">✓</span> Link in video description</li>
                    <li><span class="check">✓</span> Social post mention</li>
                    <li><span class="cross">✗</span> Dedicated content</li>
                    <li><span class="cross">✗</span> Newsletter placement</li>
                </ul>
                <a href="#sponsor-form" class="btn btn-outline w-full" style="justify-content:center;">Inquire</a>
            </div>
            <div class="pricing-card featured" data-reveal>
                <div class="badge-featured">Best Value</div>
                <h3>Featured Sponsor</h3>
                <div class="price-amount mt-2"><sup>$</sup>2,500</div>
                <div class="price-period">per month</div>
                <ul class="price-features">
                    <li><span class="check">✓</span> Pre-roll mention in all videos</li>
                    <li><span class="check">✓</span> Newsletter feature</li>
                    <li><span class="check">✓</span> Social media posts (all platforms)</li>
                    <li><span class="check">✓</span> Logo on website</li>
                    <li><span class="check">✓</span> Monthly performance report</li>
                </ul>
                <a href="#sponsor-form" class="btn btn-primary w-full" style="justify-content:center;">Get Featured</a>
            </div>
            <div class="pricing-card" data-reveal>
                <h3>Exclusive Partner</h3>
                <div class="price-amount mt-2"><sup>$</sup>8,000</div>
                <div class="price-period">per month</div>
                <ul class="price-features">
                    <li><span class="check">✓</span> Exclusive category sponsorship</li>
                    <li><span class="check">✓</span> Dedicated sponsored video</li>
                    <li><span class="check">✓</span> Platform integration page</li>
                    <li><span class="check">✓</span> Cross-promotion on all channels</li>
                    <li><span class="check">✓</span> Custom campaign strategy</li>
                </ul>
                <a href="#sponsor-form" class="btn btn-outline w-full" style="justify-content:center;">Become Exclusive</a>
            </div>
        </div>
    </div>
</section>

<!-- Inquiry form -->
<section class="section" style="background:var(--clr-surface);" id="sponsor-form" aria-labelledby="sponsor-form-heading">
    <div class="container" style="max-width:680px;">
        <div class="section-header">
            <span class="section-label">Get in Touch</span>
            <h2 id="sponsor-form-heading">Sponsorship Inquiry</h2>
        </div>
        <form id="sponsorship-form" novalidate>
            <input type="hidden" name="inquiry_type" value="sponsorship">
            <div class="form-row">
                <div class="form-group">
                    <label for="company_name">Company Name <span aria-hidden="true">*</span></label>
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
                <label for="budget">Monthly Budget</label>
                <select id="budget" name="budget">
                    <option value="">Select a range…</option>
                    <option>$500 – $1,000</option>
                    <option>$1,000 – $3,000</option>
                    <option>$3,000 – $8,000</option>
                    <option>$8,000+</option>
                </select>
            </div>
            <div class="form-group">
                <label for="message">Tell us about your brand and goals <span aria-hidden="true">*</span></label>
                <textarea id="message" name="message" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-full" style="justify-content:center;">Send Sponsorship Inquiry</button>
        </form>
    </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
