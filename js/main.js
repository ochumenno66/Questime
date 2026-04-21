document.addEventListener("DOMContentLoaded", () => {
  // Автослайдер в секции HERO
  const slides = document.querySelectorAll(".hero-slide");
  const dots = document.querySelectorAll(".hero-dot");

  if (slides.length && dots.length) {
    const INTERVAL = 4200;
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
  }

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
    spaceBetween: 10,
    loop: true,

    navigation: {
      nextEl: ".quests__btn-next",
      prevEl: ".quests__btn-prev",
    },

    breakpoints: {
      575: {
        slidesPerView: 2,
        spaceBetween: 16,
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 16,
      },
      1200: {
        slidesPerView: 4,
        spaceBetween: 20,
      },
    },
    pagination: {
      el: ".quests__pagination",
    },
  });
  // Счетчик в секции СТАТИСТИКА
  const counters = document.querySelectorAll(".stat-number");
  const statsWrapper = document.querySelector(".stats__wrapper");

  function animateCounters() {
    const duration = 2000;
    const startTime = performance.now();

    counters.forEach((counter) => {
      counter.textContent = "0";
    });

    function update(time) {
      const elapsed = time - startTime;
      const progress = Math.min(elapsed / duration, 1);

      counters.forEach((counter) => {
        const target = +counter.dataset.target.replace(/\s/g, "");
        counter.textContent = Math.floor(target * progress).toLocaleString();
      });

      if (progress < 1) {
        requestAnimationFrame(update);
      } else {
        counters.forEach((counter) => {
          counter.textContent = counter.dataset.target;
        });
      }
    }

    requestAnimationFrame(update);
  }

  counters.forEach((counter) => {
    counter.dataset.target = counter.textContent.trim();
  });

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          animateCounters();
        }
      });
    },
    { threshold: 0.5 },
  );

  if (statsWrapper) {
    observer.observe(statsWrapper);
  }

  // Слайдер в секции Gallery
  function initSlider(trackSelector, speed, direction) {
    const track = document.querySelector(trackSelector);
    if (!track) return;

    const slides = [...track.children];
    let position = 0;
    let trackWidth = 0;
    let isPaused = false;

    slides.forEach((slide) => {
      track.appendChild(slide.cloneNode(true));
    });

    function updateTrackWidth() {
      trackWidth = track.scrollWidth / 2;

      if (direction === "right") {
        position = -trackWidth;
        track.style.transform = `translateX(${position}px)`;
      }
    }

    function animate() {
      if (!isPaused) {
        position += direction === "left" ? -speed : speed;

        if (direction === "left" && Math.abs(position) >= trackWidth) {
          position = 0;
        }

        if (direction === "right" && position >= 0) {
          position = -trackWidth;
        }

        track.style.transform = `translateX(${position}px)`;
      }

      requestAnimationFrame(animate);
    }

    track.addEventListener("mouseenter", () => {
      isPaused = true;
    });

    track.addEventListener("mouseleave", () => {
      isPaused = false;
    });

    track.addEventListener(
      "touchstart",
      () => {
        isPaused = true;
      },
      { passive: true },
    );

    track.addEventListener("touchend", () => {
      isPaused = false;
    });

    track.addEventListener("touchcancel", () => {
      isPaused = false;
    });

    updateTrackWidth();
    animate();

    window.addEventListener("resize", updateTrackWidth);
  }

  window.addEventListener("load", () => {
    const width = window.innerWidth;

    let speedTop;
    let speedBottom;

    if (width <= 576) {
      speedTop = 0.29;
      speedBottom = 0.23;
    } else if (width <= 768) {
      speedTop = 0.38;
      speedBottom = 0.28;
    } else if (width <= 1024) {
      speedTop = 0.6;
      speedBottom = 0.45;
    } else {
      speedTop = 0.67;
      speedBottom = 0.49;
    }

    initSlider("#slider-track__horizontal", speedTop, "left");
    initSlider("#slider-track__vertical", speedBottom, "right");
  });

  // Testimonials carousel
  let testimonialsSwiper;

  function initTestimonialsSwiper() {
    const screenWidth = window.innerWidth;

    if (screenWidth > 575) {
      if (!testimonialsSwiper) {
        testimonialsSwiper = new Swiper(".testimonials__carousel", {
          loop: true,
          grabCursor: true,
          centeredSlides: false,
          slidesPerView: "auto",
          spaceBetween: 24,
        });
      }
    } else {
      if (testimonialsSwiper) {
        // destroy(true, true) — удаляет объект и ВСЕ инлайновые стили
        testimonialsSwiper.destroy(true, true);
        testimonialsSwiper = null;
      }
    }
  }

  initTestimonialsSwiper();
  window.addEventListener("resize", initTestimonialsSwiper);

  // Form
  document.querySelectorAll(".custom-select").forEach((select) => {
    const trigger = select.querySelector(".custom-select__trigger");
    const valueEl = select.querySelector(".custom-select__value");
    const options = select.querySelectorAll(".custom-select__option");
    const hiddenInput = select.querySelector('input[type="hidden"]');

    trigger.addEventListener("click", () => {
      select.classList.toggle("is-open");
    });

    options.forEach((option) => {
      option.addEventListener("click", () => {
        valueEl.textContent = option.textContent;
        valueEl.classList.remove("custom-select__value--placeholder");
        hiddenInput.value = option.dataset.value;

        options.forEach((o) => o.classList.remove("is-selected"));
        option.classList.add("is-selected");

        select.classList.remove("is-open");
      });
    });

    // Закрыть при клике вне
    document.addEventListener("click", (e) => {
      if (!select.contains(e.target)) {
        select.classList.remove("is-open");
      }
    });
  });

  //FAQ
  const faq = document.querySelector(".faq__list");

  if (faq) {
    const items = faq.querySelectorAll(".faq__item");

    function closeItem(item) {
      item.classList.remove("is-open");
      item
        .querySelector(".faq__question")
        .setAttribute("aria-expanded", "false");
      item.querySelector(".faq__answer").style.maxHeight = null;
    }

    function openItem(item) {
      const answer = item.querySelector(".faq__answer");
      item.classList.add("is-open");
      item
        .querySelector(".faq__question")
        .setAttribute("aria-expanded", "true");
      answer.style.maxHeight = answer.scrollHeight + "px";
    }

    if (items.length) {
      openItem(items[0]);
    }

    faq.addEventListener("click", (e) => {
      const btn = e.target.closest(".faq__question");
      if (!btn) return;

      const item = btn.closest(".faq__item");
      const isOpen = item.classList.contains("is-open");

      items.forEach(closeItem);

      if (!isOpen) openItem(item);
    });
  }

  //Persons and Format
  const personsLists = document.querySelectorAll(".persons__list");

  personsLists.forEach((persons) => {
    const item = persons.querySelector(".persons__item");

    if (!item) return;

    const btn = item.querySelector(".persons__question");
    const answer = item.querySelector(".persons__answer");

    function openItem() {
      item.classList.add("is-open");
      btn.setAttribute("aria-expanded", "true");
      answer.style.maxHeight = answer.scrollHeight + "px";
    }

    function closeItem() {
      item.classList.remove("is-open");
      btn.setAttribute("aria-expanded", "false");
      answer.style.maxHeight = null;
    }

    if (item.classList.contains("is-open")) {
      openItem();
    }

    btn.addEventListener("click", () => {
      const isOpen = item.classList.contains("is-open");

      if (isOpen) {
        closeItem();
      } else {
        openItem();
      }
    });
  });

  /* Выпадающий список в блоке projects на странице Custom Games */
  const cards = document.querySelectorAll(".projects-card");
  cards.forEach((card) => {
    const items = card.querySelectorAll(".projects-card__list li");
    const button = card.querySelector(".projects-card__toggle");
    const buttonText = card.querySelector(".projects-card__toggle-text");
    if (!button) return;
    if (items.length > 3) {
      items.forEach((item, index) => {
        if (index >= 3) {
          item.classList.add("hidden");
        }
      });

    button.addEventListener("click", (e) => {
      e.preventDefault();
      const isOpen = card.classList.toggle("open");
      items.forEach((item, index) => {
        if (index >= 3) {
          item.classList.toggle("hidden", !isOpen);
        }
      });

      buttonText.textContent = isOpen ? "Show less" : "Expand the list";
      button.setAttribute("aria-expanded", isOpen);
    });
        } else {
          button.style.display = "none";
        }
      });
});
