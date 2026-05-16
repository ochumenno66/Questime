<?php
/*
Template Name: About Us
*/

get_header();

// Hero — данные из ACF
$au_bg         = get_field('au_hero_bg')        ?: '';
$au_title      = get_field('au_hero_title')     ?: 'About our team';
$au_text       = get_field('au_hero_text')      ?: 'We believe that the greatest happiness is the happiness of communication and smart entertainment.';
$au_image      = get_field('au_hero_image')     ?: get_template_directory_uri() . '/assets/images/about-us/about-us-hero.png';
$au_image_alt  = get_field('au_hero_image_alt') ?: 'About us hero';
$au_btn1_text  = get_field('au_hero_btn_1_text') ?: 'Request';
$au_btn2_text  = get_field('au_hero_btn_2_text') ?: 'Download the presentation';
$au_pdf        = get_field('au_hero_pdf')        ?: '';

$au_bg_style = $au_bg
    ? ' style="background: linear-gradient(0deg, rgba(25, 26, 24, 0.7), rgba(25, 26, 24, 0.7)), linear-gradient(180deg, #191a18 0%, rgba(25, 26, 24, 0) 49.04%, #191a18 100%), url(\'' . esc_url($au_bg) . '\') center / cover no-repeat;"'
    : '';
?>

  <main>
    <!-- Секция Hero -->
    <section class="aboutus-hero hero section-special section-decorated-dark" id="hero">
      <div class="aboutus-hero__bg"<?php echo $au_bg_style; ?>></div>

      <div class="aboutus-hero__wrapper container">
        <!-- Хлебные крошки — автоматические -->
        <?php questime_breadcrumbs(); ?>
        <div class="custom-games-hero__content">
          <h1 class="custom-games-hero__title"><?php echo esc_html($au_title); ?></h1>
          <div class="aboutus-hero__image-wrap--mobile">
            <img
              src="<?php echo esc_url($au_image); ?>"
              alt="<?php echo esc_attr($au_image_alt); ?>"
              class="aboutus-hero__image"
            />
          </div>
          <div class="aboutus-hero__body">
            
            <p><?php echo wp_kses_post($au_text); ?></p>
          </div>

          <div class="aboutus-hero__actions">
            <button
              type="button"
              class="btn btn-secondary btn--orange"
              data-modal="request"
            >
              <?php echo esc_html($au_btn1_text); ?>
            </button>
            <?php if ($au_pdf) : ?>
            <a
              href="<?php echo esc_url($au_pdf); ?>"
              download
              class="btn btn-secondary btn-download btn--transparent"
            >
              <?php echo esc_html($au_btn2_text); ?>
            </a>
            <?php endif; ?>
          </div>
        </div>

        <div class="aboutus-hero__image-wrap">
          <img
            src="<?php echo esc_url($au_image); ?>"
            alt="<?php echo esc_attr($au_image_alt); ?>"
            class="aboutus-hero__image"
          />
        </div>
      </div>
    </section>
    <!-- Секция Stats -->
    <section class="stats-au section-special" id="stats-au">
      <div class="stats-au__wrapper container">
        <div class="stats-au__item">
          <div class="stats-au__card">
            <img class="stats-au__icon" src="<?php echo get_template_directory_uri(); ?>/assets/icons/person-black-EP-AU.svg" alt="Person">
            <p class="stats-au__number">400 000 people</p>
            <p class="stats-au__text">played with us</p>
          </div>
        </div>
        <div class="stats-au__item">
          <div class="stats-au__card">
            <img class="stats-au__icon" src="<?php echo get_template_directory_uri(); ?>/assets/icons/date-EP-AU.svg" alt="Date">
            <p class="stats-au__number">13 years</p>
            <p class="stats-au__text">experience</p>
          </div>
        </div>
        <div class="stats-au__item">
          <div class="stats-au__card">
            <img class="stats-au__icon" src="<?php echo get_template_directory_uri(); ?>/assets/icons/format-black-EP-AU.svg" alt="Format">
            <p class="stats-au__number">10 000 events</p>
            <p class="stats-au__text">for groups 6 – 800 people</p>
          </div>
        </div>
      </div>
    </section>
    <!-- Секция Experience -->
    <section class="experience experience--flat section-special" id="experience">
      <h2 class="team__title text-align">Our Story</h2>
      <div class="container">
        <!-- Row 1: text left, image right -->
        <div class="experience__row">
          <div class="experience__col--text">
            <p class="experience__p"><span class="text-orange">The golden age of cinema</span> is just beginning — glittering premieres, rising stars and powerful directors shaping the future of film. But behind the glamour of the studio lights, something has gone terribly wrong.<span class="text-orange"> A shocking crime</span> has been committed on set.</p>
            <p class="experience__p">As a team of detectives, you must uncover what really happened. The director, the movie star, the cameraman, the makeup artist, the maid — everyone seems to know something, but no one is telling the whole story.</p>
          </div>
          <div class="experience__col--img">
            <div class="experience__img-wrapper">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team-building/expirience-TB-1.webp" alt="Questime team experience" class="experience__img" loading="lazy" decoding="async">
            </div>
          </div>
        </div>
        <!-- Row 2: image left, text right -->
        <div class="experience__row experience__row--img-first">
          <div class="experience__col--img">
            <div class="experience__img-wrapper">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team-building/expirience-TB-2.webp" alt="Questime in action" class="experience__img" loading="lazy" decoding="async">
            </div>
          </div>
          <div class="experience__col--gains">
            <p class="experience__p"><span class="text-orange">Piece together the clues, unravel the secrets</span> of the studio, and <span class="text-orange">decide</span> for yourselves: who is guilty of the crime in the world of the Great Silent Cinema?</p>
            <p class="experience__p">All events are led by experienced and charismatic Game Masters who guide the story and keep the energy high.</p>
            <p class="experience__p">We bring all materials, props and music.</p>
          </div>
        </div>
        <!-- Row 3: text left, image right -->
        <div class="experience__row">
          <div class="experience__col--text">
            <p class="experience__p"><span class="text-orange">Piece together the clues, unravel the secrets</span> of the studio, and <span class="text-orange">decide</span> for yourselves: who is guilty of the crime in the world of the Great Silent Cinema?</p>
            <p class="experience__p">All events are led by experienced and charismatic Game Masters who guide the story and keep the energy high.</p>
            <p class="experience__p">We bring all materials, props and music.</p>
          </div>
          <div class="experience__col--img">
            <div class="experience__img-wrapper">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team-building/expirience-TB-3.webp" alt="Questime event" class="experience__img" loading="lazy" decoding="async">
            </div>
          </div>
        </div>
        <!-- Actions -->
        <div class="experience__actions">
          <a href="blog.html" class="btn btn-secondary about__btn">Go to our blog</a>
        </div>
      </div>
    </section>
    <!-- Секция Team -->
    <section class="team section-special" id="team">
      <h2 class="team__title text-align">Our Team</h2>
      <div class="team__list">
        <div class="team__member">
          <div class="container">
            <div class="team__photo-wrap">
              <img class="team__photo" src="<?php echo get_template_directory_uri(); ?>/assets/images/about-us/mark.webp" alt="Mark Minskii" />
            </div>
            <div class="team__info">
              <h3 class="team__name">Mark Minskii</h3>
              <div class="team__bio-wrapper">
                <p class="team__bio">Questime isn't just a business for me: it's an opportunity to make the people who
                  play our quests a little happier, more fun, and smarter. Hosting games is a great pleasure for me. I'm
                  also a versatile presenter :)) I work with a variety of audiences, from corporate clients to children.
                </p>
                <p class="team__bio">About me: I graduated from Moscow State University and the Plekhanov Russian
                  University of Economics, and previously headed marketing departments at several large companies. I've
                  also developed training courses on presentations and public speaking.</p>
              </div>
              <div class="team__stats">
                <div class="team__stat">
                  <span class="team__stat-value">10</span>
                  <span class="team__stat-label">years</span>
                </div>
                <div class="team__stat">
                  <span class="team__stat-value">500</span>
                  <span class="team__stat-label">plays</span>
                </div>
                <div class="team__stat">
                  <span class="team__stat-value">50</span>
                  <span class="team__stat-label">projects</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="team__member team__member--reverse">
          <div class="container">
            <div class="team__photo-wrap">
              <img class="team__photo" src="<?php echo get_template_directory_uri(); ?>/assets/images/about-us/natalia.webp" alt="Natalia Minskaia" />
            </div>
            <div class="team__info">
              <h3 class="h3 team__name">Natalia Minskaia</h3>
              <div class="team__bio-wrapper">
                <p class="team__bio">A quest author, she graduated from the Gerasimov Institute of Cinematography (VGIK)
                  and the USC School of Screenwriting. She writes screenplays, plays, and short stories. Natasha's
                  personal blog about games, quests, and creativity is <a class="team__link"
                    href="http://www.rubikam.ru" target="_blank">www.rubikam.ru</a>.</p>
              </div>
              <div class="team__stats">
                <div class="team__stat">
                  <span class="team__stat-value">10</span>
                  <span class="team__stat-label">years</span>
                </div>
                <div class="team__stat">
                  <span class="team__stat-value">500</span>
                  <span class="team__stat-label">plays</span>
                </div>
                <div class="team__stat">
                  <span class="team__stat-value">50</span>
                  <span class="team__stat-label">projects</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="team__member">
          <div class="container">
            <div class="team__photo-wrap">
              <img class="team__photo" src="<?php echo get_template_directory_uri(); ?>/assets/images/about-us/maria.webp" alt="Maria Boriskina" />
            </div>
            <div class="team__info">
              <h3 class="h3 team__name">Maria Boriskina</h3>
              <div class="team__bio-wrapper">
                <p class="team__bio">It was like an electric shock, like love at first sight. I was hooked on quests
                  from
                  the very first game, and I knew they were 100% my thing. For me, every game is a stunning performance
                  with brilliant actors. Everyone can discover qualities within themselves they might not have
                  previously
                  suspected. My goal is to help you with this. They offer something so desperately lacking in everyday
                  life—a thrill, new experiences. In our saturated age, that's especially relevant, don't you think?</p>
              </div>
              <div class="team__stats">
                <div class="team__stat">
                  <span class="team__stat-value">10</span>
                  <span class="team__stat-label">years</span>
                </div>
                <div class="team__stat">
                  <span class="team__stat-value">500</span>
                  <span class="team__stat-label">plays</span>
                </div>
                <div class="team__stat">
                  <span class="team__stat-value">50</span>
                  <span class="team__stat-label">projects</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="team__member team__member--reverse">
          <div class="container">
            <div class="team__photo-wrap">
              <img class="team__photo" src="<?php echo get_template_directory_uri(); ?>/assets/images/about-us/jan.webp" alt="Jan" />
            </div>
            <div class="team__info">
              <h3 class="h3 team__name">Jan</h3>
              <div class="team__bio-wrapper">
                <p class="team__bio">A few words about myself: a financier by profession, a prankster by vocation. A
                  versatile host, co-host, and drinking buddy, depending on the situation.</p>
                <p class="team__bio">A showman, toastmaster, "foe, chatterbox, and laugher" all rolled into one. If
                  you're
                  planning a corporate event, a birthday party, a wedding, or the funeral of an unkissed neighbor, and
                  you'd like to make the day unforgettable and unique, then don't hesitate to give us a call.</p>
              </div>
              <div class="team__stats">
                <div class="team__stat">
                  <span class="team__stat-value">10</span>
                  <span class="team__stat-label">years</span>
                </div>
                <div class="team__stat">
                  <span class="team__stat-value">500</span>
                  <span class="team__stat-label">plays</span>
                </div>
                <div class="team__stat">
                  <span class="team__stat-value">50</span>
                  <span class="team__stat-label">projects</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Секция Subscribe -->
    <section class="subscribe-about-us section-special decorated-light-stats decorated-dark-stats" id="subscribe-about-us" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/main/stats.webp');">
      <div class="subscribe-about-us__overlay"></div>
      <div class="container subscribe-about-us__container">
        <h2 class="subscribe-about-us__title">Join Us</h2>

        <div class="subscribe-about-us__socials">
          <a href="#" class="subscribe-about-us__link" target="_blank">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/about-us/instagram-rhomb.svg" alt="" class="subscribe-about-us__rhomb">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/logo_instagram.svg" alt="Instagram" class="subscribe-about-us__icon">
          </a>

          <a href="#" class="subscribe-about-us__link" target="_blank">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/about-us/threads-rhomb.svg" alt="" class="subscribe-about-us__rhomb">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/logo_threads.svg" alt="Threads" class="subscribe-about-us__icon">
          </a>

          <a href="#" class="subscribe-about-us__link" target="_blank">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/about-us/linkedin-rhomb.svg" alt="" class="subscribe-about-us__rhomb">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/logo_linkedin.svg" alt="LinkedIn" class="subscribe-about-us__icon">
          </a>
        </div>
      </div>
    </section>
    <!-- Секция Benefits -->
    <?php get_template_part('templates/benefits'); ?>
    <!-- Секция CTA -->
    <section class="cta about-cta section-special decorated-dark-cta decorated-light-cta" id="cta" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/main/cta.webp');">
      <div class="cta__overlay"></div>
      <div class="container">
        <div class="cta__inner">
          <h2 class="cta__title">
            <span class="cta__title-orange">Turn</span><span class="cta__title-white"> your team building and outings
              into a bold, </span><br><span class="cta__title-orange">unforgettable adventure</span>
            <span class="cta__title-white">!</span>
          </h2>
          <a href="<?php echo get_template_directory_uri(); ?>/assets/presentation.pdf" class="btn btn-secondary cta__btn btn--transparent"
            download="Questime_Presentation">Download PDF</a>
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
              <label for="agree">By subscribing, you agree to our <a href="/privacy-policy.html" target="_blank">Privacy Policy</a></label>
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
