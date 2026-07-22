/**
 * Praxleo Theme Scripts
 * Smooth scrolling + mobile offcanvas menu
 */
(function () {
    'use strict';

    /* ============================
     * CONFIGURATION
     * ============================ */
    const SMOOTH_SCROLL = {
        duration: 800,
        easing: 'easeInOutCubic',
        sensitivity: 1.2,
        excludedTags: ['INPUT', 'TEXTAREA', 'SELECT', 'A'],
    };

    /* ============================
     * MOBILE OFFCANVAS MENU
     * ============================ */
    function initMobileMenu() {
        const toggle = document.getElementById('menu-toggle');
        const close = document.getElementById('menu-close');
        const menu = document.getElementById('offcanvas-menu');
        const overlay = document.getElementById('offcanvas-overlay');

        if (!toggle || !menu) return;

        const openMenu = () => {
            menu.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        };

        const closeMenu = () => {
            menu.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
            document.body.style.overflow = '';
        };

        toggle.addEventListener('click', openMenu);
        close.addEventListener('click', closeMenu);
        overlay.addEventListener('click', closeMenu);
    }

    /* ============================
     * SMOOTH SCROLLING
     * ============================ */
    function initSmoothScroll() {
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

        const easings = {
            linear: (t) => t,
            easeInOutCubic: (t) =>
                t < 0.5 ? 4 * t * t * t : 1 - Math.pow(-2 * t + 2, 3) / 2,
        };

        const easingFn = easings[SMOOTH_SCROLL.easing] || easings.easeInOutCubic;
        let isScrolling = false;
        let targetY = 0;
        let startY = 0;
        let startTime = 0;

        function smoothStep(timestamp) {
            if (!startTime) startTime = timestamp;
            const elapsed = timestamp - startTime;
            const progress = Math.min(elapsed / SMOOTH_SCROLL.duration, 1);
            const eased = easingFn(progress);

            const currentY = startY + (targetY - startY) * eased;
            window.scrollTo(0, currentY);

            if (progress < 1) {
                requestAnimationFrame(smoothStep);
            } else {
                isScrolling = false;
            }
        }

        function onWheel(e) {
            if (isScrolling) e.preventDefault();

            const tag = e.target.tagName;
            if (SMOOTH_SCROLL.excludedTags.includes(tag)) return;

            e.preventDefault();

            const delta = (e.deltaY || e.detail) * SMOOTH_SCROLL.sensitivity;
            const maxScroll = document.documentElement.scrollHeight - window.innerHeight;
            targetY = Math.min(Math.max(window.scrollY + delta, 0), maxScroll);

            if (!isScrolling) {
                isScrolling = true;
                startY = window.scrollY;
                startTime = 0;
                requestAnimationFrame(smoothStep);
            }
        }

        function onKeyDown(e) {
            const scrollKeys = [
                'ArrowDown', 'ArrowUp', 'ArrowLeft', 'ArrowRight',
                'PageDown', 'PageUp', 'Home', 'End', ' ',
            ];

            if (!scrollKeys.includes(e.key)) return;

            const tag = e.target.tagName;
            if (SMOOTH_SCROLL.excludedTags.includes(tag)) return;

            e.preventDefault();

            const viewportH = window.innerHeight;
            let scrollAmount = 0;

            switch (e.key) {
                case 'ArrowDown':
                    scrollAmount = 80 * SMOOTH_SCROLL.sensitivity;
                    break;
                case 'ArrowUp':
                    scrollAmount = -80 * SMOOTH_SCROLL.sensitivity;
                    break;
                case 'PageDown':
                    scrollAmount = viewportH * 0.85;
                    break;
                case 'PageUp':
                    scrollAmount = -viewportH * 0.85;
                    break;
                case 'Home':
                    scrollAmount = -window.scrollY;
                    break;
                case 'End':
                    scrollAmount = document.documentElement.scrollHeight - window.innerHeight - window.scrollY;
                    break;
                case ' ':
                    scrollAmount = e.shiftKey ? -viewportH * 0.85 : viewportH * 0.85;
                    break;
            }

            const maxScroll = document.documentElement.scrollHeight - window.innerHeight;
            targetY = Math.min(Math.max(window.scrollY + scrollAmount, 0), maxScroll);

            if (!isScrolling) {
                isScrolling = true;
                startY = window.scrollY;
                startTime = 0;
                requestAnimationFrame(smoothStep);
            }
        }

        window.addEventListener('wheel', onWheel, { passive: false });
        window.addEventListener('keydown', onKeyDown);
    }

    /* ============================
     * INIT
     * ============================ */
    document.addEventListener('DOMContentLoaded', function () {
        initMobileMenu();
        initSmoothScroll();
    });
})();
