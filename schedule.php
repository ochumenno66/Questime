<?php
/*
Template Name: Schedule
*/

get_header(); ?>

<main>
  <section class="schedule section-special">
    <div class="container">
      <!-- Хлебные крошки — автоматические -->
      <?php questime_breadcrumbs(); ?>
      <span class="schedule__year">2026</span>
      <div class="schedule__months" role="tablist" aria-label="Month selector">
        <button class="btn schedule__month-btn" role="tab" aria-selected="false" data-month="january">January</button>
        <button class="btn schedule__month-btn is-active" role="tab" aria-selected="true" data-month="february">February</button>
        <button class="btn schedule__month-btn" role="tab" aria-selected="false" data-month="march">March</button>
      </div>
      <div class="schedule__list" role="list">
        <article class="schedule__event-wrapper" role="listitem">
          <div class="schedule__event">
            <div class="schedule__date-wrapper">
              <div class="schedule__date">
                <span class="schedule__date-num">1</span>
                <span class="schedule__date-day">Sunday</span>
              </div>
              <div class="schedule__time">13:00 - 15:30</div>
            </div>
            <div class="schedule__title-col">
              <a href="event-page.html" class="schedule__quest-title">"Monopoly: The Golden Age of Amsterdam"</a>
              <span class="schedule__quest-subtitle">Family Quest-Tour in the Genre of Economic</span>
            </div>
            <div class="schedule__desc-col">
              <p class="schedule__desc-text">
                Rescue a girl from Beyond the Frame world, uncover the secrets of the Golden Age, and fall in love with art – together as a family! Rescue a girl from Beyond the Frame world, uncover the secrets of the Golden Age, and fall in love with art – together as a family!
              </p>
              <div class="schedule__price-wrapper">
                <span class="schedule__badge schedule__badge--early">early booking −10%</span>
                <div class="schedule__price-row">
                  <span class="schedule__price">30 €</span>
                  <a href="#" class="btn schedule__buy-btn">Buy ticket</a>
                </div>
              </div>
            </div>
            <div class="schedule__photo-wrap">
              <img class="schedule__photo" src="./assets/images/gallery/gallery-1.webp" alt="Monopoly: The Golden Age of Amsterdam" loading="lazy"/>
            </div>
          </div>
        </article>

        <article class="schedule__event-wrapper" role="listitem">
          <div class="schedule__event schedule__event--orange">
            <div class="schedule__date-wrapper">
              <div class="schedule__date">
                <span class="schedule__date-num">1</span>
                <span class="schedule__date-day">Sunday</span>
              </div>
              <div class="schedule__time">19:00 - 21:00</div>
            </div>
            <div class="schedule__title-col">
              <a href="event-page.html" class="schedule__quest-title">"Monopoly: The Golden Age of Amsterdam"</a>
              <span class="schedule__quest-subtitle">Family Quest-Tour in the Genre of Economic Game</span>
            </div>
            <div class="schedule__desc-col">
              <p class="schedule__desc-text">Rescue a girl from Beyond the Frame world, uncover the secrets of the Golden Age, and fall in love with art – together as a family! Rescue a girl from Beyond the Frame world, uncover the secrets of the Golden Age, and...</p>
              <div class="schedule__price-wrapper">
                <span class="schedule__badge schedule__badge--early">early booking −10%</span>
                <div class="schedule__price-row">
                  <span class="schedule__price">30 €</span>
                  <a href="#" class="btn schedule__buy-btn">Buy ticket</a>
                </div>
              </div>
            </div>
            <div class="schedule__photo-wrap">
              <img class="schedule__photo" src="./assets/images/gallery/gallery-2.webp" alt="Monopoly: The Golden Age of Amsterdam" loading="lazy"/>
            </div>
          </div>
        </article>

            <article class="schedule__event-wrapper" role="listitem">
              <div class="schedule__event">
                <div class="schedule__date-wrapper">
                  <div class="schedule__date">
                    <span class="schedule__date-num">10</span>
                    <span class="schedule__date-day">Tuesday</span>
                  </div>
                  <div class="schedule__time">13:00 - 15:30</div>
                </div>
                <div class="schedule__title-col">
                  <a href="event-page.html" class="schedule__quest-title"
                    >"Monopoly: The Golden Age of Amsterdam"</a
                  >
                  <span class="schedule__quest-subtitle"
                    >Family Quest-Tour in the Genre of Economic Game</span
                  >
                </div>
                <div class="schedule__desc-col">
                  <p class="schedule__desc-text">
                    Rescue a girl from Beyond the Frame world, uncover the
                    secrets of the Golden Age, and fall in love with art –
                    together as a family! Rescue a girl from Beyond the Frame
                    world, uncover the secrets of the Golden Age, and fall in
                    love with art – together as a family!
                  </p>
                  <div class="schedule__price-wrapper">
                    <span class="schedule__badge schedule__badge--sold"
                      >sold out</span
                    >
                  </div>
                </div>

                <div class="schedule__photo-wrap">
                  <img
                    class="schedule__photo"
                    src="./assets/images/gallery/gallery-3.webp"
                    alt="Monopoly: The Golden Age of Amsterdam"
                    loading="lazy"
                  />
                </div>
              </div>
            </article>

            <article class="schedule__event-wrapper" role="listitem">
              <div class="schedule__event schedule__event--orange">
                <div class="schedule__date-wrapper">
                  <div class="schedule__date">
                    <span class="schedule__date-num">19</span>
                    <span class="schedule__date-day">Thursday</span>
                  </div>
                  <div class="schedule__time">20:00 - 22:00</div>
                </div>
                <div class="schedule__title-col">
                  <a href="event-page.html" class="schedule__quest-title"
                    >"Monopoly: The Golden Age of Amsterdam"</a
                  >
                  <span class="schedule__quest-subtitle"
                    >Family Quest-Tour in the Genre of Economic Game</span
                  >
                </div>
                <div class="schedule__desc-col">
                  <p class="schedule__desc-text">
                    Rescue a girl from Beyond the Frame world, uncover the
                    secrets of the Golden Age, and fall in love with art –
                    together as a family! Rescue a girl from Beyond the Frame
                    world, uncover the secrets of the Golden Age, and...
                  </p>
                  <div class="schedule__price-wrapper">
                    <span class="schedule__badge schedule__badge--few"
                      >few spots left</span
                    >
                    <div class="schedule__price-row">
                      <span class="schedule__price">30 €</span>
                      <a href="#" class="btn schedule__buy-btn">Buy ticket</a>
                    </div>
                  </div>
                </div>
                <div class="schedule__photo-wrap">
                  <img
                    class="schedule__photo"
                    src="./assets/images/gallery/gallery-4.webp"
                    alt="Monopoly: The Golden Age of Amsterdam"
                    loading="lazy"
                  />
                </div>
              </div>
            </article>

            <article class="schedule__event-wrapper" role="listitem">
              <div class="schedule__event">
                <div class="schedule__date-wrapper">
                  <div class="schedule__date">
                    <span class="schedule__date-num">22</span>
                    <span class="schedule__date-day">Saturday</span>
                  </div>
                  <div class="schedule__time">13:00 - 15:30</div>
                </div>
                <div class="schedule__title-col">
                  <a href="event-page.html" class="schedule__quest-title"
                    >"Monopoly: The Golden Age of Amsterdam"</a
                  >
                  <span class="schedule__quest-subtitle"
                    >Family Quest-Tour in the Genre of Economic Game</span
                  >
                </div>
                <div class="schedule__desc-col">
                  <p class="schedule__desc-text">
                    Rescue a girl from Beyond the Frame world, uncover the
                    secrets of the Golden Age, and fall in love with art –
                    together as a family! Rescue a girl from Beyond the Frame
                    world, uncover the secrets of the Golden Age, and...
                  </p>
                  <div class="schedule__price-wrapper">
                    <span class="schedule__badge schedule__badge--few"
                      >few spots left</span
                    >
                    <div class="schedule__price-row">
                      <span class="schedule__price">30 €</span>
                      <a href="#" class="btn schedule__buy-btn">Buy ticket</a>
                    </div>
                  </div>
                </div>
                <div class="schedule__photo-wrap">
                  <img
                    class="schedule__photo"
                    src="./assets/images/gallery/gallery-5.webp"
                    alt="Monopoly: The Golden Age of Amsterdam"
                    loading="lazy"
                  />
                </div>
              </div>
            </article>

            <article class="schedule__event-wrapper" role="listitem">
              <div class="schedule__event schedule__event--orange">
                <div class="schedule__date-wrapper">
                  <div class="schedule__date">
                    <span class="schedule__date-num">27</span>
                    <span class="schedule__date-day">Friday</span>
                  </div>
                  <div class="schedule__time">20:00 – 21:30</div>
                </div>
                <div class="schedule__title-col">
                  <a href="event-page.html" class="schedule__quest-title"
                    >"Monopoly: The Golden Age of Amsterdam"</a
                  >
                  <span class="schedule__quest-subtitle"
                    >Family Quest-Tour in the Genre of Economic Game</span
                  >
                </div>
                <div class="schedule__desc-col">
                  <p class="schedule__desc-text">
                    Rescue a girl from Beyond the Frame world, uncover the
                    secrets of the Golden Age, and fall in love with art –
                    together as a family! Rescue a girl from Beyond the Frame
                    world, uncover the secrets of the Golden Age, and fall in
                    love with art – together as a family!
                  </p>
                  <div class="schedule__price-wrapper">
                    <span class="schedule__badge schedule__badge--sold"
                      >sold out</span
                    >
                  </div>
                </div>
                <div class="schedule__photo-wrap">
                  <img
                    class="schedule__photo"
                    src="./assets/images/gallery/gallery-6.webp"
                    alt="Monopoly: The Golden Age of Amsterdam"
                    loading="lazy"
                  />
                </div>
              </div>
            </article>
          </div>
        </div>
      </section>
    </main>

    <?php get_footer(); ?>
  </body>
</html>