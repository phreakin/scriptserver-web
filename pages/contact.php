<?php
$pageTitle = 'Contact – ScriptServer';
$pageDesc  = 'Get in touch with the ScriptServer team. We respond to all inquiries within one business day.';
require __DIR__ . '/../includes/header.php';
?>

<section class="page-hero" aria-labelledby="contact-heading">
    <div class="container page-hero-content">
        <span class="section-label">Contact</span>
        <h1 id="contact-heading">Get in Touch</h1>
        <p>Have a question, idea, or want to explore a partnership? We'd love to hear from you.</p>
    </div>
</section>

<section class="section" aria-labelledby="contact-section-heading">
    <div class="container">
        <h2 id="contact-section-heading" class="sr-only">Contact options</h2>
        <div class="grid grid-2" style="align-items:start;gap:4rem;">

            <!-- Form -->
            <div data-reveal>
                <h3 style="margin-bottom:1.5rem;">Send us a message</h3>
                <form id="contact-form" novalidate>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Your Name <span aria-hidden="true">*</span></label>
                            <input type="text" id="name" name="name" required autocomplete="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address <span aria-hidden="true">*</span></label>
                            <input type="email" id="email" name="email" required autocomplete="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <select id="subject" name="subject">
                            <option value="">Choose a topic…</option>
                            <option>General inquiry</option>
                            <option>Platform question</option>
                            <option>Sponsorship</option>
                            <option>Brand deal</option>
                            <option>Partnership</option>
                            <option>Technical support</option>
                            <option>Press / media</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message">Message <span aria-hidden="true">*</span></label>
                        <textarea id="message" name="message" rows="6" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-full" style="justify-content:center;">Send Message</button>
                </form>
            </div>

            <!-- Info -->
            <div data-reveal>
                <h3 style="margin-bottom:1.5rem;">Other ways to reach us</h3>

                <div style="display:flex;flex-direction:column;gap:1.5rem;">
                    <div class="card">
                        <div style="display:flex;align-items:center;gap:1rem;">
                            <div class="card-icon" style="margin-bottom:0;flex-shrink:0;" aria-hidden="true">📧</div>
                            <div>
                                <div style="font-weight:700;">General Inquiries</div>
                                <a href="mailto:hello@scriptserver.io" style="color:var(--clr-accent-2);">hello@scriptserver.io</a>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div style="display:flex;align-items:center;gap:1rem;">
                            <div class="card-icon" style="margin-bottom:0;flex-shrink:0;" aria-hidden="true">🤝</div>
                            <div>
                                <div style="font-weight:700;">Partnerships &amp; Brand Deals</div>
                                <a href="mailto:partners@scriptserver.io" style="color:var(--clr-accent-2);">partners@scriptserver.io</a>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div style="display:flex;align-items:center;gap:1rem;">
                            <div class="card-icon" style="margin-bottom:0;flex-shrink:0;" aria-hidden="true">🛠️</div>
                            <div>
                                <div style="font-weight:700;">Technical Support</div>
                                <a href="mailto:support@scriptserver.io" style="color:var(--clr-accent-2);">support@scriptserver.io</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="margin-top:2.5rem;">
                    <h4 style="margin-bottom:1rem;font-size:1rem;">Follow us</h4>
                    <div class="social-links">
                        <a href="#" aria-label="Twitter/X">𝕏</a>
                        <a href="#" aria-label="YouTube">▶</a>
                        <a href="#" aria-label="LinkedIn">in</a>
                        <a href="#" aria-label="Instagram">📷</a>
                        <a href="#" aria-label="TikTok">♪</a>
                    </div>
                </div>

                <div class="card mt-4" style="background:rgba(124,58,237,.06);border-color:rgba(124,58,237,.2);">
                    <p style="font-size:.875rem;">⚡ We typically respond within <strong>1 business day</strong>. For partnership inquiries, please include your website or social profile link so we can respond with a tailored proposal.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quick links -->
<section class="section-sm" style="background:var(--clr-surface);" aria-labelledby="quick-links-heading">
    <div class="container">
        <h2 id="quick-links-heading" class="section-label text-center mb-3" style="display:block;">Looking for something specific?</h2>
        <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;">
            <a href="/sponsorships" class="btn btn-outline">Sponsorships</a>
            <a href="/brand-deals"  class="btn btn-outline">Brand Deals</a>
            <a href="/partnerships" class="btn btn-outline">Partnerships</a>
            <a href="/platform"     class="btn btn-outline">Platform Docs</a>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
