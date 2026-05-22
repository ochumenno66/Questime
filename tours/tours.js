/**
 * РАСПИСАНИЕ ЭКСКУРСИЙ — JS
 * Файл: /wp-content/themes/YOUR_THEME/tours/tours.js
 */
(function ($) {
  "use strict";

  // ============================================================
  // ТАБЫ
  // ============================================================
  function initTabs() {
    var $tabs = $(".schedule__month-btn");
    var $panels = $(".schedule__list");

    if (!$tabs.length || !$panels.length) {
      console.log("Tabs not found");
      return;
    }

    $tabs.on("click", function () {
      var month = $(this).data("month");

      $tabs.removeClass("is-active").attr("aria-selected", "false");

      $(this).addClass("is-active").attr("aria-selected", "true");

      $panels.addClass("is-hidden");

      $("#month-" + month).removeClass("is-hidden");
    });
  }

  // ============================================================
  // ТАЙМЕРЫ ОБРАТНОГО ОТСЧЁТА
  // ============================================================
  function updateTimer($timer) {
    var deadline = parseInt($timer.data("deadline"), 10); // timestamp в ms
    var now = Date.now();
    var diff = deadline - now;

    if (diff <= 0) {
      // Скидка истекла — обновляем карточку через AJAX
      var $card = $timer.closest(".tour-card");
      refreshCardFromServer($card);
      return;
    }

    var totalSeconds = Math.floor(diff / 1000);
    var days = Math.floor(totalSeconds / 86400);
    var hours = Math.floor((totalSeconds % 86400) / 3600);
    var minutes = Math.floor((totalSeconds % 3600) / 60);

    $timer.find(".timer-d").text(pad(days));
    $timer.find(".timer-h").text(pad(hours));
    $timer.find(".timer-m").text(pad(minutes));
  }

  function pad(n) {
    return n < 10 ? "0" + n : String(n);
  }

  function initTimers() {
    var $timers = $(".tour-card__timer");

    if (!$timers.length) return;

    // Первый прогон
    $timers.each(function () {
      updateTimer($(this));
    });

    // Обновляем каждую минуту
    setInterval(function () {
      $timers.each(function () {
        updateTimer($(this));
      });
    }, 60000);
  }

  // ============================================================
  // ОБНОВЛЕНИЕ КАРТОЧКИ С СЕРВЕРА (когда скидка истекает)
  // ============================================================
  function refreshCardFromServer($card) {
    var tourId = $card.data("tour-id");
    if (!tourId || !window.ToursData) return;

    $.ajax({
      url: window.ToursData.ajax_url,
      type: "POST",
      data: {
        action: "tour_get_info",
        nonce: window.ToursData.nonce,
        tour_id: tourId,
      },
      success: function (response) {
        if (!response.success) return;

        var price = response.data.price;
        var seats = response.data.seats;

        // Обновляем цену
        var $priceWrap = $card.find(".tour-card__price-wrap");

        if (price.discount) {
          $priceWrap.html(
            '<span class="tour-card__price-old">' +
              formatPrice(price.base_price) +
              " ₽</span>" +
              '<span class="tour-card__price tour-card__price--sale">' +
              formatPrice(price.final_price) +
              " ₽</span>" +
              '<span class="tour-card__discount-badge">−20%</span>' +
              '<span class="tour-card__price-note">с человека</span>',
          );
        } else {
          $priceWrap.html(
            '<span class="tour-card__price">' +
              formatPrice(price.final_price) +
              " ₽</span>" +
              '<span class="tour-card__price-note">с человека</span>',
          );
          // Скрываем таймер
          $card.find(".tour-card__timer").fadeOut(400, function () {
            $(this).remove();
          });
        }

        // Обновляем места
        var $seats = $card.find(".tour-card__seats");
        if (seats.sold_out) {
          $seats.html(
            '<span class="tour-card__badge tour-card__badge--sold-out">Мест нет</span>',
          );
          $card.addClass("is-sold-out");
          $card
            .find(".tour-card__btn")
            .replaceWith(
              '<button class="tour-card__btn tour-card__btn--disabled" disabled>Нет мест</button>',
            );
        } else if (seats.few_left) {
          $seats.html(
            '<span class="tour-card__badge tour-card__badge--few">Осталось ' +
              seats.left +
              " " +
              pluralRu(seats.left, "место", "места", "мест") +
              "</span>",
          );
        } else {
          $seats.html(
            '<span class="tour-card__seats-count">' +
              seats.left +
              " " +
              pluralRu(seats.left, "место", "места", "мест") +
              "</span>",
          );
        }
      },
    });
  }

  // ============================================================
  // УТИЛИТЫ
  // ============================================================
  function formatPrice(n) {
    return Math.round(n)
      .toString()
      .replace(/\B(?=(\d{3})+(?!\d))/g, " ");
  }

  function pluralRu(n, one, few, many) {
    var mod10 = n % 10;
    var mod100 = n % 100;
    if (mod100 >= 11 && mod100 <= 19) return many;
    if (mod10 === 1) return one;
    if (mod10 >= 2 && mod10 <= 4) return few;
    return many;
  }

  // ============================================================
  // SMOOTH ADD TO CART FEEDBACK
  // ============================================================
  function initCartButtons() {
    $(document).on(
      "click",
      ".tour-card__btn:not(.tour-card__btn--disabled)",
      function (e) {
        var $btn = $(this);
        if ($btn.hasClass("is-loading")) return;

        // Визуальный фидбек (кнопка улетает в корзину)
        $btn.addClass("is-loading").text("Добавляем...");

        // Возвращаем текст через 1.5s если страница не сменилась
        setTimeout(function () {
          $btn.removeClass("is-loading").text("Купить билет");
        }, 1500);
      },
    );
  }

  // ============================================================
  // INIT
  // ============================================================
  $(document).ready(function () {
    initTabs();
    initTimers();
    initCartButtons();
  });
})(jQuery);
