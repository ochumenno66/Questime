document.addEventListener("DOMContentLoaded", () => {
    // Автослайдер в секции HERO
    const INTERVAL = 4200;
    const slides = document.querySelectorAll('.hero-slide');
    const dots   = document.querySelectorAll('.hero-dot');
    let current  = 0;
    let autoTimer;

    function goTo(idx) {
        slides[current].classList.remove('active');
        dots[current].classList.remove('active');
        current = (idx + slides.length) % slides.length;
        slides[current].classList.add('active');
        dots[current].classList.add('active');
    }

    function start() {
        clearInterval(autoTimer);
        autoTimer = setInterval(() => goTo(current + 1), INTERVAL);
    }

    dots.forEach(d => d.addEventListener('click', () => {
        goTo(+d.dataset.i);
        start();
    }));

    start();

    // Бургер меню
    const burgerBtn = document.getElementById('burgerBtn');
    const dropdown = document.getElementById('burgerDropdown');
    const mobileMenu = document.getElementById('mobileMenu');
    const mobileOverlay = document.getElementById('mobileOverlay');

    function isMobile() {
        return window.innerWidth <= 768;
    }

    function openMenu() {
        burgerBtn.classList.add('is-open');
        burgerBtn.setAttribute('aria-expanded', 'true');

        if (isMobile()) {
        mobileMenu.classList.add('is-open');
        mobileOverlay.classList.add('is-open');
        document.body.style.overflow = 'hidden';
        } else {
        dropdown.classList.add('is-open');
        }
    }

    function closeMenu() {
        burgerBtn.classList.remove('is-open');
        burgerBtn.setAttribute('aria-expanded', 'false');
        dropdown.classList.remove('is-open');
        mobileMenu.classList.remove('is-open');
        mobileOverlay.classList.remove('is-open');
        document.body.style.overflow = '';
    }

    burgerBtn.addEventListener('click', function () {
        const isOpen = burgerBtn.classList.contains('is-open');
        isOpen ? closeMenu() : openMenu();
    });

    mobileOverlay.addEventListener('click', closeMenu);

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            closeMenu();
        }
    });

    window.addEventListener('resize', function () {
        if (window.innerWidth >= 1320) {
        closeMenu();
        }
    });

    document.querySelectorAll('.burger-dropdown__menu a, .mobile-menu__nav a').forEach(function (link) {
        link.addEventListener('click', closeMenu);
    });

    document.addEventListener('click', function (e) {
        const isClickInsideMenu = e.target.closest('#burgerDropdown');
        const isClickOnBurger = e.target.closest('#burgerBtn');

        if (!isClickInsideMenu && !isClickOnBurger) {
            closeMenu();
        }
    });

});
