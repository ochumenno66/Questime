<?php
/*
Template Name: Gamified Tours
*/

// Блок - Hero
$whatsapp = get_theme_mod('whatsapp_url', 'https://wa.me/31635640923');
$reviews_rating = get_theme_mod('reviews_rating', '4.9');
$reviews_count  = get_theme_mod('reviews_count', '500+');
$reviews_label  = get_theme_mod('reviews_label', 'Google Reviews');
$reviews_url    = get_theme_mod('reviews_url', '');

$gt_hero_bg       = get_field('gt_hero_bg')         ?: get_template_directory_uri() . '/assets/images/gamifiedTours/gt-hero.webp';
$gt_text_1        = get_field('gt_hero_text_1')     ?: 'What if';
$gt_accent_text_1 = get_field('gt_hero_accent_1')   ?: 'HISTORY';
$gt_text_2        = get_field('gt_hero_text_2')     ?: 'and';
$gt_accent_text_2 = get_field('gt_hero_accent_2')   ?: 'CULTURE';
$gt_text_3        = get_field('gt_hero_text_3')     ?: 'were as';
$gt_accent_text_3 = get_field('gt_hero_accent_3')   ?: 'THRILLING';
$gt_text_4        = get_field('gt_hero_text_4')     ?: 'as Netflix —';
$gt_text_5        = get_field('gt_hero_text_5')     ?: 'and as immersive as a video';
$gt_text_6        = get_field('gt_hero_text_6')     ?: 'game?';
$gt_subtitle      = get_field('gt_hero_subtitle')   ?: 'for families, teens & adults';
$gt_btn_1_text    = get_field('gt_hero_btn_1_text') ?: 'Small group schedule';
$gt_btn_2_text    = get_field('gt_hero_btn_2_text') ?: 'Order private tour';

// Блок - CTA_GUIDE
$gt_guide_bg       = get_field('gt_guide_bg')       ?: get_template_directory_uri() . '/assets/images/gamifiedTours/cta-GT.webp';
$gt_guide_text_1   = get_field('gt_guide_text_1')   ?: 'We\'ve created';
$gt_guide_accent_1 = get_field('gt_guide_accent_1') ?: 'a free Family Guide';
$gt_guide_text_2   = get_field('gt_guide_text_2')   ?: 'to Amsterdam — so there are';
$gt_guide_accent_2 = get_field('gt_guide_accent_2') ?: 'no "I\'m bored"';
$gt_guide_text_3   = get_field('gt_guide_text_3')   ?: 'moments on your trip.';
$gt_guide_btn_text = get_field('gt_guide_btn_text');
$gt_guide_pdf      = get_field('gt_guide_pdf')      ?: get_template_directory_uri() . '/assets/presentation.pdf';
$gt_guide_img      = get_field('gt_guide_img')      ?: get_template_directory_uri() . '/assets/images/gamifiedTours/guide.webp';
$gt_guide_img_alt  = get_field('gt_guide_img_alt')  ?: 'Free Family Guide to Amsterdam';

get_header(); ?>

<main>
  <!-- Секция Hero -->
  <section class="hero hero-gt section-special section-decorated-dark" id="hero">
    <div class="hero-gt--img" style="
      background:
      linear-gradient(0deg, rgba(25, 26, 24, 0.7), rgba(25, 26, 24, 0.7)),
      linear-gradient(to bottom, #191a18 10%, transparent 72%, #191a18 100%),
      url('<?php echo esc_url($gt_hero_bg); ?>') center / cover no-repeat;">
    </div>
    <div class="hero-gt__wrapper container">
      <?php questime_breadcrumbs(); ?>
      <div class="hero-gt__content text-align">
        <h1 class="hero-gt__title">
          <?php echo esc_html($gt_text_1); ?>
          <span class="hero-gt__accent">
            <?php echo esc_html($gt_accent_text_1); ?>
          </span>
          <?php echo esc_html($gt_text_2); ?>
          <span class="hero-gt__accent">
            <?php echo esc_html($gt_accent_text_2); ?>
          </span>
          <?php echo esc_html($gt_text_3); ?>
          <span class="hero-gt__accent">
            <?php echo esc_html($gt_accent_text_3); ?>
          </span>
          <?php echo esc_html($gt_text_4); ?><br>
          <?php echo esc_html($gt_text_5); ?><br>
          <?php echo esc_html($gt_text_6); ?>
        </h1>
        <p class="hero-gt__subtitle">
          <?php echo esc_html($gt_subtitle); ?>
        </p>
        <div class="hero-gt__actions">
          <a class="btn btn-secondary btn--orange hero-gt__btn" href="<?php echo esc_url(home_url('/schedule/')); ?>">
            <?php echo esc_html($gt_btn_1_text); ?>
          </a>
          <button class="btn btn-secondary btn--transparent hero-gt__btn open-modal" type="button" data-modal-open>
            <?php echo esc_html($gt_btn_2_text); ?>
          </button>
        </div>
      </div>
      <?php
        $reviews_tag = $reviews_url ? 'a' : 'div';
      ?>
      <<?php echo $reviews_tag; ?>
        class="hero-gt__reviews reviews-badge"
        <?php if ($reviews_url) : ?>
          href="<?php echo esc_url($reviews_url); ?>"
          target="_blank"
        <?php endif; ?>>
        <span class="reviews-badge__label">
          <?php echo esc_html($reviews_label); ?>
        </span>
        <span class="reviews-badge__stars">
          ★★★★★
        </span>
        <span class="reviews-badge__score">
          <?php echo esc_html($reviews_rating); ?>
          (<?php echo esc_html($reviews_count); ?>)
        </span>
        </<?php echo $reviews_tag; ?>>
    </div>
  </section>
  <!-- Секция Experience -->
  <?php get_template_part('templates/experience-case-product'); ?>
  <!-- Секция CTA_GUIDE как CTA -->
  <section class="cta cta-guide section-special decorated-dark-stats decorated-light-stats" id="cta-guide" style="
        background:
        linear-gradient(0deg, rgba(25, 26, 24, 0.7), rgba(25, 26, 24, 0.7)),
        linear-gradient(to bottom, #191a18 10%, transparent 72%, #191a18 100%),
        url('<?php echo esc_url($gt_guide_bg); ?>') center / cover no-repeat;">
    <div class="cta-guide__wrapper container">
      <div class="cta-guide__content">
        <h2 class="cta-guide__text">
          <?php echo esc_html($gt_guide_text_1); ?>
          <span class="text-orange--guide">
            <?php echo esc_html($gt_guide_accent_1); ?>
          </span>
          <?php echo esc_html($gt_guide_text_2); ?>
          <span class="text-orange--guide">
            <?php echo esc_html($gt_guide_accent_2); ?>
          </span>
          <?php echo esc_html($gt_guide_text_3); ?>
        </h2>
        <?php if ($gt_guide_pdf && $gt_guide_btn_text) : ?>
          <a class="btn btn-secondary btn--orange cta-guide__btn" href="<?php echo esc_url($gt_guide_pdf); ?>" target="_blank">
            <?php echo esc_html($gt_guide_btn_text); ?>
          </a>
          <?php endif; ?>
      </div>
      <img src="<?php echo esc_url($gt_guide_img); ?>" alt="<?php echo esc_attr($gt_guide_img_alt); ?>" class="cta-guide__img" loading="lazy" decoding="async">
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
                $whatsapp_url = get_theme_mod('whatsapp_url', 'https://wa.me/31635640923');

                // Теги из атрибутов WooCommerce
                $tags = [];
                $attributes = $product->get_attributes();

                // Сортировка по position
                uasort($attributes, function ($a, $b) {
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
  <?php get_template_part('templates/testimonials'); ?>
  <!-- Секция CTA -->
  <?php get_template_part('templates/cta'); ?>
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
  <?php get_template_part('templates/faq'); ?>
</main>

<?php get_footer(); ?>