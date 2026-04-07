document.addEventListener("DOMContentLoaded", () => {

  // CTA - Download button
  const ctaBtn = document.querySelector(".cta__btn");
  if (ctaBtn) {
    ctaBtn.setAttribute("href", "/wp-content/uploads/presentation.pdf");
  }

  // Testimonials carousel
  let testimonialsSwiper;

  function initTestimonialsSwiper() {
    const screenWidth = window.innerWidth;
    
    if (screenWidth > 575) {
      if (!testimonialsSwiper) {
        testimonialsSwiper = new Swiper(".testimonials__carousel", {
          loop: true,
          grabCursor: true,
          centeredSlides: true,
          slidesPerView: "auto",
          spaceBetween: 24,
        });
      }
    } else {
      if (testimonialsSwiper) {
        testimonialsSwiper.destroy(true, true); 
        testimonialsSwiper = null;
      }
    }
  }

  initTestimonialsSwiper();
  window.addEventListener("resize", initTestimonialsSwiper);

  // Автослайдер в секции HERO
  const INTERVAL = 4200;
  const slides = document.querySelectorAll(".hero-slide");
  const dots = document.querySelectorAll(".hero-dot");
  let current = 0;
  let autoTimer;

  function goTo(idx) {
    slides[current].classList.remove("active");
    dots[current].classList.remove("active");
    current = (idx + slides.length) % slides.length;
    slides[current].classList.add("active");
    dots[current].classList.add("active");
  }

  function start() {
    clearInterval(autoTimer);
    autoTimer = setInterval(() => goTo(current + 1), INTERVAL);
  }

  dots.forEach((d) =>
    d.addEventListener("click", () => {
      goTo(+d.dataset.i);
      start();
    }),
  );

  start();

  // Бургер меню
  const burgerBtn = document.getElementById("burgerBtn");
  const dropdown = document.getElementById("burgerDropdown");
  const mobileMenu = document.getElementById("mobileMenu");
  const mobileOverlay = document.getElementById("mobileOverlay");

  function isMobile() {
    return window.innerWidth <= 768;
  }

  function openMenu() {
    burgerBtn.classList.add("is-open");
    burgerBtn.setAttribute("aria-expanded", "true");

    if (isMobile()) {
      mobileMenu.classList.add("is-open");
      mobileOverlay.classList.add("is-open");
      document.body.style.overflow = "hidden";
    } else {
      dropdown.classList.add("is-open");
    }
  }

  function closeMenu() {
    burgerBtn.classList.remove("is-open");
    burgerBtn.setAttribute("aria-expanded", "false");
    dropdown.classList.remove("is-open");
    mobileMenu.classList.remove("is-open");
    mobileOverlay.classList.remove("is-open");
    document.body.style.overflow = "";
  }

  burgerBtn.addEventListener("click", function () {
    const isOpen = burgerBtn.classList.contains("is-open");
    isOpen ? closeMenu() : openMenu();
  });

  mobileOverlay.addEventListener("click", closeMenu);

  document.addEventListener("keydown", function (e) {
    if (e.key === "Escape") {
      closeMenu();
    }
  });

  window.addEventListener("resize", function () {
    if (window.innerWidth >= 1320) {
      closeMenu();
    }
  });

  document
    .querySelectorAll(".burger-dropdown__menu a, .mobile-menu__nav a")
    .forEach(function (link) {
      link.addEventListener("click", closeMenu);
    });

  document.addEventListener("click", function (e) {
    const isClickInsideMenu = e.target.closest("#burgerDropdown");
    const isClickOnBurger = e.target.closest("#burgerBtn");

    if (!isClickInsideMenu && !isClickOnBurger) {
      closeMenu();
    }
  });

  // Кнопка Наверх
  const scrollBtn = document.getElementById("scrollTop");
  const footer = document.querySelector("footer");

  window.addEventListener("scroll", () => {
    if (window.innerWidth <= 1024) return;

    const scrollY = window.scrollY + window.innerHeight;
    const footerTop = footer.offsetTop;

    if (scrollY > window.innerHeight && scrollY < footerTop) {
      scrollBtn.classList.add("is-visible");
    } else {
      scrollBtn.classList.remove("is-visible");
    }
  });

  scrollBtn.addEventListener("click", () => {
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  });

  // Cлайдер в секции Quests
  const questsSwiper = new Swiper(".quests__slider", {
    slidesPerView: 1,
    spaceBetween: 20,
    loop: true,

    navigation: {
      nextEl: ".quests__btn-next",
      prevEl: ".quests__btn-prev",
    },

    breakpoints: {
      575: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 3,
      },
    },
    pagination: {
      el: ".quests__pagination",
    },
  });
  // Счетчик в секции СТАТИСТИКА
  const counters = document.querySelectorAll('.stat-number');
  const statsWrapper = document.querySelector('.stats__wrapper');

  function animateCounters() {
  const duration = 2000;
  const startTime = performance.now();

  counters.forEach(counter => {
      counter.textContent = '0';
  });

  function update(time) {
      const elapsed = time - startTime;
      const progress = Math.min(elapsed / duration, 1);

      counters.forEach(counter => {
      const target = +counter.dataset.target.replace(/\s/g, '');
      counter.textContent = Math.floor(target * progress).toLocaleString();
      });

      if (progress < 1) {
      requestAnimationFrame(update);
      } else {
      counters.forEach(counter => {
          counter.textContent = counter.dataset.target;
      });
      }
  }

  requestAnimationFrame(update);
  }

  counters.forEach(counter => {
  counter.dataset.target = counter.textContent.trim();
  });

  const observer = new IntersectionObserver(entries => {
  entries.forEach(entry => {
      if (entry.isIntersecting) {
      animateCounters();
      }
  });
  }, {threshold: 0.5});

  observer.observe(statsWrapper);
});