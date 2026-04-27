<?php
$pageTitle = 'Terms of Service – ScriptServer';
$pageDesc  = 'ScriptServer terms of service — rules and guidelines for using our platform.';
require __DIR__ . '/../includes/header.php';
?>

<section class="page-hero" aria-labelledby="terms-heading">
    <div class="container page-hero-content">
        <span class="section-label">Legal</span>
        <h1 id="terms-heading">Terms of Service</h1>
        <p>Last updated: <?= date('F j, Y') ?></p>
    </div>
</section>

<section class="section" aria-label="Terms of service content">
    <div class="container" style="max-width:800px;">
        <div style="display:flex;flex-direction:column;gap:2rem;color:var(--clr-light);">

            <div>
                <h2>1. Acceptance of Terms</h2>
                <p class="mt-2">By accessing or using ScriptServer, you agree to be bound by these Terms of Service. If you do not agree to these terms, please do not use our services.</p>
            </div>

            <div>
                <h2>2. Use of Service</h2>
                <p class="mt-2">You may use ScriptServer only for lawful purposes and in accordance with these Terms. You agree not to use the service to produce content that is illegal, harmful, defamatory, or infringing on third-party rights.</p>
            </div>

            <div>
                <h2>3. Intellectual Property</h2>
                <p class="mt-2">Content you produce using ScriptServer from your own inputs belongs to you. The ScriptServer platform, software, and design are the intellectual property of ScriptServer. You may not copy, modify, or distribute platform components without written permission.</p>
            </div>

            <div>
                <h2>4. Subscriptions and Billing</h2>
                <p class="mt-2">Paid plans are billed monthly or annually as selected. Refunds are provided within 7 days of the first charge for new subscriptions. Renewals are non-refundable unless otherwise required by law.</p>
            </div>

            <div>
                <h2>5. Limitation of Liability</h2>
                <p class="mt-2">ScriptServer is provided "as is" without warranties of any kind. We are not liable for any indirect, incidental, or consequential damages arising from your use of the platform.</p>
            </div>

            <div>
                <h2>6. Changes to Terms</h2>
                <p class="mt-2">We reserve the right to update these Terms at any time. Continued use of ScriptServer after changes constitutes acceptance of the new Terms.</p>
            </div>

            <div>
                <h2>7. Contact</h2>
                <p class="mt-2">Questions about these Terms? Contact us at <a href="mailto:legal@scriptserver.io" style="color:var(--clr-accent-2);">legal@scriptserver.io</a>.</p>
            </div>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
