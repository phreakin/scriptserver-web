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

/* ============================================================
   Community Hub
   ============================================================ */
(function initCommunityHub() {
    'use strict';

    /* ----------------------------------------------------------
       Category filter
    ---------------------------------------------------------- */
    var catCards  = document.querySelectorAll('.community-cat-card');
    var libItems  = document.querySelectorAll('#community-library .community-item-card');
    var filterBar = document.getElementById('active-filter-bar');
    var filterLbl = document.getElementById('active-filter-label');
    var clearBtn  = document.getElementById('clear-filter-btn');
    var noResults = document.getElementById('no-results-msg');

    function applyFilter(type) {
        var visible = 0;
        libItems.forEach(function (card) {
            if (!type || card.dataset.type === type) {
                card.removeAttribute('hidden');
                visible++;
            } else {
                card.setAttribute('hidden', '');
            }
        });
        if (filterBar) {
            filterBar.hidden = !type;
            if (filterLbl) {
                filterLbl.textContent = type
                    ? type.charAt(0).toUpperCase() + type.slice(1) + 's'
                    : '';
            }
        }
        if (noResults) { noResults.hidden = visible > 0; }
        catCards.forEach(function (card) {
            card.setAttribute('aria-pressed', card.dataset.filter === type ? 'true' : 'false');
        });
    }

    if (catCards.length) {
        catCards.forEach(function (card) {
            card.addEventListener('click', function () {
                var active = card.getAttribute('aria-pressed') === 'true';
                applyFilter(active ? '' : card.dataset.filter);
            });
        });
        if (clearBtn) {
            clearBtn.addEventListener('click', function () { applyFilter(''); });
        }
    }

    /* ----------------------------------------------------------
       Modal helpers
    ---------------------------------------------------------- */
    function openModal(modal) {
        if (!modal) { return; }
        modal.hidden = false;
        document.body.style.overflow = 'hidden';
        var box = modal.querySelector('.community-modal-box');
        if (box) { box.setAttribute('tabindex', '-1'); box.focus(); }
    }

    function closeModal(modal) {
        if (!modal) { return; }
        modal.hidden = true;
        document.body.style.overflow = '';
    }

    function bindModalClose(modal) {
        if (!modal) { return; }
        var backdrop = modal.querySelector('.community-modal-backdrop');
        if (backdrop) {
            backdrop.addEventListener('click', function () { closeModal(modal); });
        }
        modal.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') { closeModal(modal); }
        });
    }

    var disclaimerModal = document.getElementById('disclaimer-modal');
    var policyModal     = document.getElementById('policy-modal');
    var contributeModal = document.getElementById('contribute-modal');

    bindModalClose(disclaimerModal);
    bindModalClose(policyModal);
    bindModalClose(contributeModal);

    /* ----------------------------------------------------------
       Download flow (one-time disclaimer)
    ---------------------------------------------------------- */
    var DL_KEY = 'ss_community_dl_accepted';
    var pendingDlId = null;

    function triggerDownload(id) {
        window.location.href = '/api/community-download.php?id=' + encodeURIComponent(id);
    }

    document.querySelectorAll('.community-dl-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            pendingDlId = btn.dataset.itemId;
            if (localStorage.getItem(DL_KEY)) {
                triggerDownload(pendingDlId);
            } else {
                openModal(disclaimerModal);
            }
        });
    });

    if (disclaimerModal) {
        var dlAcceptBtn = document.getElementById('disclaimer-accept-btn');
        var dlCancelBtn = document.getElementById('disclaimer-cancel-btn');
        if (dlAcceptBtn) {
            dlAcceptBtn.addEventListener('click', function () {
                localStorage.setItem(DL_KEY, '1');
                closeModal(disclaimerModal);
                if (pendingDlId) { triggerDownload(pendingDlId); }
                pendingDlId = null;
            });
        }
        if (dlCancelBtn) {
            dlCancelBtn.addEventListener('click', function () {
                closeModal(disclaimerModal);
                pendingDlId = null;
            });
        }
    }

    /* ----------------------------------------------------------
       Contribute flow (policy → form)
    ---------------------------------------------------------- */
    var policyCheckbox  = document.getElementById('policy-agree-checkbox');
    var policyAcceptBtn = document.getElementById('policy-accept-btn');
    var policyCancelBtn = document.getElementById('policy-cancel-btn');
    var contCancelBtn   = document.getElementById('contribute-cancel-btn');

    function openContributeFlow() {
        if (policyCheckbox)  { policyCheckbox.checked = false; }
        if (policyAcceptBtn) { policyAcceptBtn.disabled = true; }
        openModal(policyModal);
    }

    document.querySelectorAll('#open-contribute-btn, #open-contribute-btn-2').forEach(function (btn) {
        if (btn) { btn.addEventListener('click', openContributeFlow); }
    });

    if (policyCheckbox) {
        policyCheckbox.addEventListener('change', function () {
            if (policyAcceptBtn) { policyAcceptBtn.disabled = !policyCheckbox.checked; }
        });
    }
    if (policyAcceptBtn) {
        policyAcceptBtn.addEventListener('click', function () {
            closeModal(policyModal);
            openModal(contributeModal);
        });
    }
    if (policyCancelBtn) {
        policyCancelBtn.addEventListener('click', function () { closeModal(policyModal); });
    }
    if (contCancelBtn) {
        contCancelBtn.addEventListener('click', function () { closeModal(contributeModal); });
    }

    /* ----------------------------------------------------------
       Contribution form AJAX submit
    ---------------------------------------------------------- */
    var submitForm = document.getElementById('community-submit-form');
    if (submitForm) {
        submitForm.addEventListener('submit', function (e) {
            e.preventDefault();
            var btn = submitForm.querySelector('[type="submit"]');
            var orig = btn.textContent;
            btn.disabled = true;
            btn.textContent = 'Submitting…';

            fetch('/api/community-submit.php', { method: 'POST', body: new FormData(submitForm) })
                .then(function (r) { return r.json(); })
                .then(function (json) {
                    window.showToast(json.message || 'Submitted!', json.success ? 'success' : 'error');
                    if (json.success) {
                        submitForm.reset();
                        closeModal(contributeModal);
                    }
                })
                .catch(function () { window.showToast('Something went wrong. Please try again.', 'error'); })
                .finally(function () { btn.disabled = false; btn.textContent = orig; });
        });
    }

    /* ----------------------------------------------------------
       Voting
    ---------------------------------------------------------- */
    document.querySelectorAll('.community-vote-row').forEach(function (row) {
        var itemId   = row.dataset.itemId;
        var upBtn    = row.querySelector('.vote-btn.upvote');
        var downBtn  = row.querySelector('.vote-btn.downvote');
        var scoreEl  = row.querySelector('.vote-score');

        function sendVote(vote) {
            var data = new FormData();
            data.append('item_id', itemId);
            data.append('vote', vote);

            fetch('/api/community-vote.php', { method: 'POST', body: data })
                .then(function (r) { return r.json(); })
                .then(function (json) {
                    if (json.success) {
                        if (scoreEl)  { scoreEl.textContent = json.score; }
                        if (upBtn)    { upBtn.classList.toggle('voted-up',    json.user_vote === 1);  }
                        if (downBtn)  { downBtn.classList.toggle('voted-down', json.user_vote === -1); }
                    } else {
                        window.showToast(json.message || 'Could not record your vote.', 'error');
                    }
                })
                .catch(function () { window.showToast('Could not record your vote. Please try again.', 'error'); });
        }

        if (upBtn)   { upBtn.addEventListener('click',   function () { sendVote(1);  }); }
        if (downBtn) { downBtn.addEventListener('click', function () { sendVote(-1); }); }
    });
}());
