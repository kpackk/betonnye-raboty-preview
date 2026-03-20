document.addEventListener('DOMContentLoaded', () => {
    // 1. Header scroll effect - hide on scroll down, show on scroll up
    const header = document.querySelector('.site-header');
    if (header) {
        let lastScrollY = 0;
        window.addEventListener('scroll', () => {
            const currentScrollY = window.scrollY;
            header.classList.toggle('scrolled', currentScrollY > 50);
            if (currentScrollY > lastScrollY && currentScrollY > 100) {
                header.classList.add('header-hidden');
            } else {
                header.classList.remove('header-hidden');
            }
            lastScrollY = currentScrollY;
        });
    }

    // 2. Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(link => {
        link.addEventListener('click', (e) => {
            const target = document.querySelector(link.getAttribute('href'));
            if (target) {
                e.preventDefault();
                const headerHeight = document.querySelector('.site-header')?.offsetHeight || 90;
                window.scrollTo({
                    top: target.offsetTop - headerHeight,
                    behavior: 'smooth'
                });
            }
        });
    });

    // 3. Mobile menu toggle
    const menuToggle = document.querySelector('.mobile-menu-toggle');
    const mobileNav = document.querySelector('.mobile-nav');
    if (menuToggle && mobileNav) {
        menuToggle.addEventListener('click', () => {
            menuToggle.classList.toggle('active');
            mobileNav.classList.toggle('active');
            document.body.classList.toggle('menu-open');
        });
    }

    // 4. Swiper.js init for portfolio slider
    if (typeof Swiper !== 'undefined' && document.querySelector('.portfolio-slider')) {
        new Swiper('.portfolio-slider', {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                640: { slidesPerView: 2 },
                1024: { slidesPerView: 3 },
                1400: { slidesPerView: 4 },
            },
        });
    }

    // 5. Cookie consent
    const cookieBanner = document.getElementById('cookieBanner');
    const cookieAccept = document.getElementById('cookieAccept');
    if (cookieBanner && cookieAccept) {
        if (!localStorage.getItem('cookiesAccepted')) {
            cookieBanner.classList.remove('hidden');
        }
        cookieAccept.addEventListener('click', () => {
            localStorage.setItem('cookiesAccepted', 'true');
            cookieBanner.classList.add('hidden');
        });
    }

    // 6. Lazy loading images (native + intersection observer fallback)
    // (native loading="lazy" used in HTML, this is just a safety net)

    // 7. Portfolio Lightbox
    (function initLightbox() {
        // Collect all portfolio images
        const portfolioSection = document.querySelector('.section-portfolio');
        if (!portfolioSection) return;

        const images = portfolioSection.querySelectorAll('.portfolio-slide img, .portfolio-grid img');
        if (!images.length) return;

        // Build lightbox DOM
        const overlay = document.createElement('div');
        overlay.className = 'lightbox-overlay';
        overlay.innerHTML = `
            <button class="lightbox-close">&times;</button>
            <button class="lightbox-prev">&#8249;</button>
            <img class="lightbox-image" src="" alt="">
            <button class="lightbox-next">&#8250;</button>
            <div class="lightbox-thumbs"></div>
        `;
        document.body.appendChild(overlay);

        const lbImage = overlay.querySelector('.lightbox-image');
        const lbThumbs = overlay.querySelector('.lightbox-thumbs');
        let currentIndex = 0;
        const srcs = [];

        // Collect image sources and build thumbnails
        images.forEach((img, i) => {
            // Prefer link href (full size), fallback to img src
            const link = img.closest('a');
            const fullSrc = link ? link.href : img.src;
            srcs.push(fullSrc);

            const thumb = document.createElement('img');
            thumb.className = 'lightbox-thumb';
            thumb.src = img.src;
            thumb.alt = img.alt || '';
            thumb.addEventListener('click', () => showImage(i));
            lbThumbs.appendChild(thumb);

            // Click on portfolio image opens lightbox
            img.addEventListener('click', (e) => {
                e.preventDefault();
                if (link) e.stopPropagation();
                showImage(i);
            });

            // Prevent link default (opening in new tab)
            if (link) {
                link.addEventListener('click', (e) => e.preventDefault());
            }
        });

        function showImage(index) {
            currentIndex = index;
            lbImage.src = srcs[index];
            overlay.classList.add('active');
            document.body.style.overflow = 'hidden';

            // Update active thumbnail
            lbThumbs.querySelectorAll('.lightbox-thumb').forEach((t, i) => {
                t.classList.toggle('active', i === index);
            });

            // Scroll active thumb into view
            const activeThumb = lbThumbs.querySelector('.lightbox-thumb.active');
            if (activeThumb) activeThumb.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
        }

        function closeLightbox() {
            overlay.classList.remove('active');
            document.body.style.overflow = '';
        }

        function prevImage() {
            showImage((currentIndex - 1 + srcs.length) % srcs.length);
        }

        function nextImage() {
            showImage((currentIndex + 1) % srcs.length);
        }

        overlay.querySelector('.lightbox-close').addEventListener('click', closeLightbox);
        overlay.querySelector('.lightbox-prev').addEventListener('click', prevImage);
        overlay.querySelector('.lightbox-next').addEventListener('click', nextImage);

        // Close on overlay click (not image)
        overlay.addEventListener('click', (e) => {
            if (e.target === overlay) closeLightbox();
        });

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (!overlay.classList.contains('active')) return;
            if (e.key === 'Escape') closeLightbox();
            if (e.key === 'ArrowLeft') prevImage();
            if (e.key === 'ArrowRight') nextImage();
        });
    })();
});
