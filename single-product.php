<?php
/*
Template Name: Event page
*/

get_header(); ?>

<main>
  <!-- Секция Hero -->
  <?php $hero_bg = get_field('hero_background'); ?>
  <section class="hero-ep" id="hero"
    <?php if ($hero_bg): ?>
    style="background-image: url('<?php echo esc_url($hero_bg['url']); ?>'); background-size: cover; background-position: center;"
    <?php endif; ?>>
    <div class="container hero-ep__container">
      <!-- Хлебные крошки — автоматические -->
      <?php questime_breadcrumbs(); ?>

      <div class="hero-ep__compass">
        <?php $compass = get_field('hero_compass'); ?>
        <?php if ($compass): ?>
          <img src="<?php echo esc_url($compass['url']); ?>" alt="<?php echo esc_attr($compass['alt']); ?>" />
        <?php else: ?>
          <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/event-page/compass-EP.svg" alt="Compass" />
        <?php endif; ?>
      </div>

      <div class="hero-ep__content">
        <div class="hero-ep__tags">
          <?php if (have_rows('hero_tags')): ?>
            <?php while (have_rows('hero_tags')): the_row(); ?>
              <span class="hero-ep__tag"><?php echo esc_html(get_sub_field('tag_text')); ?></span>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>

        <div class="hero-ep__text">
          <h1 class="hero-ep__title"><?php echo esc_html(get_field('hero_title') ?: get_the_title()); ?></h1>
          <p class="hero-ep__subtitle"><?php echo esc_html(get_field('hero_subtitle')); ?></p>
          <p class="hero-ep__description"><?php echo esc_html(get_field('hero_description')); ?></p>
        </div>
      </div>

      <div class="hero-ep__features">
        <div class="feature-card">
          <div class="feature-card__icon">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/person-black-EP-AU.svg" alt="players" />
          </div>
          <p class="feature-card__value"><?php echo esc_html(get_field('hero_players')); ?></p>
          <p class="feature-card__label">players</p>
        </div>

        <div class="feature-card">
          <div class="feature-card__icon">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/date-EP-AU.svg" alt="duration" />
          </div>
          <p class="feature-card__value"><?php echo esc_html(get_field('hero_duration')); ?></p>
          <p class="feature-card__label">Duration</p>
        </div>

        <div class="feature-card">
          <div class="feature-card__icon">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/event-page/language-black.svg" alt="language" />
          </div>
          <p class="feature-card__value"><?php echo esc_html(get_field('hero_language')); ?></p>
          <p class="feature-card__label">Language</p>
        </div>

        <div class="feature-card">
          <div class="feature-card__icon">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/format-black-EP-AU.svg" alt="format" />
          </div>
          <p class="feature-card__value"><?php echo esc_html(get_field('hero_format')); ?></p>
          <p class="feature-card__label">Format</p>

          <div class="hero-ep__loupe">
            <?php $loupe = get_field('hero_loupe'); ?>
            <?php if ($loupe): ?>
              <img src="<?php echo esc_url($loupe['url']); ?>" alt="<?php echo esc_attr($loupe['alt']); ?>" />
            <?php else: ?>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/event-page/loupe.svg" alt="loupe" />
            <?php endif; ?>
          </div>
        </div>
      </div>

    </div>
  </section>
  <!-- Секция Gallery -->
  <?php get_template_part('templates/gallery'); ?>
  <!-- Секция Experience -->
  <section class="experience section-special" id="experience">
    <div class="container">

      <div class="experience__row">
        <div class="experience__col--text">
          <?php echo wp_kses_post(get_field('experience_text_1')); ?>
        </div>
        <div class="experience__col--img">
          <div class="experience__img-wrapper">
            <?php $exp_img_1 = get_field('experience_img_1'); ?>
            <?php if ($exp_img_1): ?>
              <img src="<?php echo esc_url($exp_img_1['url']); ?>" alt="<?php echo esc_attr($exp_img_1['alt']); ?>" class="experience__img" loading="lazy" decoding="async">
            <?php else: ?>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team-building/expirience-TB-1.webp" alt="Team building experience" class="experience__img" loading="lazy" decoding="async">
            <?php endif; ?>
          </div>
        </div>
      </div>

      <div class="experience__row experience__row--img-first experience-reverse--ep">
        <div class="experience__col--img">
          <div class="experience__img-wrapper">
            <?php $exp_img_2 = get_field('experience_img_2'); ?>
            <?php if ($exp_img_2): ?>
              <img src="<?php echo esc_url($exp_img_2['url']); ?>" alt="<?php echo esc_attr($exp_img_2['alt']); ?>" class="experience__img" loading="lazy" decoding="async">
            <?php else: ?>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team-building/expirience-TB-2.webp" alt="Team building activity" class="experience__img" loading="lazy" decoding="async">
            <?php endif; ?>
          </div>
        </div>
        <div class="experience__col--text">
          <?php echo wp_kses_post(get_field('experience_text_2')); ?>
        </div>
      </div>

      <div class="experience__row">
        <div class="experience__col--gains">
          <h3 class="experience__gains-title"><?php echo esc_html(get_field('experience_gains_title') ?: 'What your team gains:'); ?></h3>
          <ul class="experience__list">
            <?php if (have_rows('experience_gains')): ?>
              <?php while (have_rows('experience_gains')): the_row(); ?>
                <li class="experience__item">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/tick.svg" alt="" class="experience__tick" loading="lazy" decoding="async">
                  <?php echo esc_html(get_sub_field('gain_text')); ?>
                </li>
              <?php endwhile; ?>
            <?php endif; ?>
          </ul>
        </div>
        <div class="experience__col--img">
          <div class="experience__img-wrapper">
            <?php $exp_img_3 = get_field('experience_img_3'); ?>
            <?php if ($exp_img_3): ?>
              <img src="<?php echo esc_url($exp_img_3['url']); ?>" alt="<?php echo esc_attr($exp_img_3['alt']); ?>" class="experience__img" loading="lazy" decoding="async">
            <?php else: ?>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team-building/expirience-TB-3.webp" alt="Team event" class="experience__img" loading="lazy" decoding="async">
            <?php endif; ?>
          </div>
        </div>
      </div>

      <div class="experience__actions">
        <span class="experience__badge"><?php echo esc_html(get_field('experience_badge')); ?></span>
        <div class="experience__btns">
          <a href="<?php echo esc_url(get_field('experience_ticket_url') ?: '#'); ?>" class="btn btn-secondary btn-experience btn--orange">Buy ticket</a>
          <a href="<?php echo esc_url(get_field('experience_whatsapp_url') ?: 'https://wa.me/'); ?>" class="btn btn-secondary experience__book">Book a Private Tour</a>
        </div>
      </div>
    </div>
  </section>
  <!-- Секция Route -->
  <section class="route section-special" id="route">
    <h2 class="route__title text-align">Route</h2>
    <div class="route__body container">
      <div class="route__points" id="routePointList"></div>
      <div class="route__map">
        <div id="map"></div>
      </div>
    </div>
  </section>
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
  <section class="testimonials section-special section-decorated-light section-decorated-dark" id="testimonials">
    <div class="container">
      <div class="testimonials__header">
        <h2 class="testimonials__title text-align"><?php echo esc_html(get_field('testimonials_title') ?: "Stories you don't just hear — you live"); ?></h2>
        <h3 class="testimonials__subtitle h3"><?php echo wp_kses_post(get_field('testimonials_subtitle')); ?></h3>
      </div>
    </div>

    <div class="testimonials__carousel swiper">
      <div class="testimonials__track swiper-wrapper">

        <?php if (have_rows('testimonials_cards')): ?>
          <?php while (have_rows('testimonials_cards')): the_row(); ?>
            <?php $card_type = get_sub_field('card_type'); ?>

            <?php if ($card_type === 'text'): ?>
              <div class="testimonials__card testimonials__card--text swiper-slide">
                <div class="testimonials__card-top">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/main/quote.png" alt="quote" class="testimonials__quote-icon">
                  <p class="testimonials__quote-text"><?php echo esc_html(get_sub_field('quote_text')); ?></p>
                </div>
                <div class="testimonials__author">
                  <?php $avatar = get_sub_field('author_avatar'); ?>
                  <img src="<?php echo esc_url($avatar['url']); ?>" alt="<?php echo esc_attr(get_sub_field('author_name')); ?>" class="testimonials__avatar">
                  <span class="testimonials__name"><?php echo esc_html(get_sub_field('author_name')); ?></span>
                </div>
              </div>

            <?php elseif ($card_type === 'photo-vertical'): ?>
              <div class="testimonials__card testimonials__card--photo-vertical swiper-slide">
                <?php $photo = get_sub_field('card_photo'); ?>
                <img src="<?php echo esc_url($photo['url']); ?>" alt="<?php echo esc_attr(get_sub_field('author_name')); ?>" class="testimonials__photo">
                <div class="testimonials__author">
                  <?php $avatar = get_sub_field('author_avatar'); ?>
                  <img src="<?php echo esc_url($avatar['url']); ?>" alt="<?php echo esc_attr(get_sub_field('author_name')); ?>" class="testimonials__avatar">
                  <span class="testimonials__name"><?php echo esc_html(get_sub_field('author_name')); ?></span>
                </div>
              </div>

            <?php elseif ($card_type === 'photo-horizontal'): ?>
              <div class="testimonials__card testimonials__card--photo-horizontal swiper-slide">
                <?php $photo = get_sub_field('card_photo'); ?>
                <img src="<?php echo esc_url($photo['url']); ?>" alt="<?php echo esc_attr(get_sub_field('author_name')); ?>" class="testimonials__photo">
                <div class="testimonials__author">
                  <?php $avatar = get_sub_field('author_avatar'); ?>
                  <img src="<?php echo esc_url($avatar['url']); ?>" alt="<?php echo esc_attr(get_sub_field('author_name')); ?>" class="testimonials__avatar">
                  <span class="testimonials__name"><?php echo esc_html(get_sub_field('author_name')); ?></span>
                </div>
              </div>
            <?php endif; ?>

          <?php endwhile; ?>
        <?php endif; ?>

      </div>
    </div>

    <div class="container">
      <div class="testimonials__footer">
        <a href="<?php echo esc_url(get_field('testimonials_reviews_url') ?: '#'); ?>" class="btn btn-card testimonials__btn btn--transparent" target="_blank">Read More Reviews</a>
      </div>
    </div>
  </section>
  <!-- Секция Format -->
  <section class="persons format section-special" id="format">
    <div class="container">
      <div class="persons__list">
        <div class="persons__dot"></div>
        <div class="persons__item is-open">
          <button class="persons__question" aria-expanded="true">
            <img class="persons__icon" src="<?php echo get_template_directory_uri(); ?>/assets/icons/event-page/language-orange.svg" alt="cube" loading="lazy"
              decoding="async">
            <h4 class="persons__question-text">Online format — how it works?</h4>
            <span class="persons__chevron">
              <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M31.6663 15L19.9997 25L8.33301 15" stroke="#191A18" stroke-width="2.5" stroke-linecap="round"
                  stroke-linejoin="round" />
              </svg>
            </span>
          </button>
          <div class="persons__answer">
            <div class="format__content">
              <div class="format__steps-col">
                <div class="format__step">
                  <span class="format__step-num">1</span>
                  <p class="format__step-text">All participants watch a short intro video with the backstory and
                    meet the characters: the Director, Actor, Maid, Star, Cameraman and Makeup Artist.</p>
                </div>
                <div class="format__step">
                  <span class="format__step-num">2</span>
                  <p class="format__step-text">Participants are divided into teams and sent to separate breakout
                    rooms.</p>
                </div>
                <div class="format__step">
                  <span class="format__step-num">3</span>
                  <p class="format__step-text">Actors rotate between rooms, playing their scenes and interacting
                    with each team.</p>
                </div>
                <div class="format__step">
                  <span class="format__step-num">4</span>
                  <p class="format__step-text">Teams complete challenges and mini-games with each character. The
                    better the team performs, the more information they unlock.</p>
                </div>
                <div class="format__step">
                  <span class="format__step-num"></span>
                  <p class="format__step-text">We usually run the game on Zoom (but can adapt to other platforms).</p>
                </div>
              </div>
              <div class="format__finale">
                <span class="format__finale-label">The finale</span>
                <div class="format__finale-text">
                  <p>In the final stage, teams must decide who committed the crime.</p>
                  <p>The ending depends entirely on your observation, logic and teamwork.</p>
                  <p>Only your insight will determine how The Great Silent Quest ends.</p>
                </div>
              </div>
            </div>
            <button class="btn btn-secondary format__btn">Request ONLINE</button>
            <div class="format__photo-wrap format__photo-wrap--left">
              <img class="format__photo" src="<?php echo get_template_directory_uri(); ?>/assets/images/event-page/format-1.webp" alt="Online format photo 1"
                loading="lazy" />
            </div>

            <div class="format__photo-wrap format__photo-wrap--right">
              <img class="format__photo" src="<?php echo get_template_directory_uri(); ?>/assets/images/event-page/format-2.webp" alt="Online format photo 2"
                loading="lazy" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="persons section-special">
    <div class="container">
      <div class="persons__list">
        <div class="persons__dot"></div>
        <div class="persons__item is-open">
          <button class="persons__question" aria-expanded="true">
            <img class="persons__icon" src="<?php echo get_template_directory_uri(); ?>/assets/icons/event-page/format-orange.svg" alt="cube" loading="lazy"
              decoding="async">
            <h4 class="persons__question-text demo-text">Demo format — how it works?</h4>
            <span class="persons__chevron">
              <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M31.6663 15L19.9997 25L8.33301 15" stroke="#191A18" stroke-width="2.5" stroke-linecap="round"
                  stroke-linejoin="round" />
              </svg>
            </span>
          </button>
          <div class="persons__answer">
            <p class="persons__intro">
              We also offer a free demo game (15–20 minutes) where you can experience key mechanics and challenges.
              No commitment just leave a request, and we’ll run the demo for your team.
            </p>
            <button class="btn btn-secondary format__btn">Request DEMO</button>
          </div>
        </div>
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
  <?php $cta_bg = get_field('cta_background'); ?>
  <section class="cta cta--event-page section-special decorated-dark-cta decorated-light-cta" id="cta"
    style="background-image: url('<?php echo $cta_bg ? esc_url($cta_bg['url']) : get_template_directory_uri() . '/assets/images/main/cta.webp'; ?>');">
    <div class="cta__overlay"></div>
    <div class="container">
      <div class="cta__inner">
        <h2 class="cta__title">
          <?php echo wp_kses_post(get_field('cta_title')); ?>
        </h2>
        <?php $pdf = get_field('cta_pdf'); ?>
        <?php if ($pdf): ?>
          <a href="<?php echo esc_url($pdf['url']); ?>" class="btn btn-secondary cta__btn btn--transparent" download="<?php echo esc_attr($pdf['title'] ?: 'Questime_Presentation'); ?>">Download PDF</a>
        <?php endif; ?>
      </div>
    </div>
  </section>
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