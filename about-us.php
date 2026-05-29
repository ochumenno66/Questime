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

// Stats — данные из ACF
// Карточка 1
$s1_icon   = get_field('au_stats_1_icon') ?: get_template_directory_uri() . '/assets/icons/person-black-EP-AU.svg';
$s1_number = get_field('au_stats_1_number') ?: '400 000 people';
$s1_text   = get_field('au_stats_1_text') ?: 'played with us';

// Карточка 2
$s2_icon   = get_field('au_stats_2_icon') ?: get_template_directory_uri() . '/assets/icons/date-EP-AU.svg';
$s2_number = get_field('au_stats_2_number') ?: '13 years';
$s2_text   = get_field('au_stats_2_text') ?: 'experience';

// Карточка 3
$s3_icon   = get_field('au_stats_3_icon') ?: get_template_directory_uri() . '/assets/icons/format-black-EP-AU.svg';
$s3_number = get_field('au_stats_3_number') ?: '10 000 events';
$s3_text   = get_field('au_stats_3_text') ?: 'for groups 6 – 800 people';

// Subscribe — данные из ACF
$show_socials_block = get_field('show_socials_block');
$socials_background = get_field('socials_background');
$socials_title      = get_field('socials_title');

$linkedin_url       = get_theme_mod('linkedin_url');
$linkedin_icon      = get_theme_mod('linkedin_icon');
$linkedin_alt       = get_theme_mod('linkedin_alt');

$threads_url        = get_theme_mod('threads_url');
$threads_icon       = get_theme_mod('threads_icon');
$threads_alt        = get_theme_mod('threads_alt');

$instagram_url      = get_theme_mod('instagram_url');
$instagram_icon     = get_theme_mod('instagram_icon');
$instagram_alt      = get_theme_mod('instagram_alt');


?>

<main>
  <!-- Секция Hero -->
  <section class="aboutus-hero hero section-special section-decorated-dark" id="hero">
    <div class="aboutus-hero__bg" <?php echo $au_bg_style; ?>></div>

    <div class="aboutus-hero__wrapper container">
      <!-- Хлебные крошки — автоматические -->
      <?php questime_breadcrumbs(); ?>
      <div class="custom-games-hero__content">
        <h1 class="custom-games-hero__title"><?php echo esc_html($au_title); ?></h1>
        <div class="aboutus-hero__image-wrap--mobile">
          <img
            src="<?php echo esc_url($au_image); ?>"
            alt="<?php echo esc_attr($au_image_alt); ?>"
            class="aboutus-hero__image" />
        </div>
        <div class="aboutus-hero__body">

          <p><?php echo wp_kses_post($au_text); ?></p>
        </div>

        <div class="aboutus-hero__actions">
          <button
            type="button"
            class="btn btn-secondary btn--orange open-modal" data-modal-open
            data-modal="request">
            <?php echo esc_html($au_btn1_text); ?>
          </button>
          <?php if ($au_pdf) : ?>
            <a
              href="<?php echo esc_url($au_pdf); ?>"
              download
              class="btn btn-secondary btn-download btn--transparent">
              <?php echo esc_html($au_btn2_text); ?>
            </a>
          <?php endif; ?>
        </div>
      </div>

      <div class="aboutus-hero__image-wrap">
        <img
          src="<?php echo esc_url($au_image); ?>"
          alt="<?php echo esc_attr($au_image_alt); ?>"
          class="aboutus-hero__image" />
      </div>
    </div>
  </section>
  <!-- Секция Stats -->
  <?php if (get_field('show_stats_au')) : ?>
    <section class="stats-au section-special" id="stats-au">
      <div class="stats-au__wrapper container">
        <div class="stats-au__item">
          <div class="stats-au__card">
            <img class="stats-au__icon" src="<?php echo esc_url($s1_icon); ?>" alt="<?php echo esc_attr($s1_number); ?>">
            <p class="stats-au__number">
              <?php echo esc_html($s1_number); ?>
            </p>
            <p class="stats-au__text">
              <?php echo esc_html($s1_text); ?>
            </p>
          </div>
        </div>
        <div class="stats-au__item">
          <div class="stats-au__card">
            <img class="stats-au__icon" src="<?php echo esc_url($s2_icon); ?>" alt="<?php echo esc_attr($s2_number); ?>">
            <p class="stats-au__number">
              <?php echo esc_html($s2_number); ?>
            </p>
            <p class="stats-au__text">
              <?php echo esc_html($s2_text); ?>
            </p>
          </div>
        </div>
        <div class="stats-au__item">
          <div class="stats-au__card">
            <img class="stats-au__icon" src="<?php echo esc_url($s3_icon); ?>" alt="<?php echo esc_attr($s3_number); ?>">
            <p class="stats-au__number">
              <?php echo esc_html($s3_number); ?>
            </p>
            <p class="stats-au__text">
              <?php echo esc_html($s3_text); ?>
            </p>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>
  <!-- Секция Experience -->
  <?php get_template_part('templates/experience'); ?>
  <!-- Секция Team -->
  <section class="team section-special" id="team">
    <?php if (get_field('team_heading')) : ?>
      <h2 class="team__title text-align">
        <?php the_field('team_heading'); ?>
      </h2>
    <?php endif; ?>
    <div class="team__list">

      <?php for ($i = 1; $i <= 4; $i++) :
        $photo = get_field("team_member_{$i}_photo");
        $name = get_field("team_member_{$i}_name");
        $bio = get_field("team_member_{$i}_bio");
        $years = get_field("team_member_{$i}_years");
        $plays = get_field("team_member_{$i}_plays");
        $projects = get_field("team_member_{$i}_projects");
        if (!$name) {
          continue;
        }
        $reverse_class = ($i % 2 === 0) ? 'team__member--reverse' : '';
      ?>

        <div class="team__member <?php echo $reverse_class; ?>">
          <div class="container">
            <div class="team__photo-wrap">
              <?php if ($photo) : ?>
                <img
                  class="team__photo"
                  src="<?php echo esc_url($photo['url']); ?>"
                  alt="<?php echo esc_attr($name); ?>">
              <?php endif; ?>
            </div>
            <div class="team__info">
              <h3 class="team__name">
                <?php echo esc_html($name); ?>
              </h3>
              <div class="team__bio-wrapper">
                <?php echo wp_kses_post($bio); ?>
              </div>
              <div class="team__stats">
                <?php if ($years) : ?>
                  <div class="team__stat">
                    <span class="team__stat-value">
                      <?php echo esc_html($years); ?>
                    </span>
                    <span class="team__stat-label">years</span>
                  </div>
                <?php endif; ?>
                <?php if ($plays) : ?>
                  <div class="team__stat">
                    <span class="team__stat-value">
                      <?php echo esc_html($plays); ?>
                    </span>
                    <span class="team__stat-label">plays</span>
                  </div>
                <?php endif; ?>
                <?php if ($projects) : ?>
                  <div class="team__stat">
                    <span class="team__stat-value">
                      <?php echo esc_html($projects); ?>
                    </span>
                    <span class="team__stat-label">projects</span>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      <?php endfor; ?>
    </div>
  </section>
  <!-- Секция Subscribe -->
  <?php if ($show_socials_block): ?>
    <section class="subscribe-about-us section-special decorated-light-stats decorated-dark-stats" id="subscribe-about-us" style="
    background:
    linear-gradient(0deg, rgba(25, 26, 24, 0.7), rgba(25, 26, 24, 0.7)),
    linear-gradient(to bottom, #191a18 10%, transparent 72%, #191a18 100%), 
    url('<?php echo esc_url($socials_background); ?>') center / cover no-repeat;;">
      <div class="container subscribe-about-us__container">
        <?php if ($socials_title): ?>
          <h2 class="subscribe-about-us__title">
            <?php echo esc_html($socials_title); ?>
          </h2>
        <?php endif; ?>
        <div class="subscribe-about-us__socials">
          <?php if ($instagram_url): ?>
            <a href="<?php echo esc_url($instagram_url); ?>" class="subscribe-about-us__link" target="_blank" rel="noopener noreferrer">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/about-us/instagram-rhomb.svg" alt="" class="subscribe-about-us__rhomb">
              <img src="<?php echo esc_url($instagram_icon); ?>" alt="<?php echo esc_attr($instagram_alt); ?>" class="subscribe-about-us__icon">
            </a>
          <?php endif; ?>
          <?php if ($threads_url): ?>
            <a href="<?php echo esc_url($threads_url); ?>" class="subscribe-about-us__link" target="_blank" rel="noopener noreferrer">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/about-us/threads-rhomb.svg" alt="" class="subscribe-about-us__rhomb">
              <img src="<?php echo esc_url($threads_icon); ?>" alt="<?php echo esc_attr($threads_alt); ?>" class="subscribe-about-us__icon">
            </a>
          <?php endif; ?>
          <?php if ($linkedin_url): ?>
            <a href="<?php echo esc_url($linkedin_url); ?>" class="subscribe-about-us__link" target="_blank" rel="noopener noreferrer">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/about-us/linkedin-rhomb.svg" alt="" class="subscribe-about-us__rhomb">
              <img src="<?php echo esc_url($linkedin_icon); ?>" alt="<?php echo esc_attr($linkedin_alt); ?>" class="subscribe-about-us__icon">
            </a>
          <?php endif; ?>
        </div>
      </div>
    </section>
  <?php endif; ?>
  <!-- Секция Benefits -->
  <?php get_template_part('templates/benefits'); ?>
  <!-- Секция CTA -->
  <?php get_template_part('templates/cta'); ?>
  <!-- Секция Form -->
  <?php get_template_part('templates/contact-form', null, ['type' => 'default']); ?>
</main>

<?php get_footer(); ?>