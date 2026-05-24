<?php
get_header();

// Hero — данные из ACF 
$hero_title1       = get_field('hero_title_line1')    ?: 'Welcome ';
$hero_title2       = get_field('hero_title_line2')    ?: 'to&nbsp;Questime';
$hero_tagline_acc  = get_field('hero_tagline_accent') ?: 'Crack';
$hero_tagline_rest = get_field('hero_tagline_rest')   ?: 'The Case';

// Слайды
$slides_raw = [
  get_field('hero_slide_1'),
  get_field('hero_slide_2'),
  get_field('hero_slide_3'),
  get_field('hero_slide_4'),
];
$slides = array_filter($slides_raw);

// Карточки-кнопки
$cards = [
  [
    'bold' => get_field('hero_card_1_bold') ?: 'City',
    'rest' => get_field('hero_card_1_rest') ?: 'Games',
    'url'  => get_field('hero_card_1_url')  ?: home_url('/gamified-tours/'),
  ],
  [
    'bold' => get_field('hero_card_2_bold') ?: 'Corporate',
    'rest' => get_field('hero_card_2_rest') ?: 'Events',
    'url'  => get_field('hero_card_2_url')  ?: home_url('/team-building/'),
  ],
  [
    'bold' => get_field('hero_card_3_bold') ?: 'Custom',
    'rest' => get_field('hero_card_3_rest') ?: 'Games',
    'url'  => get_field('hero_card_3_url')  ?: home_url('/custom-games/'),
  ],
  [
    'bold' => get_field('hero_card_4_bold') ?: 'Home',
    'rest' => get_field('hero_card_4_rest') ?: 'Mysteries',
    'url'  => get_field('hero_card_4_url')  ?: 'https://questime.shop/',
  ],
];

$arrow_svg = '<svg class="hero-card-arrow" width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M0 7.5H15.3125L8.75 0.9375L9.575 0L17.7 8.125L9.575 16.25L8.75 15.3125L15.3125 8.75H0V7.5Z" fill="currentColor"/>
</svg>';
?>
<main>
  <!-- Секция Hero -->
  <section class="hero section-special section-decorated-dark" id="hero">
    <div class="hero__wrapper container">
      <div class="hero-left">
        <div class="hero-top__wrapper">
          <h1 class="hero-title">
            <span><?php echo esc_html($hero_title1); ?></span>
            <span><?php echo wp_kses_post($hero_title2); ?></span>
          </h1>
          <div class="hero-tagline">
            <span class="tagline-crack"><?php echo esc_html($hero_tagline_acc); ?></span>
            <span class="tagline-rest"><?php echo esc_html($hero_tagline_rest); ?></span>
          </div>
        </div>
        <div class="hero-grid">
          <?php foreach ($cards as $card) :
            $is_ext = !str_starts_with($card['url'], home_url()) && !str_starts_with($card['url'], '#');
            $target = $is_ext ? ' target="_blank" rel="noopener noreferrer"' : '';
          ?>
            <a class="hero-card" href="<?php echo esc_url($card['url']); ?>" <?php echo $target; ?>>
              <span><strong><?php echo esc_html($card['bold']); ?></strong> <?php echo esc_html($card['rest']); ?></span>
              <?php echo $arrow_svg; ?>
            </a>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="hero-right">
        <div class="hero-slider__wrapper">
          <?php if (!empty($slides)) :
            $first = true;
            foreach ($slides as $img_url) : ?>
              <div class="hero-slide<?php echo $first ? ' active' : ''; ?>"
                style="background-image: url('<?php echo esc_url($img_url); ?>');">
              </div>
            <?php $first = false;
            endforeach;
          else : ?>
            <!-- Фоллбэк — s1–s4 пока изображения не добавлены в ACF -->
            <div class="hero-slide s1 active"></div>
            <div class="hero-slide s2"></div>
            <div class="hero-slide s3"></div>
            <div class="hero-slide s4"></div>
          <?php endif; ?>
        </div>

        <div class="hero-slider-dots" id="dots">
          <?php $dots_count = !empty($slides) ? count($slides) : 4;
          for ($d = 0; $d < $dots_count; $d++) : ?>
            <div class="hero-dot<?php echo $d === 0 ? ' active' : ''; ?>" data-i="<?php echo $d; ?>"></div>
          <?php endfor; ?>
        </div>
      </div>
    </div>

  </section>
  <!-- Секция Quests -->
  <?php get_template_part('templates/quests'); ?>
  <!-- Секция Services -->
  <section class="services section-special section-decorated-light section-decorated-dark" id="services">
    <?php
    $bg = get_field('services_bg');
    $bg_mobile = get_field('services_bg_mobile');
    $services = explode("\n", get_field('services_list'));
    ?>
    <div class="services__bg">
      <picture class="services__bg-img">
        <?php if ($bg_mobile): ?>
          <source
            media="(max-width: 575px)"
            srcset="<?php echo esc_url($bg_mobile['url']); ?>">
        <?php endif; ?>
        <?php if ($bg): ?>
          <img
            src="<?php echo esc_url($bg['url']); ?>"
            alt="<?php echo esc_attr($bg['alt']); ?>"
            loading="lazy"
            decoding="async">
        <?php endif; ?>
      </picture>
    </div>
    <div class="container">
      <div class="services__inner">
        <h2 class="services__heading">
          <?php the_field('services_heading'); ?>
        </h2>
        <div class="services__list">
          <?php foreach ($services as $service): ?>
            <?php if ($service): ?>
              <div class="services__item">
                <img
                  src="<?php echo get_template_directory_uri(); ?>/assets/icons/tick.svg"
                  alt="tick"
                  class="services__check"
                  loading="lazy"
                  decoding="async">
                <?php echo esc_html($service); ?>
              </div>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
        <?php
        $button_text = get_field('services_button_text');
        $button_link = get_field('services_button_link');
        ?>
        <?php if ($button_link && $button_text): ?>
          <a
            href="<?php echo esc_url($button_link); ?>"
            class="btn btn-secondary services__btn btn--orange open-modal" data-modal-open>
            <?php echo esc_html($button_text); ?>
          </a>
        <?php endif; ?>
      </div>
    </div>
  </section>
  <!-- Секция About -->
  <section class="about section-special" id="about">
    <div class="container">

      <?php if (get_field('about_heading')) : ?>
        <h2 class="text-align">
          <?php the_field('about_heading'); ?>
        </h2>
      <?php endif; ?>

      <div class="about__content">

        <div class="about__dot"></div>

        <div class="about__inner">

          <div class="about__team">

            <?php for ($i = 1; $i <= 10; $i++) :

              $photo = get_field("about_person_{$i}_photo");
              $name  = get_field("about_person_{$i}_name");

              if (!$photo && !$name) {
                continue;
              }
            ?>

              <div class="about__person">

                <?php if ($photo) : ?>
                  <div class="about__person-photo">
                    <img
                      src="<?php echo esc_url($photo['url']); ?>"
                      alt="<?php echo esc_attr($name); ?>"
                      loading="lazy"
                      decoding="async">
                  </div>
                <?php endif; ?>

                <?php if ($name) : ?>
                  <div class="about__person-name">
                    <?php echo nl2br(esc_html($name)); ?>
                  </div>
                <?php endif; ?>

              </div>

            <?php endfor; ?>

          </div>


          <?php
          $facts = get_field('about_facts');

          if ($facts) :

            $facts_array = explode("\n", $facts);
          ?>

            <ul class="about__facts">

              <?php foreach ($facts_array as $fact) :

                $fact = trim($fact);

                if ($fact) :
              ?>

                  <li class="about__fact">
                    <?php echo esc_html($fact); ?>
                  </li>

              <?php
                endif;
              endforeach;
              ?>

            </ul>

          <?php endif; ?>

        </div>

        <?php
        $button_text = get_field('about_button_text');
        $button_url  = get_field('about_button_url');

        if ($button_text && $button_url) :
        ?>

          <a
            href="<?php echo esc_url($button_url); ?>"
            class="btn btn-secondary about__btn">

            <?php echo esc_html($button_text); ?>

          </a>

        <?php endif; ?>

      </div>
    </div>
  </section>
  <!-- Секция Stats -->
  <?php get_template_part('templates/stats'); ?>
  <!-- Секция Benefits -->
  <?php get_template_part('templates/benefits'); ?>
  <!-- Секция CTA -->
  <?php get_template_part('templates/cta'); ?>
  <!-- Секция Gallery -->
  <?php get_template_part('templates/gallery'); ?>
  <!-- Секция Testimonials -->
  <?php get_template_part('templates/testimonials'); ?>
  <!-- Секция Partners -->
  <?php
  $pt_title = get_field('pt_title') ?: 'They have played with us<br>and want more';
  $logos = [];
  for ($i = 1; $i <= 14; $i++) {
    $logo = get_field("pt_logo_{$i}");
    if ($logo) $logos[] = $logo;
  }
  ?>

  <section class="partners section-special" id="partners">
    <div class="container">
      <div class="partners__inner">
        <h2 class="text-align partners__title"><?php echo wp_kses_post($pt_title); ?></h2>

        <?php if (!empty($logos)): ?>
          <div class="partners__grid">
            <?php foreach ($logos as $logo): ?>
              <div class="partners__item">
                <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt'] ?: $logo['title'] ?: 'Partner logo'); ?>">
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

        <div class="partners__footer">
          <a href="<?php echo home_url('/team-building/'); ?>" class="btn btn-secondary partners__btn">Go to Corporate Events</a>
        </div>
      </div>
    </div>
  </section>
  <!-- Секция Form -->
  <?php get_template_part('templates/contact-form', null, ['type' => 'default']); ?>
</main>

<?php get_footer(); ?>