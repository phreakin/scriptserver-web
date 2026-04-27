<?php
$pageTitle = 'Privacy Policy – ScriptServer';
$pageDesc  = 'ScriptServer privacy policy — how we collect, use, and protect your data.';
require __DIR__ . '/../includes/header.php';
?>

<section class="page-hero" aria-labelledby="privacy-heading">
    <div class="container page-hero-content">
        <span class="section-label">Legal</span>
        <h1 id="privacy-heading">Privacy Policy</h1>
        <p>Last updated: <?= date('F j, Y') ?></p>
    </div>
</section>

<section class="section" aria-label="Privacy policy content">
    <div class="container" style="max-width:800px;">
        <div style="display:flex;flex-direction:column;gap:2rem;color:var(--clr-light);">

            <div>
                <h2>1. Information We Collect</h2>
                <p class="mt-2">We collect information you provide directly to us, such as when you fill out a contact form, sign up for the platform, or inquire about sponsorships. This may include your name, email address, company name, and message content.</p>
            </div>

            <div>
                <h2>2. How We Use Your Information</h2>
                <p class="mt-2">We use the information we collect to respond to your inquiries, provide and improve our services, send transactional communications, and analyse usage patterns to enhance the platform.</p>
            </div>

            <div>
                <h2>3. Information Sharing</h2>
                <p class="mt-2">We do not sell, trade, or rent your personal information to third parties. We may share information with trusted service providers who assist us in operating our platform, subject to confidentiality agreements.</p>
            </div>

            <div>
                <h2>4. Cookies</h2>
                <p class="mt-2">We use cookies and similar tracking technologies to enhance your experience on our website. You can control cookie settings through your browser preferences.</p>
            </div>

            <div>
                <h2>5. Data Security</h2>
                <p class="mt-2">We implement appropriate technical and organisational measures to protect your personal information against unauthorised access, alteration, disclosure, or destruction.</p>
            </div>

            <div>
                <h2>6. Contact</h2>
                <p class="mt-2">If you have questions about this Privacy Policy, please contact us at <a href="mailto:privacy@scriptserver.io" style="color:var(--clr-accent-2);">privacy@scriptserver.io</a>.</p>
            </div>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
