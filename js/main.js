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
    on: {
      init: function () {
        checkLoopAndArrows(this);
      },
      resize: function () {
        checkLoopAndArrows(this);
      },
    },
  });

  function checkLoopAndArrows(swiper) {
    const slidesCount = swiper.slides.length;
    const currentSlidesPerView = swiper.params.slidesPerView;

    if (slidesCount <= currentSlidesPerView) {
      swiper.params.loop = false;
      swiper.navigation.nextEl.style.display = "none";
      swiper.navigation.prevEl.style.display = "none";
      swiper.update();
    } else {
      swiper.params.loop = true;
      swiper.navigation.nextEl.style.display = "";
      swiper.navigation.prevEl.style.display = "";
      swiper.update();
    }
  }

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
    const carousel = document.querySelector(".testimonials__carousel");

    if (!carousel) return;

    const slidesCount = Number(carousel.dataset.count);
    const isSliderEnabled = window.innerWidth > 479 && slidesCount >= 5;

    if (isSliderEnabled) {
      if (!testimonialsSwiper) {
        testimonialsSwiper = new Swiper(".testimonials__carousel", {
          loop: true,
          grabCursor: true,
          centeredSlides: false,
          spaceBetween: 24,
          slidesPerView: "auto",
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

  // Модальное окно для видео с отзывов
  const videoModal = document.querySelector(".video-modal");
  const videoModalVideo = document.querySelector(".video-modal__video");
  const videoModalClose = document.querySelector(".video-modal__close");
  const videoModalOverlay = document.querySelector(".video-modal__overlay");

  if (videoModal && videoModalVideo && videoModalClose && videoModalOverlay) {
    document
      .querySelectorAll(".testimonials__video-preview")
      .forEach((preview) => {
        preview.addEventListener("click", () => {
          const videoUrl = preview.dataset.video;
          videoModalVideo.src = videoUrl;
          videoModal.classList.add("active");
          videoModalVideo.play();
        });
      });

    function closeVideoModal() {
      videoModal.classList.remove("active");
      videoModalVideo.pause();
      videoModalVideo.src = "";
    }

    videoModalClose.addEventListener("click", closeVideoModal);
    videoModalOverlay.addEventListener("click", closeVideoModal);
  }

  // Form выпадающий список
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

  // Модальное окно
  const modal = document.getElementById("contactModal");
  const modalOverlay = document.getElementById("contactModalOverlay");
  const modalClose = document.getElementById("modalClose");
  const modalForm = document.querySelector(".contact-modal__form");
  const modalDesc = document.getElementById("modalDesc");
  const modalSuccess = document.getElementById("modalSuccess");
  const openModalButtons = document.querySelectorAll(".open-modal");

  function openModal() {
    if (!modal) {
      return;
    }
    modal.classList.add("is-open");
    modal.setAttribute("aria-hidden", "false");
    document.body.classList.add("modal-open");
  }

  function closeModal() {
    if (!modal) {
      return;
    }
    modal.classList.remove("is-open");
    modal.setAttribute("aria-hidden", "true");
    document.body.classList.remove("modal-open");

    if (modalForm) {
      modalForm.hidden = false;
      modalForm.reset();
    }
    if (modalDesc) {
      modalDesc.hidden = false;
    }
    if (modalSuccess) {
      modalSuccess.hidden = true;
    }
  }

  openModalButtons.forEach((button) => {
    button.addEventListener("click", (event) => {
      event.preventDefault();
      openModal();
    });
  });

  if (modalOverlay) {
    modalOverlay.addEventListener("click", closeModal);
  }
  if (modalClose) {
    modalClose.addEventListener("click", closeModal);
  }
  document.addEventListener("keydown", (event) => {
    if (
      modal &&
      event.key === "Escape" &&
      modal.classList.contains("is-open")
    ) {
      closeModal();
    }
  });

  // Cookie banner
  const cookieBanner = document.getElementById("cookieBanner");
  const cookieAccept = document.getElementById("cookieAccept");

  if (cookieBanner && cookieAccept) {
    const cookieAccepted = localStorage.getItem("cookieAccepted");

    if (!cookieAccepted) {
      setTimeout(() => {
        cookieBanner.classList.remove("is-hidden");
      }, 3000);
    }

    cookieAccept.addEventListener("click", () => {
      localStorage.setItem("cookieAccepted", "true");
      cookieBanner.classList.add("is-hidden");
    });
  }

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

  //Persons
  const rows = document.querySelectorAll(".persons__row");
  const item = document.querySelector(".persons__item");
  const btn = document.querySelector(".persons__question");

  const visibleCount = 5;

  if (rows.length > visibleCount) {
    rows.forEach((row, index) => {
      if (index >= visibleCount) {
        row.classList.add("hidden");
      }
    });

    let isOpen = false;

    btn.addEventListener("click", (e) => {
      e.preventDefault();

      isOpen = !isOpen;

      rows.forEach((row, index) => {
        if (index >= visibleCount) {
          row.classList.toggle("hidden", !isOpen);
        }
      });

      item.classList.toggle("is-open", isOpen);
    });
  }

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
