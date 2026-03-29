document.addEventListener("DOMContentLoaded", () => {
    const INTERVAL = 4200;
    const slides = document.querySelectorAll('.slide');
    const dots   = document.querySelectorAll('.dot');
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
});
