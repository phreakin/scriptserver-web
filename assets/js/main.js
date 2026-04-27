/* ============================================================
   ScriptServer Web – Main JavaScript
   ============================================================ */

(function () {
    'use strict';

    /* ----------------------------------------------------------
       Mobile navigation toggle
    ---------------------------------------------------------- */
    const navToggle = document.getElementById('nav-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    if (navToggle && mobileMenu) {
        navToggle.addEventListener('click', function () {
            mobileMenu.classList.toggle('hidden');
            const isOpen = !mobileMenu.classList.contains('hidden');
            navToggle.setAttribute('aria-expanded', isOpen);
        });

        // Close mobile menu when a link is clicked
        mobileMenu.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                mobileMenu.classList.add('hidden');
                navToggle.setAttribute('aria-expanded', 'false');
            });
        });
    }

    /* ----------------------------------------------------------
       Accordion
    ---------------------------------------------------------- */
    document.querySelectorAll('.accordion-trigger').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const item = btn.closest('.accordion-item');
            const isOpen = item.classList.contains('open');

            // Close all open items in this accordion
            const accordion = item.closest('.accordion');
            if (accordion) {
                accordion.querySelectorAll('.accordion-item.open').forEach(function (openItem) {
                    openItem.classList.remove('open');
                });
            }

            if (!isOpen) {
                item.classList.add('open');
            }
        });
    });

    /* ----------------------------------------------------------
       Smooth scroll offset for sticky nav
    ---------------------------------------------------------- */
    document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
        anchor.addEventListener('click', function (e) {
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                e.preventDefault();
                const navHeight = document.getElementById('site-nav') ? 72 : 0;
                const top = target.getBoundingClientRect().top + window.scrollY - navHeight;
                window.scrollTo({ top: top, behavior: 'smooth' });
            }
        });
    });

    /* ----------------------------------------------------------
       Active nav link highlighting
    ---------------------------------------------------------- */
    (function setActiveNavLink() {
        const path = window.location.pathname.replace(/\/$/, '') || '/';
        document.querySelectorAll('#site-nav .nav-links a, #mobile-menu a').forEach(function (a) {
            const href = a.getAttribute('href').replace(/\/$/, '') || '/';
            if (href === path || (href !== '/' && path.startsWith(href))) {
                a.classList.add('active');
            }
        });
    }());

    /* ----------------------------------------------------------
       Contact / inquiry form AJAX submission
    ---------------------------------------------------------- */
    function initAjaxForm(formId, endpoint) {
        const form = document.getElementById(formId);
        if (!form) return;

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            const btn = form.querySelector('[type="submit"]');
            const originalText = btn.textContent;
            btn.disabled = true;
            btn.textContent = 'Sending…';

            const data = new FormData(form);

            fetch(endpoint, { method: 'POST', body: data })
                .then(function (res) { return res.json(); })
                .then(function (json) {
                    showToast(json.message || 'Message sent!', json.success ? 'success' : 'error');
                    if (json.success) form.reset();
                })
                .catch(function () {
                    showToast('Something went wrong. Please try again.', 'error');
                })
                .finally(function () {
                    btn.disabled = false;
                    btn.textContent = originalText;
                });
        });
    }

    initAjaxForm('contact-form', '/api/contact.php');
    initAjaxForm('sponsorship-form', '/api/inquiry.php');
    initAjaxForm('brand-deal-form', '/api/inquiry.php');
    initAjaxForm('partnership-form', '/api/inquiry.php');

    /* ----------------------------------------------------------
       Toast notification
    ---------------------------------------------------------- */
    function showToast(message, type) {
        const existing = document.querySelector('.toast');
        if (existing) existing.remove();

        const toast = document.createElement('div');
        toast.className = 'toast ' + (type || '');
        toast.textContent = message;
        document.body.appendChild(toast);

        // Trigger animation
        requestAnimationFrame(function () {
            requestAnimationFrame(function () {
                toast.classList.add('show');
            });
        });

        setTimeout(function () {
            toast.classList.remove('show');
            setTimeout(function () { toast.remove(); }, 300);
        }, 4000);
    }

    /* ----------------------------------------------------------
       Scroll-reveal for elements with data-reveal attribute
    ---------------------------------------------------------- */
    if ('IntersectionObserver' in window) {
        const style = document.createElement('style');
        style.textContent = '[data-reveal]{opacity:0;transform:translateY(24px);transition:opacity .5s ease,transform .5s ease}[data-reveal].revealed{opacity:1;transform:none}';
        document.head.appendChild(style);

        const io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('revealed');
                    io.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12 });

        document.querySelectorAll('[data-reveal]').forEach(function (el) {
            io.observe(el);
        });
    }

    /* expose for inline use */
    window.showToast = showToast;
}());
