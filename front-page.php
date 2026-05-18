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
  <section class="quests section-special" id="quests">
    <div class="container">
      <h2 class="text-align">Explore our unique quests</h2>
      <div class="quests__slider-wrap">
        <div class="swiper quests__slider">
          <div class="swiper-wrapper">

            <?php
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

                $product       = wc_get_product(get_the_ID());
                $title         = get_the_title();
                $description   = get_the_excerpt() ?: wp_trim_words(get_the_content(), 30);
                $url           = get_permalink();
                $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'large')
                  ?: get_template_directory_uri() . '/assets/images/quests/quests-1.webp';

                $tags = [];
                $attributes = $product->get_attributes();

                uasort($attributes, function ($a, $b) {
                  return $a->get_position() <=> $b->get_position();
                });

                foreach ($attributes as $attribute) {
                  if (!$attribute->is_taxonomy()) {
                    $tags[] = $attribute->get_name();
                  }
                }

                $btn_contact = get_field('quest_btn_contact_text') ?: 'Contact us';
                $btn_learn   = get_field('quest_btn_learn_text')   ?: 'Learn more';
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
                    <button
                      type="button"
                      class="btn btn-card quest-card__btn-contact btn--orange"
                      data-modal="request">
                      <?php echo esc_html($btn_contact); ?>
                    </button>
                    <a href="<?php echo esc_url($url); ?>" class="btn btn-card quest-card__btn-learn">
                      <?php echo esc_html($btn_learn); ?>
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
            class="btn btn-secondary services__btn btn--orange">
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
            <label for="agree">By subscribing, you agree to our <a href="<?php echo get_permalink(get_page_by_path('privacy-policy')); ?>" target="_blank">Privacy Policy</a></label>
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