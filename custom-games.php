<?php 
/*
Template Name: Custom games
*/

get_header();

// Hero — данные из ACF
$cg_title      = get_field('cg_hero_title')     ?: 'Custom Games';
$cg_text_1     = get_field('cg_hero_text_1')    ?: 'If you\'re facing an unusual challenge involving gamification, blending education and entertainment, team buildings and corporate events, or escape games for cities, museums and cultural institutions — you\'re in the right place.';
$cg_text_2     = get_field('cg_hero_text_2')    ?: 'We can create almost any custom project. Just tell us your goal.';
$cg_image      = get_field('cg_hero_image')     ?: get_template_directory_uri() . '/assets/images/custom-games/hero-full.jpg';
$cg_image_alt  = get_field('cg_hero_image_alt') ?: 'People playing a custom game';
$cg_btn1_text  = get_field('cg_hero_btn_1_text') ?: 'Request';
$cg_btn2_text  = get_field('cg_hero_btn_2_text') ?: 'Download the presentation';
$cg_pdf        = get_field('cg_hero_pdf')        ?: '';
$cg_bg = get_field('cg_hero_bg') ?: get_template_directory_uri() . '/assets/images/custom-games/hero-full.jpg';
?>

    <main>
      <!-- Секция Hero -->
      <section class="hero section-special section-decorated-dark custom-games-hero" id="hero">
        <div class="custom-games-hero__bg" style="background:
          linear-gradient(0deg, rgba(25, 26, 24, 0.7), rgba(25, 26, 24, 0.7)),
          linear-gradient(180deg, #191a18 0%, rgba(25, 26, 24, 0) 49.04%, #191a18 100%),
          url('<?php echo esc_url($cg_bg); ?>') center / cover no-repeat;">
        </div>
        <div class="custom-games-hero__wrapper container">
          <!-- Хлебные крошки — автоматические -->
          <?php questime_breadcrumbs(); ?>
          <div class="custom-games-hero__content">
            <h1 class="custom-games-hero__title"><?php echo esc_html($cg_title); ?></h1>

            <div class="custom-games-hero__image-wrap--mobile">
              <img
                src="<?php echo esc_url($cg_image); ?>"
                alt="<?php echo esc_attr($cg_image_alt); ?>"
                class="custom-games-hero__image"
              />
            </div>

            <div class="custom-games-hero__body">
              <?php if ($cg_text_1) : ?>
                <p><?php echo wp_kses_post($cg_text_1); ?></p>
              <?php endif; ?>
              <?php if ($cg_text_2) : ?>
                <p><strong><?php echo wp_kses_post($cg_text_2); ?></strong></p>
              <?php endif; ?>
            </div>

            <div class="custom-games-hero__actions">

              <!-- Кнопка 1 — открывает модалку -->
              <button
                type="button"
                class="btn btn-secondary btn--orange"
                data-modal="request"
              >
                <?php echo esc_html($cg_btn1_text); ?>
              </button>

              <!-- Кнопка 2 — скачивание PDF, только если файл загружен -->
              <?php if ($cg_pdf) : ?>
              <a
                href="<?php echo esc_url($cg_pdf); ?>"
                download
                class="btn btn-secondary btn-download btn--transparent"
              >
                <?php echo esc_html($cg_btn2_text); ?>
              </a>
              <?php endif; ?>

            </div>
          </div>

          <div class="custom-games-hero__image-wrap">
            <img
              src="<?php echo esc_url($cg_image); ?>"
              alt="<?php echo esc_attr($cg_image_alt); ?>"
              class="custom-games-hero__image"
            />
          </div>
        </div>
      </section>
      <!-- Секция Company -->
      <section class="company section-special">
        <div class="container">
          <div class="company__pair company__pair--right-photo">
            <div class="company__scroll company__scroll--team">
              <img class="company__scroll-bg" src="<?php echo get_template_directory_uri(); ?>/assets/images/roll-CG-AU.webp" alt="">
              <div class="company__scroll-label">
                <img class="company__scroll-label-svg label-border-right" src="<?php echo get_template_directory_uri(); ?>/assets/icons/border-team-CG.svg" alt="">
                <span class="company__scroll-label-text label-text-right">Team</span>
              </div>
              <div class="company__scroll-inner">
                <p class="company__text">Our team includes experienced <strong>writers, game designers, illustrators, sound designers, and specialists in chatbots and online games</strong> — everything needed to turn an idea into a complete experience.</p>
              </div>
            </div>
            <div class="company__polaroid company__polaroid--1">
              <img class="company__polaroid-bg" src="<?php echo get_template_directory_uri(); ?>/assets/images/polaroid-1-cg.png" alt="">
              <img class="company__polaroid-img--right" src="<?php echo get_template_directory_uri(); ?>/assets/images/main/hero-2.jpg" alt="The Great Silent Era">
            </div>
          </div>
          <div class="company__pair company__pair--left-photo">
            <div class="company__polaroid company__polaroid--2">
              <img class="company__polaroid-bg" src="<?php echo get_template_directory_uri(); ?>/assets/images/polaroid-2-cg.png" alt="">
              <img class="company__polaroid-img--left" src="<?php echo get_template_directory_uri(); ?>/assets/images/main/hero-4.jpg" alt="Monopoly: The Golden Age of Amsterdam">
            </div>
            <div class="company__scroll company__scroll--experience">
              <img class="company__scroll-bg" src="<?php echo get_template_directory_uri(); ?>/assets/images/roll-CG-AU.webp" alt="">
              <div class="company__scroll-label">
                <img class="company__scroll-label-svg label-border-left" src="<?php echo get_template_directory_uri(); ?>/assets/icons/border-experience-CG.svg" alt="">
                <span class="company__scroll-label-text label-text-left">Experience</span>
              </div>
              <div class="company__scroll-inner">
                <p class="company__text">Since <strong>2013</strong>, we have delivered <strong>150+ custom projects</strong> for clients across a wide range of industries, formats and genres.</p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Секция Gallery -->
      <?php get_template_part('templates/gallery'); ?>
      <!-- Секция Projects -->
      <section class="projects section-special projects-border-1 projects-border-2" id="projects">
        <div class="projects__scene container">

          <div class="projects-card">
            <div class="projects-card__polaroid">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/custom-games/project-card-1.png" alt="" class="projects-card__frame">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/main/hero-2.jpg" alt="" class="projects-card__photo">
              <p class="projects-card__caption">Escape games for cities, museums and cultural events</p>
            </div>
            <div class="projects-card__paper">
              <ul class="projects-card__list">
                <li>Montreal</li>
                <li>Visible at the exhibition</li>
                <li>Rijksmuseum</li>
                <li>Museophily</li>
                <li>Sports Museum</li>
              </ul>
              <button class="projects-card__toggle" aria-expanded="false">
                <span class="projects-card__toggle-text">Expand the list</span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M12 4V16.25L17.25 11L18 11.66L11.5 18.16L5 11.66L5.75 11L11 16.25V4H12Z" fill="#DEC884" />
                </svg>
              </button>
            </div>
          </div>

          <div class="projects-card">
            <div class="projects-card__polaroid">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/custom-games/project-card-2.png" alt="" class="projects-card__frame">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/main/hero-3.jpg" alt="" class="projects-card__photo">
              <p class="projects-card__caption">Team buildings and corporate events</p>
            </div>
            <div class="projects-card__paper">
              <ul class="projects-card__list">
                <li>A visit for a shop</li>
                <li>Chain Reaction for an IT company</li>
                <li>Christmas Express for a transportation company</li>
              </ul>
              <button class="projects-card__toggle" aria-expanded="false">
                <span class="projects-card__toggle-text">Expand the list</span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M12 4V16.25L17.25 11L18 11.66L11.5 18.16L5 11.66L5.75 11L11 16.25V4H12Z" fill="#DEC884" />
                </svg>
              </button>
            </div>
          </div>

          <div class="projects-card">
            <div class="projects-card__polaroid">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/custom-games/project-card-3.png" alt="" class="projects-card__frame">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/main/hero-4.jpg" alt="" class="projects-card__photo">
              <p class="projects-card__caption">Games and escapes for Marketing</p>
            </div>
            <div class="projects-card__paper">
              <ul class="projects-card__list">
                <li>Goals: employee education</li>
                <li>Zombies</li>
                <li>For a run</li>
              </ul>
              <button class="projects-card__toggle" aria-expanded="false">
                <span class="projects-card__toggle-text">Expand the list</span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M12 4V16.25L17.25 11L18 11.66L11.5 18.16L5 11.66L5.75 11L11 16.25V4H12Z" fill="#DEC884" />
                </svg>
              </button>
            </div>
          </div>

          <div class="projects-card">
            <div class="projects-card__polaroid">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/custom-games/project-card-4.png" alt="" class="projects-card__frame">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/main/hero-3.jpg" alt="" class="projects-card__photo">
              <p class="projects-card__caption">Serious games</p>
            </div>
            <div class="projects-card__paper">
              <ul class="projects-card__list">
                <li>Detective Lucas and Boo</li>
                <li>Hardware store about recycling and ecology</li>
              </ul>
              <button class="projects-card__toggle" aria-expanded="false">
                <span class="projects-card__toggle-text">Expand the list</span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M12 4V16.25L17.25 11L18 11.66L11.5 18.16L5 11.66L5.75 11L11 16.25V4H12Z" fill="#DEC884" />
                </svg>
              </button>
            </div>
          </div>
        </div>
        <div class="projects__btn">
          <div class="projects__btn-card">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/border-portfolio-CG.svg" alt="" class="projects__btn-border">
            <div class="projects__btn-content">
              <p class="projects__btn-text">You can download our full portfolio</p>
              <a href="#" class="btn btn-secondary btn-projects btn--orange">Here</a>
            </div>
          </div>
        </div>
      </section>
      <!-- Секция Form -->
      <section class="contact-form contact-form-cg section-special" id="contact-form">
        <div class="container">
          <h2 class="contact-form__title">Let's plan your adventure</h2>
          <form class="contact-form__wrapper-gt" action="#" method="post">
            <div class="contact-form__content-gt">
              <p class="contact-form__text-gt text-bottom-gt">Have a question? Want to organize a private experience or a custom gamified tour? Tell us what you're looking for!<br> Natalia or Mark will personally get back to you within one business day.</p>
              <p class="contact-form__text-gt">Prefer to talk it through?<br> Call us directly at <a class="contact-form__phone" href="https://wa.me/31612365246" target="_blank">+31 6 123 65 246</a> — we'd love to hear your plans.</p>
            </div>
            <div class="contact-form__row">
              <input class="contact-form__input" type="text" name="name" placeholder="Name*" required>
              <input class="contact-form__input" type="email" name="email" placeholder="Email*" required>
            </div>
            <div class="custom-select input-interest" id="interestSelect">
              <div class="custom-select__trigger contact-form__input">
                <span class="custom-select__value">What are you interested in?*</span>
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25.3327 12L15.9993 20L6.66602 12" stroke="#191A18" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </div>
              <ul class="custom-select__dropdown">
                <li class="custom-select__option" data-value="private">Private Tour</li>
                <li class="custom-select__option" data-value="group">Small Group Tour</li>
                <li class="custom-select__option" data-value="self">Self-Guided Experience</li>
                <li class="custom-select__option" data-value="custom">Custom Experience</li>
                <li class="custom-select__option" data-value="none">Not Sure Yet</li>
              </ul>
              <input type="hidden" name="interest" required>
            </div>
            <input class="contact-form__input input-date" type="text" name="Preferred Date" placeholder="Preferred Date" required>
            <textarea class="contact-form__textarea-gt input-textarea" name="message" placeholder="Text of your request" required></textarea>
            <div class="contact-form__actions-gt">
              <button class="btn btn-secondary contact-form__btn-gt btn--orange" type="submit">Answer me!</button>
              <div class="checkbox checkbox-gt">
                <input type="checkbox" id="agree" required>
                <label for="agree">By subscribing, you agree to our <a href="/privacy-policy.html" target="_blank">Privacy Policy</a></label>
              </div>
            </div>
            <div class="contact-form__image-wrapper-gt">
              <img class="contact-form__image-gt" src="<?php echo get_template_directory_uri(); ?>/assets/images/main/contact.jpg" alt="Nataly and Mark">
            </div>
          </form>
        </div>
      </section>
      <!-- Секция Testimonials -->
      <section class="testimonials section-special section-decorated-light section-decorated-dark space-between-cg" id="testimonials">
        <div class="container">
          <div class="testimonials__header">
            <h2 class="testimonials__title text-align">Stories you don't just hear — you live</h2>
            <h3 class="testimonials__subtitle h3">For <span class="testimonials__accent">over 13 years</span>, we've created and led <span class="testimonials__accent">500+ gamified tours</span> around the world.</h3>
          </div>
        </div>

        <div class="testimonials__carousel swiper">
          <div class="testimonials__track swiper-wrapper">

            <div class="testimonials__card testimonials__card--text swiper-slide">
              <div class="testimonials__card-top">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/main/quote.png" alt="quote" class="testimonials__quote-icon">
                <p class="testimonials__quote-text">We turned to the Questayme team to celebrate our birthday, and they did a fantastic job – bringing together strangers and giving us a wonderful day!</p>
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
                <p class="testimonials__quote-text">We turned to the Questayme team to celebrate our birthday, and they did a fantastic job – bringing together strangers and giving us a wonderful day!</p>
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
            <a href="#" class="btn btn-card testimonials__btn btn--transparent" target="_blank">Read More Reviews</a>
          </div>
        </div>
      </section>
    </main>

<?php 
get_footer();
?>
