/**
 * Slider initialization with Swiper
 */

document.addEventListener('DOMContentLoaded', function () {
    if (typeof Swiper !== 'undefined') {
        const heroSwiper = new Swiper('.hero-swiper', {
            // Configuration de base
            loop: true,
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },

            // Autoplay
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },

            // Navigation
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // Pagination
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true,
            },

            // Vitesse et easing
            speed: 1000,

            // Accessibilité
            a11y: {
                prevSlideMessage: 'Diapositive précédente',
                nextSlideMessage: 'Diapositive suivante',
                firstSlideMessage: 'Première diapositive',
                lastSlideMessage: 'Dernière diapositive',
                paginationBulletMessage: 'Aller à la diapositive {{index}}',
            },

            // Événements
            on: {
                init: function () {
                    // Animation de la barre de progression
                    startProgressBar();
                },
                slideChangeTransitionStart: function () {
                    resetProgressBar();
                },
                slideChangeTransitionEnd: function () {
                    startProgressBar();
                }
            }
        });

        // Barre de progression
        let progressInterval;

        function startProgressBar() {
            const progressBar = document.querySelector('.progress-bar');
            if (progressBar) {
                progressBar.style.width = '0%';
                let width = 0;
                const intervalTime = 6000 / 100; // 60ms par incrément de 1%

                progressInterval = setInterval(function () {
                    if (width < 100) {
                        width++;
                        progressBar.style.width = width + '%';
                    } else {
                        clearInterval(progressInterval);
                    }
                }, intervalTime);
            }
        }

        function resetProgressBar() {
            if (progressInterval) {
                clearInterval(progressInterval);
            }
            const progressBar = document.querySelector('.progress-bar');
            if (progressBar) {
                progressBar.style.width = '0%';
            }
        }

        // Pause au survol
        const sliderContainer = document.querySelector('.hero-slider');
        if (sliderContainer) {
            sliderContainer.addEventListener('mouseenter', function () {
                heroSwiper.autoplay.stop();
                clearInterval(progressInterval);
            });

            sliderContainer.addEventListener('mouseleave', function () {
                heroSwiper.autoplay.start();
                resetProgressBar();
                startProgressBar();
            });
        }

        // Préchargement des images suivantes pour fluidité
        const slides = document.querySelectorAll('.swiper-slide');
        slides.forEach((slide, index) => {
            const img = slide.querySelector('img');
            if (img && index > 0) {
                const preloadLink = document.createElement('link');
                preloadLink.rel = 'preload';
                preloadLink.as = 'image';
                preloadLink.href = img.src;
                document.head.appendChild(preloadLink);
            }
        });
    }
});

// Lazy loading amélioré
if ('IntersectionObserver' in window) {
    const lazyImages = document.querySelectorAll('.slide-bg img[loading="lazy"]');
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.classList.add('loaded');
                imageObserver.unobserve(img);
            }
        });
    });

    lazyImages.forEach(img => imageObserver.observe(img));
}