<?php
/*
Template Name: Team Building
*/

get_header();

$whatsapp = get_theme_mod('whatsapp_url', 'https://wa.me/31635640923');

$tb_hero_bg  = get_field('tb_hero_bg')         ?: get_template_directory_uri() . '/assets/images/team-building/tb-hero.webp';
$tb_tagline  = get_field('tb_hero_tagline')    ?: 'On-site, cafe, outdoor and online';
$tb_accent_1 = get_field('tb_hero_accent_1')   ?: 'UNFORGETTABLE';
$tb_text_1   = get_field('tb_hero_text_1')     ?: 'mysteries';
$tb_accent_2 = get_field('tb_hero_accent_2')   ?: 'YOUR TEAM';
$tb_text_2   = get_field('tb_hero_text_2')     ?: 'solves';
$tb_accent_3 = get_field('tb_hero_accent_3')   ?: 'TOGETHER!';
$tb_subtitle = get_field('tb_hero_subtitle')   ?: 'for groups of 6–120 people';
$tb_btn_text = get_field('tb_hero_btn_text')   ?: 'Contact us';
?>

  <main>
    <!-- Секция Hero -->
    <section class="hero hero-tb section-special section-decorated-dark" id="hero">
      <div class="hero-tb--img" style="background-image: url('<?php echo esc_url($tb_hero_bg); ?>');"></div>
      <div class="hero-tb__wrapper container">
        <?php questime_breadcrumbs(); ?>
        <div class="hero-tb__content text-align">
          <p class="hero-tb__tagline">
            <?php echo esc_html($tb_tagline); ?>
          </p>
          <h1 class="hero-tb__title">
            <span class="hero-tb__accent">
              <?php echo esc_html($tb_accent_1); ?>
            </span>
            <?php echo esc_html($tb_text_1); ?><br>
            <span class="hero-tb__accent">
              <?php echo esc_html($tb_accent_2); ?>
            </span>
            <?php echo esc_html($tb_text_2); ?>
            <span class="hero-tb__accent">
              <?php echo esc_html($tb_accent_3); ?>
            </span>
          </h1>
          <p class="hero-tb__subtitle">
            <?php echo esc_html($tb_subtitle); ?>
          </p>
          <div class="hero-tb__actions">
            <a class="btn btn-secondary btn--orange hero-tb__btn" href="<?php echo esc_url($whatsapp); ?>" target="_blank">
              <?php echo esc_html($tb_btn_text); ?>
            </a>
          </div>
        </div>
        <a class="hero-tb__reviews reviews-badge" href="#reviews">
          <span class="reviews-badge__label">
            Google Reviews
          </span>
          <span class="reviews-badge__stars" aria-label="4.9 out of 5 stars">
            ★★★★★
          </span>
          <span class="reviews-badge__score">
            4.9 (500+)
          </span>
        </a>
      </div>
    </section>
    <!-- Секция Experience -->
    <section class="experience section-special" id="experience">
      <div class="container">
        <div class="experience__row">
          <div class="experience__col--text">
            <p class="experience__p">We design <span class="text-orange">immersive game experiences</span> that go far beyond standard team events.<br>
            Our formats include detective games, quizzes, story-driven costume parties, city games, and escape-room mechanics — and sometimes all of them combined in one event.</p>
            <p class="experience__p">We organise games <span class="text-orange">anywhere in the Netherlands</span>.</p>
          </div>
          <div class="experience__col--img">
            <div class="experience__img-wrapper">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team-building/expirience-TB-1.webp" alt="Team building experience" class="experience__img" loading="lazy" decoding="async">
            </div>
          </div>
        </div>

        <div class="experience__row experience__row--img-first">
          <div class="experience__col--img">
            <div class="experience__img-wrapper">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team-building/expirience-TB-2.webp" alt="Team building activity" class="experience__img" loading="lazy" decoding="async">
            </div>
          </div>
          <div class="experience__col--gains">
            <h3 class="experience__gains-title">What your team gains:</h3>
            <ul class="experience__list">
              <li class="experience__item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/tick.svg" alt="" class="experience__tick" loading="lazy" decoding="async">
                Memorable emotions and shared experiences
              </li>
              <li class="experience__item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/tick.svg" alt="" class="experience__tick" loading="lazy" decoding="async">
                A boost to problem-solving skills and emotional intelligence
              </li>
              <li class="experience__item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/tick.svg" alt="" class="experience__tick" loading="lazy" decoding="async">
                Real interaction, not passive entertainment
              </li>
            </ul>
          </div>
        </div>
        
        <div class="experience__row">
          <div class="experience__col--text">
            <p class="experience__p">All events are led by experienced and charismatic Game Masters who guide the story and keep the energy high.</p>
            <p class="experience__p">We bring all materials, props and music.</p>
          </div>
          <div class="experience__col--img">
            <div class="experience__img-wrapper">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team-building/expirience-TB-3.webp" alt="Team event" class="experience__img" loading="lazy" decoding="async">
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Секция Stats -->
    <?php get_template_part('templates/stats'); ?>
    <!-- Секция Quests -->
    <section class="quests section-special" id="quests">
      <div class="container">
        <h2 class="text-align">OUR ACTIVITIES</h2>
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
          <a href="#" class="btn btn-card testimonials__btn btn--transparent" target="_blank">Read More Reviews</a>
        </div>
      </div>
    </section>
    <!-- Секция Benefits -->
    <?php get_template_part('templates/benefits'); ?>
    <!-- Секция CTA -->
    <section class="cta section-special cta--team-building decorated-dark-cta decorated-light-cta" id="cta" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/main/cta.webp');">
      <div class="cta__overlay"></div>
      <div class="container">
        <div class="cta__inner">
          <h2 class="cta__title">
            <span class="cta__title-orange">Turn</span><span class="cta__title-white"> your team building and outings
              into a bold, </span><br><span class="cta__title-orange">unforgettable adventure</span>
            <span class="cta__title-white">!</span>
          </h2>
        </div>
      </div>
    </section>
    <!-- Секция Form -->
    <section class="contact-form contact-form-cg section-special" id="contact-form">
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
