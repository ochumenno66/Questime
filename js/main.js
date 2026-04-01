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
