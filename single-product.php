<?php
/*
Template Name: Event page
*/

$route_enabled     = get_field('route_enabled');
$route_text_before = get_field('route_text_before') ?: '';
$route_text_after  = get_field('route_text_after')  ?: '';

$route_points = [];
for ($i = 1; $i <= 10; $i++) {
  $label = get_field("route_point_{$i}_label") ?: '';
  $lat   = get_field("route_point_{$i}_lat")   ?: '';
  $lng   = get_field("route_point_{$i}_lng")   ?: '';
  $desc  = get_field("route_point_{$i}_desc")  ?: '';

  if (empty($lat) || empty($lng)) {
    continue;
  }

  $route_points[] = [
    'label' => $label ?: "Point {$i}",
    'lat'   => (float) $lat,
    'lng'   => (float) $lng,
    'desc'  => $desc,
  ];
}

// Передаём данные каты в JS
add_action('wp_footer', function () use ($route_points) {
  if (!empty($route_points)) {
    echo '<script>window.routePointsData = ' . wp_json_encode($route_points) . ';</script>';
  }
}, 1);

get_header(); ?>

<main>
  <!-- Секция Hero -->
  <?php get_template_part('templates/hero-case-product'); ?>
  <!-- Секция Gallery -->
  <?php get_template_part('templates/gallery'); ?>
  <!-- Секция Experience -->
  <?php get_template_part('templates/experience-case-product'); ?>
  <!-- Секция Route -->
  <?php if ($route_enabled && !empty($route_points)) : ?>
    <section class="route section-special" id="route">
      <h2 class="route__title text-align">Route</h2>
      <div class="route__body container">

        <div class="route__points-wrap">
          <?php if ($route_text_before) : ?>
            <p class="route__text route__text--before">
              <?php echo wp_kses_post($route_text_before); ?>
            </p>
          <?php endif; ?>

          <div class="route__points" id="routePointList"></div>

          <?php if ($route_text_after) : ?>
            <p class="route__text route__text--after">
              <?php echo wp_kses_post($route_text_after); ?>
            </p>
          <?php endif; ?>
        </div>

        <div class="route__map">
          <div id="map"></div>
        </div>
      </div>
    </section>
  <?php endif; ?>
  <!-- Секция Persons -->
  <section class="persons section-special" id="persons">
    <div class="container">
      <div class="persons__list">
        <div class="persons__dot"></div>
        <div class="persons__item is-open">
          <button class="persons__question" aria-expanded="true">
            <img class="persons__icon" src="<?php echo get_template_directory_uri(); ?>/assets/icons/event-page/person-orange.svg" alt="person" loading="lazy"
              decoding="async">
            <h4 class="persons__question-text">Persons</h4>
            <span class="persons__chevron">
              <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M31.6663 15L19.9997 25L8.33301 15" stroke="#191A18" stroke-width="2.5" stroke-linecap="round"
                  stroke-linejoin="round" />
              </svg>
            </span>
          </button>
          <div class="persons__answer">
            <p class="persons__intro">
              Each character's gender is indicated. M&nbsp;– male, F&nbsp;– female, M/F&nbsp;– the character can be
              either male or female.
            </p>
            <div class="persons__rows">
              <div class="persons__row">
                <span class="persons__name">Arthur McGregor (m)</span>
                <span class="persons__desc">A spoiled, important man who neglects the parents of a younger man. He is
                  captivated by everything and nothing at once.</span>
              </div>

              <div class="persons__row">
                <span class="persons__name">Elliot/Ellie Home (m/f)</span>
                <span class="persons__desc">A spoiled, important man who neglects the parents of a younger man. He is
                  captivated by everything and nothing at once.</span>
              </div>

              <div class="persons__row">
                <span class="persons__name">Arthur McGregor (m)</span>
                <span class="persons__desc">A spoiled, important man who neglects the parents of a younger man. He is
                  captivated by everything and nothing at once.</span>
              </div>

              <div class="persons__row">
                <span class="persons__name">Arthur McGregor (m)</span>
                <span class="persons__desc">A spoiled, important man who neglects the parents of a younger man. He is
                  captivated by everything and nothing at once.</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Секция Testimonials -->
  <?php get_template_part('templates/testimonials'); ?>
  <!-- Секция Format -->
  <?php get_template_part('templates/format'); ?>
  <!-- Секция Benefits -->
  <?php get_template_part('templates/benefits'); ?>
  <!-- Секция CTA -->
  <?php get_template_part('templates/cta'); ?>
  <!-- Секция Quests -->
  <section class="quests section-special" id="quests">
    <div class="container">
      <h2 class="text-align">You may also like</h2>
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
                <a href="./schedule.html" class="btn btn-card quest-card__btn-contact btn--orange">View Schedule</a>
                <a href="#" class="btn btn-card quest-card__btn-learn">Book a Private Tour</a>
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
                <a href="./schedule.html" class="btn btn-card quest-card__btn-contact btn--orange">View Schedule</a>
                <a href="#" class="btn btn-card quest-card__btn-learn">Book a Private Tour</a>
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
                <a href="./schedule.html" class="btn btn-card quest-card__btn-contact btn--orange">View Schedule</a>
                <a href="#" class="btn btn-card quest-card__btn-learn">Book a Private Tour</a>
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
                <a href="./schedule.html" class="btn btn-card quest-card__btn-contact btn--orange">View Schedule</a>
                <a href="#" class="btn btn-card quest-card__btn-learn">Book a Private Tour</a>
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
                <a href="./schedule.html" class="btn btn-card quest-card__btn-contact btn--orange">View Schedule</a>
                <a href="#" class="btn btn-card quest-card__btn-learn">Book a Private Tour</a>
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
                <a href="./schedule.html" class="btn btn-card quest-card__btn-contact btn--orange">View Schedule</a>
                <a href="#" class="btn btn-card quest-card__btn-learn">Book a Private Tour</a>
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
  <!-- Секция Form -->
  <section class="contact-form section-special" id="contact-form">
    <div class="container">
      <h2 class="contact-form__title">Let's talk!</h2>
      <form class="contact-form__wrapper" action="#" method="post">
        <div class="contact-form__content">
          <div class="contact-form__info">
            <p class="contact-form__text text-bottom">Feel free to ask your question or make a request directly.
              Nataly or Mark will contact you within one business day.</p>
            <p class="contact-form__text">Prefer to call? Please do!</p>
            <p class="contact-form__text">Our number is <a class="contact-form__phone"
                href="https://wa.me/31612365246" target="_blank">+31 6 123 65 246</a></p>
          </div>
        </div>
        <div class="contact-form__fields">
          <input class="contact-form__input" type="text" name="name" placeholder="Name" required>
          <input class="contact-form__input" type="tel" name="phone" placeholder="Phone number" required>
          <input class="contact-form__input" type="text" name="company" placeholder="Company" required>
          <input class="contact-form__input" type="email" name="email" placeholder="Email" required>
        </div>
        <textarea class="contact-form__textarea" name="message" placeholder="Text of your request"
          required></textarea>
        <div class="contact-form__actions">
          <button class="btn btn-secondary contact-form__btn btn--orange" type="submit">Answer me!</button>
          <div class="checkbox">
            <input type="checkbox" id="agree" required>
            <label for="agree">By subscribing, you agree to our <a href="/privacy-policy.html" target="_blank">Privacy
                Policy</a></label>
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