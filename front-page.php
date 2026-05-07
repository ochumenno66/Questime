<?php
get_header();
?>
  <main>
    <!-- Секция Hero -->
    <section class="hero section-special section-decorated-dark" id="hero">
      <div class="hero__wrapper container">
        <div class="hero-left">
          <div class="hero-top__wrapper">
            <h1 class="hero-title">
              <span>Welcome </span>
              <span>to&nbsp;Questime</span>
            </h1>
            <div class="hero-tagline">
              <span class="tagline-crack">Crack</span>
              <span class="tagline-rest">The Case</span>
            </div>
          </div>
          <div class="hero-grid">
            <a target="_blank" class="hero-card" href="gamified-tours.html">
              <span><strong>City</strong> Games</span>
              <svg class="hero-card-arrow" width="18" height="17" viewBox="0 0 18 17" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M0 7.5H15.3125L8.75 0.9375L9.575 0L17.7 8.125L9.575 16.25L8.75 15.3125L15.3125 8.75H0V7.5Z"
                  fill="currentColor" />
              </svg>
            </a>
            <a target="_blank" class="hero-card" href="team-building.html">
              <span><strong>Corporate</strong> Events</span>
              <svg class="hero-card-arrow" width="18" height="17" viewBox="0 0 18 17" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M0 7.5H15.3125L8.75 0.9375L9.575 0L17.7 8.125L9.575 16.25L8.75 15.3125L15.3125 8.75H0V7.5Z"
                  fill="currentColor" />
              </svg>
            </a>
            <a target="_blank" class="hero-card" href="custom-games.html">
              <span><strong>Custom</strong> Games</span>
              <svg class="hero-card-arrow" width="18" height="17" viewBox="0 0 18 17" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M0 7.5H15.3125L8.75 0.9375L9.575 0L17.7 8.125L9.575 16.25L8.75 15.3125L15.3125 8.75H0V7.5Z"
                  fill="currentColor" />
              </svg>
            </a>
            <a target="_blank" class="hero-card" href="https://questime.shop/">
              <span><strong>Home</strong> Mysteries</span>
              <svg class="hero-card-arrow" width="18" height="17" viewBox="0 0 18 17" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M0 7.5H15.3125L8.75 0.9375L9.575 0L17.7 8.125L9.575 16.25L8.75 15.3125L15.3125 8.75H0V7.5Z"
                  fill="currentColor" />
              </svg>
            </a>
          </div>
        </div>

        <div class="hero-right">
          <div class="hero-slider__wrapper">
            <div class="hero-slide s1 active"></div>
            <div class="hero-slide s2"></div>
            <div class="hero-slide s3"></div>
            <div class="hero-slide s4"></div>
          </div>

          <div class="hero-slider-dots" id="dots">
            <div class="hero-dot active" data-i="0"></div>
            <div class="hero-dot" data-i="1"></div>
            <div class="hero-dot" data-i="2"></div>
            <div class="hero-dot" data-i="3"></div>
          </div>
        </div>
      </div>

    </section>
    <!-- Секция Quests -->
    <section class="quests section-special" id="quests">
      <div class="container">
        <h2 class="text-align">Explore our unique quests</h2>
        <div class="quests__slider-wrap">
          <div class="swiper quests__slider">
            <div class="swiper-wrapper">
              <article class="quest-card swiper-slide">
                <div class="quest-card__top">
                  <div class="quest-card__image-wrap">
                    <div class="quest-card__image">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/quests/quests-1.webp" alt="The Black Cat Cabaret" loading="lazy" />
                      <span class="quest-card__image-corner"></span>
                    </div>
                  </div>
                  <div class="quest-card__top-text">
                    <div class="quest-card__tags">
                      <span class="quest-card__tag">online</span>
                      <span class="quest-card__tag">small groups</span>
                      <span class="quest-card__tag">6-100 people</span>
                      <span class="quest-card__tag">1.5-2 hours</span>
                    </div>
                    <h4 class="quest-card__title">The Black Cat Cabaret</h4>
                  </div>
                </div>
                <p class="quest-card__desc">Paris. Montmartre. 1893. Poets, artists, dancers, anarchists, gendarmes, the
                  Prince of Wales, and other madmen at the Chat Noir cabaret.
                  Do you want to fulfill or uncover a secret conspiracy?</p>
                <div class="quest-card__actions">
                  <a href="#" class="btn btn-card quest-card__btn-contact btn--orange">Contact us</a>
                  <a href="#" class="btn btn-card quest-card__btn-learn">Learn more</a>
                </div>
              </article>
              <article class="quest-card swiper-slide">
                <div class="quest-card__top">
                  <div class="quest-card__image-wrap">
                    <div class="quest-card__image">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/quests/quests-2.webp" alt="The Great Silent Era" loading="lazy" />
                      <span class="quest-card__image-corner"></span>
                    </div>
                  </div>
                  <div class="quest-card__top-text">
                    <div class="quest-card__tags">
                      <span class="quest-card__tag">murder mystery</span>
                      <span class="quest-card__tag">small groups</span>
                      <span class="quest-card__tag">6-100 people</span>
                      <span class="quest-card__tag">1.5-2 hours</span>
                    </div>
                    <h4 class="quest-card__title">The Great Silent Era</h4>
                  </div>
                </div>
                <p class="quest-card__desc">A Great Gatsby-themed corporate event! A mix of immersive theater, quests,
                  and
                  the popular American Murder Mystery awaits.
                  We'll find ourselves at a 1920s Hollywood film studio and become part of a gripping detective story.
                </p>
                <div class="quest-card__actions">
                  <a href="#" class="btn btn-card quest-card__btn-contact btn--orange">Contact us</a>
                  <a href="#" class="btn btn-card quest-card__btn-learn">Learn more</a>
                </div>
              </article>
              <article class="quest-card swiper-slide">
                <div class="quest-card__top">
                  <div class="quest-card__image-wrap">
                    <div class="quest-card__image">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/quests/quests-3.webp" alt="Doublbottom house" loading="lazy" />
                      <span class="quest-card__image-corner"></span>
                    </div>
                  </div>
                  <div class="quest-card__top-text">
                    <div class="quest-card__tags">
                      <span class="quest-card__tag">team building</span>
                      <span class="quest-card__tag">small groups</span>
                      <span class="quest-card__tag">6-100 people</span>
                      <span class="quest-card__tag">1.5-2 hours</span>
                    </div>
                    <h4 class="quest-card__title">Doublbottom house</h4>
                  </div>
                </div>
                <p class="quest-card__desc">A Victorian quest that incorporates the best detective stories of Edgar
                  Allan
                  Poe, Arthur Conan Doyle, and Agatha Christie.
                  Riddles hidden not only by people but also by walls. Mysticism and emotion... Game and murder...
                  Observation and logic... Humor and fear.</p>
                <div class="quest-card__actions">
                  <a href="#" class="btn btn-card quest-card__btn-contact btn--orange">Contact us</a>
                  <a href="#" class="btn btn-card quest-card__btn-learn">Learn more</a>
                </div>
              </article>

              <article class="quest-card swiper-slide">
                <div class="quest-card__top">
                  <div class="quest-card__image-wrap">
                    <div class="quest-card__image">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/quests/quests-1.webp" alt="The Black Cat Cabaret" loading="lazy" />
                      <span class="quest-card__image-corner"></span>
                    </div>
                  </div>
                  <div class="quest-card__top-text">
                    <div class="quest-card__tags">
                      <span class="quest-card__tag">online</span>
                      <span class="quest-card__tag">small groups</span>
                      <span class="quest-card__tag">6-100 people</span>
                      <span class="quest-card__tag">1.5-2 hours</span>
                    </div>
                    <h4 class="quest-card__title">The Black Cat Cabaret</h4>
                  </div>
                </div>
                <p class="quest-card__desc">Paris. Montmartre. 1893. Poets, artists, dancers, anarchists, gendarmes, the
                  Prince of Wales, and other madmen at the Chat Noir cabaret.
                  Do you want to fulfill or uncover a secret conspiracy?</p>
                <div class="quest-card__actions">
                  <a href="#" class="btn btn-card quest-card__btn-contact btn--orange">Contact us</a>
                  <a href="#" class="btn btn-card quest-card__btn-learn">Learn more</a>
                </div>
              </article>
              <article class="quest-card swiper-slide">
                <div class="quest-card__top">
                  <div class="quest-card__image-wrap">
                    <div class="quest-card__image">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/quests/quests-2.webp" alt="The Great Silent Era" loading="lazy" />
                      <span class="quest-card__image-corner"></span>
                    </div>
                  </div>
                  <div class="quest-card__top-text">
                    <div class="quest-card__tags">
                      <span class="quest-card__tag">murder mystery</span>
                      <span class="quest-card__tag">small groups</span>
                      <span class="quest-card__tag">6-100 people</span>
                      <span class="quest-card__tag">1.5-2 hours</span>
                    </div>
                    <h4 class="quest-card__title">The Great Silent Era</h4>
                  </div>
                </div>
                <p class="quest-card__desc">A Great Gatsby-themed corporate event! A mix of immersive theater, quests,
                  and
                  the popular American Murder Mystery awaits.
                  We'll find ourselves at a 1920s Hollywood film studio and become part of a gripping detective story.
                </p>
                <div class="quest-card__actions">
                  <a href="#" class="btn btn-card quest-card__btn-contact btn--orange">Contact us</a>
                  <a href="#" class="btn btn-card quest-card__btn-learn btn--transparent">Learn more</a>
                </div>
              </article>
              <article class="quest-card swiper-slide">
                <div class="quest-card__top">
                  <div class="quest-card__image-wrap">
                    <div class="quest-card__image">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/quests/quests-3.webp" alt="Doublbottom house" loading="lazy" />
                      <span class="quest-card__image-corner"></span>
                    </div>
                  </div>
                  <div class="quest-card__top-text">
                    <div class="quest-card__tags">
                      <span class="quest-card__tag">team building</span>
                      <span class="quest-card__tag">small groups</span>
                      <span class="quest-card__tag">6-100 people</span>
                      <span class="quest-card__tag">1.5-2 hours</span>
                    </div>
                    <h4 class="quest-card__title">Doublbottom house</h4>
                  </div>
                </div>
                <p class="quest-card__desc">A Victorian quest that incorporates the best detective stories of Edgar
                  Allan
                  Poe, Arthur Conan Doyle, and Agatha Christie.
                  Riddles hidden not only by people but also by walls. Mysticism and emotion... Game and murder...
                  Observation and logic... Humor and fear.</p>
                <div class="quest-card__actions">
                  <a href="#" class="btn btn-card quest-card__btn-contact btn--orange">Contact us</a>
                  <a href="#" class="btn btn-card quest-card__btn-learn btn--transparent">Learn more</a>
                </div>
              </article>
            </div>
          </div>
          <div class="quests__nav">
            <button class="quests__nav-btn quests__btn-prev" aria-label="previous">
            </button>
            <div class="quests__pagination"></div>
            <button class="quests__nav-btn quests__btn-next" aria-label="next">
            </button>
          </div>
        </div>
      </div>
    </section>
    <!-- Секция Services -->
    <section class="services section-special section-decorated-light section-decorated-dark" id="services">
      <div class="services__bg">
        <picture class="services__bg-img">
          <source media="(max-width: 575px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/main/services-mobile.webp">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/main/services.webp" alt="Natalia and Mark" loading="lazy" decoding="async">
        </picture>
      </div>
      <div class="container">
        <div class="services__inner">
          <h2 class="services__heading">What we can offer</h2>
          <div class="services__list">
            <div class="services__item">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/tick.svg" alt="tick" class="services__check" loading="lazy" decoding="async">
              City Games &amp; Quests
            </div>
            <div class="services__item">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/tick.svg" alt="tick" class="services__check" loading="lazy" decoding="async">
              Immersive Theme Performances
            </div>
            <div class="services__item">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/tick.svg" alt="tick" class="services__check" loading="lazy" decoding="async">
              Teambuilding Activities
            </div>
            <div class="services__item">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/tick.svg" alt="tick" class="services__check" loading="lazy" decoding="async">
              Event Gamification
            </div>
            <div class="services__item">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/tick.svg" alt="tick" class="services__check" loading="lazy" decoding="async">
              Online Quests &amp; Quizzies
            </div>
            <div class="services__item">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/tick.svg" alt="tick" class="services__check" loading="lazy" decoding="async">
              Family Days
            </div>
            <div class="services__item">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/tick.svg" alt="tick" class="services__check" loading="lazy" decoding="async">
              Edutainment
            </div>
          </div>
          <a href="#" class="btn btn-secondary services__btn btn--orange">Contact us</a>
        </div>
      </div>
    </section>
    <!-- Секция About -->
    <section class="about section-special" id="about">
      <div class="container">
        <h2 class="text-align">Who we are</h2>
        <div class="about__content">
          <div class="about__dot"></div>
          <div class="about__inner">
            <div class="about__team">
              <div class="about__person">
                <div class="about__person-photo">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/main/Natalia.webp" alt="Natalia Minskaia" loading="lazy" decoding="async" />
                </div>
                <div class="about__person-name">Natalia<br>Minskaia</div>
              </div>
              <div class="about__person">
                <div class="about__person-photo">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/main/Mark.webp" alt="Mark Minskii" loading="lazy" decoding="async" />
                </div>
                <div class="about__person-name">Mark<br>Minskii</div>
              </div>
            </div>
            <ul class="about__facts">
              <li class="about__fact">We have been in quests and games for 12 years</li>
              <li class="about__fact">Natalia has a degree of the Gerasimov Cinema University and has completed
                training
                with the California Institute of the Arts as well as 8 writing courses</li>
              <li class="about__fact">Authors of 135 quests and game scenarios</li>
              <li class="about__fact">Over 400,000 people worldwide have participated in our quests</li>
              <li class="about__fact">Got Visa 0 in the US and conducted quests &amp; games in Boston &amp; NYC</li>
              <li class="about__fact">Founders of TravelTech start-up called WhatIfTour. It's an end-to-end</li>
            </ul>
          </div>
          <a href="#" class="btn btn-secondary about__btn">Know more about us</a>
        </div>
      </div>
    </section>
    <!-- Секция Stats -->
    <section class="stats section-special decorated-dark-stats decorated-light-stats" id="stats">
      <div class="stats__wrapper container">
        <div class="stat__wrapper">
          <span class="stat-number">7</span>
          <span class="stat-text">stories</span>
        </div>
        <div class="stat__wrapper">
          <span class="stat-number">400 000</span>
          <span class="stat-text">people have played our games</span>
        </div>
        <div class="stat__wrapper">
          <span class="stat-number">13</span>
          <span class="stat-text">years of experience</span>
        </div>
      </div>
    </section>
    <!-- Секция Benefits -->
    <section class="benefits text-align section-special" id="benefits">
      <div class="container">
        <h2 class="benefits__title ">Why us?</h2>
        <div class="benefits__wrapper">
          <div class="benefits__card">
            <img class="benefits__icon" src="<?php echo get_template_directory_uri(); ?>/assets/icons/benefits/loupe.svg" alt="Loupe">
            <h3 class="benefits__card-title">Deep Historical Research</h3>
            <p class="benefits__card-text">We dig deeper than guidebooks — every story is carefully researched and
              historically accurate</p>
          </div>
          <div class="benefits__card">
            <img class="benefits__icon" src="<?php echo get_template_directory_uri(); ?>/assets/icons/benefits/lamp.svg" alt="Lamp">
            <h3 class="benefits__card-title">Smart Gamification</h3>
            <p class="benefits__card-text">
              We use elements from board games, RPGs, video games, and escape rooms to create experiences that are
              strategic, immersive, and fun
            </p>
          </div>
          <div class="benefits__card">
            <img class="benefits__icon" src="<?php echo get_template_directory_uri(); ?>/assets/icons/benefits/dart.svg" alt="Dart">
            <h3 class="benefits__card-title">Cinematic Storytelling</h3>
            <p class="benefits__card-text">
              Our experiences are built like films — with tension, characters, and powerful narrative arcs
            </p>
          </div>
        </div>
        <button class="benefits__btn btn btn-secondary btn--orange">
          Learn More About Us
        </button>
      </div>
    </section>
    <!-- Секция CTA -->
    <section class="cta section-special decorated-light-cta decorated-dark-cta" id="cta" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/main/cta.webp');">
      <div class="cta__overlay"></div>
      <div class="container">
        <div class="cta__inner">
          <h2 class="cta__title cta__main-title">
            <span class="cta__title-orange">City turns</span><span class="cta__title-white"> into a </span><span
              class="cta__title-orange">gameboard.</span><br>
            <span class="cta__title-white">Are you ready to play?</span>
          </h2>
          <h3 class="cta__desc">Gamified adventures in the heart of the Netherlands</h3>
          <a class="btn btn-secondary cta__btn btn--transparent">Download Our Presentation</a>
        </div>
      </div>
    </section>
    <!-- Секция Gallery -->
    <?php get_template_part('templates/gallery'); ?>
    <!-- Секция Testimonials -->
    <section class="testimonials section-special section-decorated-light section-decorated-dark" id="testimonials">
      <div class="container">
        <div class="testimonials__header">
          <h2 class="testimonials__title text-align">Stories you don't just hear — you live</h2>
          <h3 class="testimonials__subtitle h3">For <span class="testimonials__accent">over 13 years</span>, we've
            created and led <span class="testimonials__accent">500+ gamified tours</span> around the world.</h3>
        </div>
      </div>

      <div class="testimonials__carousel swiper">
        <div class="testimonials__track swiper-wrapper">
          <div class="testimonials__card testimonials__card--text swiper-slide">
            <div class="testimonials__card-top">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/main/quote.png" alt="quote" class="testimonials__quote-icon">
              <p class="testimonials__quote-text">We turned to the Questayme team to celebrate our birthday, and they
                did a fantastic job – bringing together strangers and giving us a wonderful day!</p>
            </div>
            <div class="testimonials__author">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-us/jan.webp" alt="Alex Frerkel" class="testimonials__avatar">
              <span class="testimonials__name">Alex Frerkel</span>
            </div>
          </div>

          <div class="testimonials__card testimonials__card--photo-vertical swiper-slide">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery/gallery-7.webp" alt="Anna Caplan" class="testimonials__photo">
            <div class="testimonials__author">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-us/maria.webp" alt="Anna Caplan" class="testimonials__avatar">
              <span class="testimonials__name">Anna Caplan</span>
            </div>
          </div>

          <div class="testimonials__card testimonials__card--photo-horizontal swiper-slide">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery/gallery-6.webp" alt="Metro Company" class="testimonials__photo">
            <div class="testimonials__author">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/main/Mark.webp" alt="Metro Company" class="testimonials__avatar">
              <span class="testimonials__name">Metro Company</span>
            </div>
          </div>

          <div class="testimonials__card testimonials__card--text swiper-slide">
            <div class="testimonials__card-top">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/main/quote.png" alt="quote" class="testimonials__quote-icon">
              <p class="testimonials__quote-text">We turned to the Questayme team to celebrate our birthday, and they
                did a fantastic job – bringing together strangers and giving us a wonderful day!</p>
            </div>
            <div class="testimonials__author">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-us/jan.webp" alt="Alex Frerkel" class="testimonials__avatar">
              <span class="testimonials__name">Alex Frerkel</span>
            </div>
          </div>

          <div class="testimonials__card testimonials__card--photo-vertical swiper-slide">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery/gallery-7.webp" alt="Anna Caplan" class="testimonials__photo">
            <div class="testimonials__author">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-us/maria.webp" alt="Anna Caplan" class="testimonials__avatar">
              <span class="testimonials__name">Anna Caplan</span>
            </div>
          </div>

          <div class="testimonials__card testimonials__card--photo-horizontal swiper-slide">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery/gallery-6.webp" alt="Metro Company" class="testimonials__photo">
            <div class="testimonials__author">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/main/Mark.webp" alt="Metro Company" class="testimonials__avatar">
              <span class="testimonials__name">Metro Company</span>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="testimonials__footer">
          <a href="#" class="btn btn-secondary testimonials__btn btn--transparent" target="_blank">Read More Reviews</a>
        </div>
      </div>
    </section>
    <!-- Секция Partners -->
    <section class="partners section-special" id="partners">
      <div class="container">
        <div class="partners__inner">
          <h2 class="text-align partners__title">They have played with us<br>and want more</h2>

          <div class="partners__grid">
            <div class="partners__item"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/partners/dell.svg" alt="Dell"></div>
            <div class="partners__item"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/partners/pfizer.svg" alt="Pfizer"></div>
            <div class="partners__item"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/partners/nestle.svg" alt="Nestle"></div>
            <div class="partners__item"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/partners/reuters.svg" alt="Reuters"></div>
            <div class="partners__item"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/partners/colgate.svg" alt="Colgate"></div>
            <div class="partners__item"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/partners/metro.svg" alt="Metro"></div>
            <div class="partners__item"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/partners/microsoft.svg" alt="Microsoft"></div>
            <div class="partners__item"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/partners/visa.svg" alt="Visa"></div>
            <div class="partners__item"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/partners/BKing.svg" alt="Burger King"></div>
            <div class="partners__item"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/partners/bayer.svg" alt="Bayer"></div>
            <div class="partners__item"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/partners/kaspersky.svg" alt="Kaspersky"></div>
            <div class="partners__item"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/partners/avon.svg" alt="Avon"></div>
            <div class="partners__item"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/partners/britishcouncil.svg" alt="British Council">
            </div>
            <div class="partners__item"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/partners/BATobacco.svg" alt="British American Tobacco">
            </div>
          </div>

          <div class="partners__footer">
            <a href="<?php echo home_url('/team-building/'); ?>" class="btn btn-secondary partners__btn">Go to Corporate Events</a>
          </div>
        </div>
      </div>
    </section>
    <!-- Секция Form -->
    <section class="contact-form section-special" id="contact-form">
      <div class="container">
        <h2 class="contact-form__title">Let's talk!</h2>
        <form class="contact-form__wrapper" action="#" method="post">
          <div class="contact-form__content">
            <div class="contact-form__info">
              <p class="contact-form__text text-bottom">Feel free to ask your question or make a request directly. Nataly or Mark will contact you within one business day.</p>
              <p class="contact-form__text">Prefer to call? Please do!</p>
              <p class="contact-form__text">Our number is <a class="contact-form__phone" href="https://wa.me/31612365246" target="_blank">+31 6 123 65 246</a></p>
            </div>
          </div>
          <div class="contact-form__fields">
            <input class="contact-form__input" type="text" name="name" placeholder="Name" required>
            <input class="contact-form__input" type="tel" name="phone" placeholder="Phone number" required>
            <input class="contact-form__input" type="text" name="company" placeholder="Company" required>
            <input class="contact-form__input" type="email" name="email" placeholder="Email" required>
          </div>
          <textarea class="contact-form__textarea" name="message" placeholder="Text of your request" required></textarea>
          <div class="contact-form__actions">
            <button class="btn btn-secondary contact-form__btn btn--orange" type="submit">Answer me!</button>
            <div class="checkbox">
              <input type="checkbox" id="agree" required>
              <label for="agree">By subscribing, you agree to our <a href="<?php echo home_url('/privacy-policy'); ?>" target="_blank">Privacy Policy</a></label>
            </div>
          </div>
          <div class="contact-form__image-wrapper">
            <img class="contact-form__image" src="<?php echo get_template_directory_uri(); ?>/assets/images/main/contact.jpg" alt="Nataly and Mark">
          </div>
        </form>
      </div>
    </section>
  </main>

<?php get_footer(); ?>

</body>

</html>