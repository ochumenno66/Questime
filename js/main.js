document.addEventListener("DOMContentLoaded", () => {
    // CTA - Download button
  const ctaBtn = document.querySelector(".cta__btn");
  if (ctaBtn) {
    ctaBtn.setAttribute("href", "/wp-content/uploads/presentation.pdf");
  }

  // Testimonials carousel
const track = document.querySelector(".testimonials__track");
const cards = document.querySelectorAll(".testimonials__card");

if (track && cards.length) {
  let startX = 0;
  let isDragging = false;
  let startTranslate = 0;
  let currentTranslate = 0;

  const isMobile = () => window.innerWidth <= 575;

  function setTranslate(x) {
    track.style.transform = `translateX(${x}px)`;
  }

  function centerActiveCard(card) {
    const cardRect = card.getBoundingClientRect();
    const offset = cardRect.left - (window.innerWidth / 2 - cardRect.width / 2);
    currentTranslate = -offset;
    setTranslate(currentTranslate);
  }

  function updateActiveCard() {
    if (isMobile()) return;
    const center = window.innerWidth / 2;
    let closest = null;
    let minDistance = Infinity;

    cards.forEach((card) => {
      const rect = card.getBoundingClientRect();
      const cardCenter = rect.left + rect.width / 2;
      const distance = Math.abs(cardCenter - center);
      if (distance < minDistance) {
        minDistance = distance;
        closest = card;
      }
    });

    cards.forEach((card) => card.classList.remove("is-active"));
    if (closest) closest.classList.add("is-active");
  }

  track.addEventListener("touchstart", (e) => {
    if (isMobile()) return;
    startX = e.touches[0].clientX;
    startTranslate = currentTranslate;
    isDragging = true;
  });

  track.addEventListener("touchmove", (e) => {
    if (isMobile() || !isDragging) return;
    currentTranslate = startTranslate + (e.touches[0].clientX - startX);
    setTranslate(currentTranslate);
    updateActiveCard();
  });

  track.addEventListener("touchend", () => {
    isDragging = false;
    updateActiveCard();
  });

  track.addEventListener("mousedown", (e) => {
    if (isMobile()) return;
    startX = e.clientX;
    startTranslate = currentTranslate;
    isDragging = true;
    track.style.userSelect = "none";
  });

  track.addEventListener("mousemove", (e) => {
    if (isMobile() || !isDragging) return;
    currentTranslate = startTranslate + (e.clientX - startX);
    setTranslate(currentTranslate);
    updateActiveCard();
  });

  track.addEventListener("mouseup", () => {
    isDragging = false;
    track.style.userSelect = "";
    updateActiveCard();
  });

  track.addEventListener("mouseleave", () => {
    isDragging = false;
    track.style.userSelect = "";
  });

  if (!isMobile()) {
    centerActiveCard(cards[1]);
    updateActiveCard();
  } else {
    track.style.transform = "none";
  }

  window.addEventListener("resize", () => {
    if (isMobile()) {
      track.style.transform = "none";
      currentTranslate = 0;
    } else {
      centerActiveCard(cards[1]);
      updateActiveCard();
    }
  });
}
});
document.addEventListener("DOMContentLoaded", () => {
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
});
