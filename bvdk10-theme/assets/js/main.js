/**
 * BVDK10 Theme - Main JavaScript
 * Bệnh viện Đa khoa số 10
 */

(function() {
    'use strict';

    /**
     * DOM Ready
     */
    document.addEventListener('DOMContentLoaded', function() {
        initMobileNav();
        initStickyHeader();
        initBackToTop();
        initDoctorsCarousel();
        initStoriesCarousel();
        initScrollAnimations();
        initVisionMissionTabs();
    });

    /**
     * Mobile Navigation
     */
    function initMobileNav() {
        const toggle = document.getElementById('menu-toggle');
        const nav = document.getElementById('mobile-nav');
        const overlay = document.getElementById('mobile-nav-overlay');
        const close = document.getElementById('mobile-nav-close');

        if (!toggle || !nav) return;

        function openNav() {
            nav.classList.add('is-active');
            document.body.style.overflow = 'hidden';
            toggle.setAttribute('aria-expanded', 'true');
        }

        function closeNav() {
            nav.classList.remove('is-active');
            document.body.style.overflow = '';
            toggle.setAttribute('aria-expanded', 'false');
        }

        toggle.addEventListener('click', openNav);

        if (overlay) {
            overlay.addEventListener('click', closeNav);
        }

        if (close) {
            close.addEventListener('click', closeNav);
        }

        // Close on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && nav.classList.contains('is-active')) {
                closeNav();
            }
        });
    }

    /**
     * Sticky Header
     */
    function initStickyHeader() {
        const header = document.getElementById('header');
        if (!header) return;

        let lastScrollY = window.scrollY;
        let ticking = false;

        function updateHeader() {
            const scrollY = window.scrollY;

            if (scrollY > 100) {
                header.classList.add('is-scrolled');
            } else {
                header.classList.remove('is-scrolled');
            }

            // Hide/show on scroll direction
            if (scrollY > lastScrollY && scrollY > 200) {
                header.classList.add('is-hidden');
            } else {
                header.classList.remove('is-hidden');
            }

            lastScrollY = scrollY;
            ticking = false;
        }

        window.addEventListener('scroll', function() {
            if (!ticking) {
                requestAnimationFrame(updateHeader);
                ticking = true;
            }
        });
    }

    /**
     * Back to Top Button
     */
    function initBackToTop() {
        const button = document.getElementById('back-to-top');
        if (!button) return;

        function toggleButton() {
            if (window.scrollY > 500) {
                button.classList.add('is-visible');
            } else {
                button.classList.remove('is-visible');
            }
        }

        window.addEventListener('scroll', throttle(toggleButton, 100));

        button.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    /**
     * Doctors Carousel
     */
    function initDoctorsCarousel() {
        const container = document.querySelector('.doctors__swiper');
        if (!container || typeof Swiper === 'undefined') return;

        const progressBar = document.getElementById('doctors-progress');
        const totalSlides = container.querySelectorAll('.swiper-slide').length;

        const swiper = new Swiper(container, {
            slidesPerView: 'auto',
            spaceBetween: 27,
            grabCursor: true,
            speed: 600,
            breakpoints: {
                768: {
                    spaceBetween: 27,
                },
                1024: {
                    spaceBetween: 27,
                }
            },
            on: {
                init: function() {
                    updateProgress(this);
                },
                slideChange: function() {
                    updateProgress(this);
                    updatePaginationNumbers(this, '.doctors__pagination-current');
                }
            }
        });

        function updateProgress(swiper) {
            if (!progressBar) return;
            const progress = ((swiper.activeIndex + 1) / totalSlides) * 100;
            progressBar.style.width = Math.min(progress, 100) + '%';
        }

        function updatePaginationNumbers(swiper, selector) {
            const current = document.querySelector(selector);
            if (current) {
                current.textContent = String(swiper.activeIndex + 1).padStart(2, '0');
            }
        }
    }

    /**
     * Stories Carousel
     */
    function initStoriesCarousel() {
        const container = document.querySelector('.stories__swiper');
        if (!container || typeof Swiper === 'undefined') return;

        const progressBar = document.getElementById('stories-progress');
        const totalSlides = container.querySelectorAll('.swiper-slide').length;

        const swiper = new Swiper(container, {
            slidesPerView: 'auto',
            spaceBetween: 25,
            grabCursor: true,
            speed: 600,
            breakpoints: {
                768: {
                    spaceBetween: 25,
                },
                1024: {
                    spaceBetween: 25,
                }
            },
            on: {
                init: function() {
                    updateProgress(this);
                },
                slideChange: function() {
                    updateProgress(this);
                    updatePaginationNumbers(this, '.stories__pagination-current');
                }
            }
        });

        function updateProgress(swiper) {
            if (!progressBar) return;
            const progress = ((swiper.activeIndex + 1) / totalSlides) * 100;
            progressBar.style.width = Math.min(progress, 100) + '%';
        }

        function updatePaginationNumbers(swiper, selector) {
            const current = document.querySelector(selector);
            if (current) {
                current.textContent = String(swiper.activeIndex + 1).padStart(2, '0');
            }
        }
    }

    /**
     * Scroll Animations
     */
    function initScrollAnimations() {
        if (!('IntersectionObserver' in window)) return;

        const animatedElements = document.querySelectorAll(
            '.about, .why-choose, .services, .doctors, .achievements, .partners, .stories, .mobile-app'
        );

        const observer = new IntersectionObserver(
            function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    }
                });
            },
            {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            }
        );

        animatedElements.forEach(function(el) {
            el.classList.add('animate-on-scroll');
            observer.observe(el);
        });

        // Add animation styles
        const style = document.createElement('style');
        style.textContent = `
            .animate-on-scroll {
                opacity: 0;
                transform: translateY(30px);
                transition: opacity 0.6s ease, transform 0.6s ease;
            }
            .animate-on-scroll.is-visible {
                opacity: 1;
                transform: translateY(0);
            }
        `;
        document.head.appendChild(style);
    }

    /**
     * Vision Mission Tabs
     */
    function initVisionMissionTabs() {
        const tabs = document.querySelectorAll('.vision-mission__tab');
        const panels = document.querySelectorAll('.vision-mission__panel');

        if (!tabs.length) return;

        tabs.forEach(function(tab) {
            tab.addEventListener('click', function() {
                const target = this.dataset.tab;

                // Update tabs
                tabs.forEach(function(t) {
                    t.classList.remove('is-active');
                });
                this.classList.add('is-active');

                // Update panels
                panels.forEach(function(p) {
                    p.classList.remove('is-active');
                });
                const targetPanel = document.getElementById('panel-' + target);
                if (targetPanel) {
                    targetPanel.classList.add('is-active');
                }
            });
        });
    }

    /**
     * Utility: Throttle
     */
    function throttle(func, limit) {
        let inThrottle;
        return function() {
            const args = arguments;
            const context = this;
            if (!inThrottle) {
                func.apply(context, args);
                inThrottle = true;
                setTimeout(function() {
                    inThrottle = false;
                }, limit);
            }
        };
    }

    /**
     * Utility: Debounce
     */
    function debounce(func, wait) {
        let timeout;
        return function() {
            const context = this;
            const args = arguments;
            clearTimeout(timeout);
            timeout = setTimeout(function() {
                func.apply(context, args);
            }, wait);
        };
    }

})();
