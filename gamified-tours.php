<?php 
/*
Template Name: Gamified Tours
*/

get_header(); ?>

  <main>
    <!-- Секция Hero -->
    <section class="hero hero-gt section-special section-decorated-dark" id="hero">
      <div class="hero-gt--img"></div>
      <div class="hero-gt__wrapper container">
        <!-- Хлебные крошки — автоматические -->
        <?php questime_breadcrumbs(); ?>
        <div class="hero-gt__content text-align">
          <h1 class="hero-gt__title">What if
            <span class="hero-gt__accent">HISTORY</span> and
            <span class="hero-gt__accent">CULTURE</span> were as
            <span class="hero-gt__accent">THRILLING</span> as Netflix — <br>and as immersive as a video <br> game?
          </h1>
          <p class="hero-gt__subtitle">for families, teens &amp; adults</p>
          <div class="hero-gt__actions">
            <a class="btn btn-secondary btn--orange hero-gt__btn" href="<a href="<?php echo home_url('/schedule/'); ?>">Small group schedule</a>
            <a class="btn btn-secondary btn--transparent hero-gt__btn" href="#contact">Order private tour</a>
          </div>
        </div>
        <a class="hero-gt__reviews reviews-badge" href="#reviews">
          <span class="reviews-badge__label">Google Reviews</span>
          <span class="reviews-badge__stars" aria-label="4.9 out of 5 stars">
            ★★★★★
          </span>
          <span class="reviews-badge__score">4.9 (500+)</span>
        </a>
      </div>
    </section>
    <!-- Секция Experience -->
    <section class="experience section-special" id="experience">
        <div class="container">

          <div class="experience__row">
            <div class="experience__col--text">
              <p class="experience__p"><span class="text-orange">This is not a standard guided tour</span> where someone points at a building and lists dates you'll forget five minutes later. And it's not just a game with random puzzles.</p>
              <p class="experience__p"><span class="text-orange">This is a story you step into.</span></p>
              <p class="experience__p">Every experience is built around an original storyline — whether you're solving a mystery, uncovering hidden secrets, or chasing clues through the city.</p>
            </div>
            <div class="experience__col--img">
              <div class="experience__img-wrapper">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team-building/expirience-TB-1.webp" alt="Gamified tour experience" class="experience__img" loading="lazy" decoding="async">
              </div>
            </div>
          </div>

          <div class="experience__row experience__row--img-first">
            <div class="experience__col--img">
              <div class="experience__img-wrapper">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team-building/expirience-TB-2.webp" alt="Tour participants" class="experience__img" loading="lazy" decoding="async">
              </div>
            </div>
            <div class="experience__col--gains">
              <h3 class="experience__gains-title">What We Stand For:</h3>
              <ul class="experience__list">
                <li class="experience__item">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/tick.svg" alt="" class="experience__tick" loading="lazy" decoding="async">
                  Historically accurate and carefully researched
                </li>
                <li class="experience__item">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/tick.svg" alt="" class="experience__tick" loading="lazy" decoding="async">
                  Stories shaped by the principles of great cinema
                </li>
                <li class="experience__item">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/tick.svg" alt="" class="experience__tick" loading="lazy" decoding="async">
                  Gamified experiences that keep both kids and adults fully engaged
                </li>
              </ul>
            </div>
          </div>

          <div class="experience__row">
            <div class="experience__col--text">
              <p class="experience__p"><span class="text-orange">You don't just observe.</span></p>
              <p class="experience__p">You <span class="text-orange">think, decide, solve, and explore.</span></p>
              <p class="experience__p"><span class="text-orange">The city</span> won't just be something you saw.</p>
              <p class="experience__p">It will become part of your <span class="text-orange">inner map.</span></p>
            </div>
            <div class="experience__col--img">
              <div class="experience__img-wrapper">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team-building/expirience-TB-3.webp" alt="Gamified tour group" class="experience__img" loading="lazy" decoding="async">
              </div>
            </div>
          </div>
        </div>
      </section>
    <!-- Секция CTA_GUIDE как CTA -->
    <section class="cta cta-guide section-special decorated-dark-stats decorated-light-stats" id="cta-guide">
      <div class="cta-guide__wrapper container">
        <div class="cta-guide__content">
          <h2 class="cta-guide__text">
            We've created <span class="text-orange--guide">a free Family Guide</span> to Amsterdam —
            so there are <span class="text-orange--guide">no "I'm bored"</span> moments on your trip.
          </h2>
          <a class="btn btn-secondary btn--orange cta-guide__btn" href="<?php echo get_template_directory_uri(); ?>/assets/presentation.pdf" target="_blank">Download the Guide</a>
        </div>
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gamifiedTours/guide.webp" alt="Free Family Guide to Amsterdam" class="cta-guide__img" loading="lazy" decoding="async">
      </div>
    </section>
    <!-- Секция Quests -->
    <section class="quests section-special" id="quests">
      <div class="container">
        <h2 class="text-align">Choose Your Adventure</h2>
        <div class="quests__slider-wrap">
          <div class="swiper quests__slider">
            <div class="swiper-wrapper">

              <?php
              // Получаем товары из категории Gamified Tours
              $quests = new WP_Query([
                  'post_type'      => 'product',
                  'posts_per_page' => -1,
                  'post_status'    => 'publish',
                  'tax_query'      => [[
                      'taxonomy' => 'product_cat',
                      'field'    => 'slug',
                      'terms'    => 'gamified-tours',
                  ]],
                  'orderby' => 'menu_order',
                  'order'   => 'ASC',
              ]);

              if ($quests->have_posts()) :
                while ($quests->have_posts()) :
                  $quests->the_post();

                  // Данные товара
                  $product        = wc_get_product(get_the_ID());
                  $title          = get_the_title();
                  $description    = get_the_excerpt() ?: wp_trim_words(get_the_content(), 30);
                  $url            = get_permalink();
                  $thumbnail_url  = get_the_post_thumbnail_url(get_the_ID(), 'large') ?: get_template_directory_uri() . '/assets/images/quests/quests-1.webp';

                  // ACF поля
                  $btn1_text    = get_field('quest_btn_schedule_text') ?: 'View Schedule';
                  $btn2_text    = get_field('quest_btn_private_text')  ?: 'Book a Private Tour';
                  $whatsapp_url = get_field('quest_btn_whatsapp_url') ?: 'https://wa.me/31635640923';
                  
                  // Теги из атрибутов WooCommerce
                  $tags = [];
                  $attributes = $product->get_attributes();

                  // Сортировка по position
                  uasort($attributes, function($a, $b) {
                      return $a->get_position() <=> $b->get_position();
                  });

                  foreach ($attributes as $attribute) {
                      if (!$attribute->is_taxonomy()) {
                          $tags[] = $attribute->get_name();
                      }
                  }
                ?>
                <article class="quest-card swiper-slide">
                  <div class="quest-card__top">
                    <div class="quest-card__image-wrap">
                      <div class="quest-card__image">
                        <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($title); ?>" loading="lazy" />
                        <span class="quest-card__image-corner"></span>
                      </div>
                    </div>
                    <div class="quest-card__top-text">
                      <?php if (!empty($tags)) : ?>
                      <div class="quest-card__tags">
                        <?php foreach ($tags as $tag) : ?>
                        <span class="quest-card__tag"><?php echo esc_html($tag); ?></span>
                        <?php endforeach; ?>
                      </div>
                      <?php endif; ?>
                      <h4 class="quest-card__title"><?php echo esc_html($title); ?></h4>
                    </div>
                  </div>

                  <p class="quest-card__desc"><?php echo wp_kses_post($description); ?></p>

                  <div class="quest-card__actions">
                    <!-- Кнопка 1 — ведёт на страницу товара (event-page) -->
                    <a href="<?php echo esc_url(home_url('/schedule/')); ?>" class="btn btn-card quest-card__btn-contact btn--orange">
                      <?php echo esc_html($btn1_text); ?>
                    </a>
                    <!-- Кнопка 2 — ссылка из ACF -->
                    <a href="<?php echo esc_url($whatsapp_url); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-card quest-card__btn-learn">
                      <?php echo esc_html($btn2_text); ?>
                    </a>
                  </div>
                </article>

                <?php
                endwhile;
                wp_reset_postdata();
              else : ?>
                <p class="quests__empty">Квесты скоро появятся!</p>
              <?php endif; ?>

            </div>
          </div>
          <div class="quests__nav">
            <button class="quests__nav-btn quests__btn-prev" aria-label="previous"></button>
            <div class="quests__pagination"></div>
            <button class="quests__nav-btn quests__btn-next" aria-label="next"></button>
          </div>
        </div>
      </div>
    </section>
    <!-- Секция Gallery -->
    <?php get_template_part('templates/gallery'); ?>
    <!-- Секция Testimonials -->
    <section class="testimonials section-special section-decorated-light section-decorated-dark space-between-cg" id="testimonials">
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
      <!-- Секция CTA -->
      <section class="cta section-special cta--gamified decorated-dark-cta decorated-light-cta" id="cta" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/main/cta.webp');">
        <div class="cta__overlay"></div>
        <div class="container">
          <div class="cta__inner">
            <h2 class="cta__title">
              <span class="cta__line">
              <span class="cta__title-orange">Say goodbye</span> 
              <span class="cta__title-white">to boring sightseeing.</span>
            </span>
            <span class="cta__line">
              <span class="cta__title-orange">Connect</span>
              <span class="cta__title-white">with the city.</span>
            </span>
            <span class="cta__line">
              <span class="cta__title-orange">Connect</span>
              <span class="cta__title-white">with </span>
              <span class="cta__title-orange">each other!</span>
            </span>
          </h2>
        </div>
      </div>
    </section>
    <!-- Секция Benefits -->
    <?php get_template_part('templates/benefits'); ?>
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
    <!-- Секция FAQ -->
    <section class="faq section-special" id="faq">
      <div class="container">
        <h2 class="faq__title text-align">FAQ</h2>
        <div class="faq__list">
          <div class="faq__dot"></div>
          <div class="faq__item is-open">
            <button class="faq__question" aria-expanded="true">
              <img class="faq__icon" src="<?php echo get_template_directory_uri(); ?>/assets/icons/team-building/question.svg" alt="question" loading="lazy"
                decoding="async">
              <span class="faq__question-text">Do I need to prepare anything beforehand?</span>
              <span class="faq__chevron">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M31.6663 15L19.9997 25L8.33301 15" stroke="#191A18" stroke-width="2.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                </svg>
              </span>
            </button>
            <div class="faq__answer">
              <p class="faq__answer-inner">Most of our games need just a little prep — usually printing and cutting out
                puzzle materials. Sometimes we suggest basic props — like a ball of yarn or a flashlight — but nothing
                hard to find. You'll always see the full list of what's needed in the "Description" tab under the
                product photos. And some games require no prep at all. For example, The House of Whispering Bandages</p>
            </div>
          </div>
          <div class="faq__item">
            <button class="faq__question" aria-expanded="false">
              <img class="faq__icon" src="<?php echo get_template_directory_uri(); ?>/assets/icons/team-building/question.svg" alt="question" loading="lazy"
                decoding="async">
              <span class="faq__question-text">What if I don't understand something — during setup or while solving a
                puzzle?</span>
              <span class="faq__chevron">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M31.6663 15L19.9997 25L8.33301 15" stroke="#191A18" stroke-width="2.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                </svg>
              </span>
            </button>
            <div class="faq__answer">
              <p class="faq__answer-inner">We're always here to help. You can reach us via email or the chat on our
                website. Most questions get answered within a few hours.</p>
            </div>
          </div>
          <div class="faq__item">
            <button class="faq__question" aria-expanded="false">
              <img class="faq__icon" src="<?php echo get_template_directory_uri(); ?>/assets/icons/team-building/question.svg" alt="question" loading="lazy"
                decoding="async">
              <span class="faq__question-text">How will I receive the home mystery after purchase?</span>
              <span class="faq__chevron">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M31.6663 15L19.9997 25L8.33301 15" stroke="#191A18" stroke-width="2.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                </svg>
              </span>
            </button>
            <div class="faq__answer">
              <p class="faq__answer-inner">After purchase you'll receive a download link to your email. All materials
                are in PDF format, ready to print at home or at any print shop.</p>
            </div>
          </div>
          <div class="faq__item">
            <button class="faq__question" aria-expanded="false">
              <img class="faq__icon" src="<?php echo get_template_directory_uri(); ?>/assets/icons/team-building/question.svg" alt="question" loading="lazy"
                decoding="async">
              <span class="faq__question-text">What if I don't understand something — during setup or while solving a
                puzzle?</span>
              <span class="faq__chevron">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M31.6663 15L19.9997 25L8.33301 15" stroke="#191A18" stroke-width="2.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                </svg>
              </span>
            </button>
            <div class="faq__answer">
              <p class="faq__answer-inner">Our support team is available 7 days a week. Just write to us and we'll guide
                you through any tricky part of the game setup or puzzle solving.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php get_footer(); ?>