<?php
/*
Template Name: Gamified Tours
*/

// Блок - Hero
$whatsapp       = get_theme_mod('whatsapp_url');
$reviews_rating = get_theme_mod('reviews_rating');
$reviews_count  = get_theme_mod('reviews_count');
$reviews_label  = get_theme_mod('reviews_label');
$reviews_url    = get_theme_mod('reviews_url');

$gt_hero_bg       = get_field('gt_hero_bg');
$gt_text_1        = get_field('gt_hero_text_1');
$gt_accent_text_1 = get_field('gt_hero_accent_1');
$gt_text_2        = get_field('gt_hero_text_2');
$gt_accent_text_2 = get_field('gt_hero_accent_2');
$gt_text_3        = get_field('gt_hero_text_3');
$gt_accent_text_3 = get_field('gt_hero_accent_3');
$gt_text_4        = get_field('gt_hero_text_4');
$gt_text_5        = get_field('gt_hero_text_5');
$gt_text_6        = get_field('gt_hero_text_6');
$gt_subtitle      = get_field('gt_hero_subtitle');
$gt_btn_1_text    = get_field('gt_hero_btn_1_text');
$gt_btn_2_text    = get_field('gt_hero_btn_2_text');

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
    <?php if ($gt_hero_bg) : ?>
      <div class="hero-gt--img" style="
      background:
      linear-gradient(0deg, rgba(25, 26, 24, 0.7), rgba(25, 26, 24, 0.7)),
      linear-gradient(to bottom, #191a18 10%, transparent 72%, #191a18 100%),
      url('<?php echo esc_url($gt_hero_bg); ?>') center / cover no-repeat;">
      </div>
    <?php endif; ?>
    <div class="hero-gt__wrapper container">
      <?php questime_breadcrumbs(); ?>
      <div class="hero-gt__content text-align">
        <?php if (
        $gt_text_1 ||
        $gt_accent_text_1 ||
        $gt_text_2 ||
        $gt_accent_text_2 ||
        $gt_text_3 ||
        $gt_accent_text_3 ||
        $gt_text_4 ||
        $gt_text_5 ||
        $gt_text_6
        ) : ?>
        <h1 class="hero-gt__title">
          <?php if ($gt_text_1) : ?>
            <?php echo esc_html($gt_text_1); ?>
          <?php endif; ?>
          <?php if ($gt_accent_text_1) : ?>
            <span class="hero-gt__accent">
              <?php echo esc_html($gt_accent_text_1); ?>
            </span>
          <?php endif; ?>
          <?php if ($gt_text_2) : ?>
            <?php echo esc_html($gt_text_2); ?>
          <?php endif; ?>
          <?php if ($gt_accent_text_2) : ?>
            <span class="hero-gt__accent">
              <?php echo esc_html($gt_accent_text_2); ?>
            </span>
          <?php endif; ?>
          <?php if ($gt_text_3) : ?>
            <?php echo esc_html($gt_text_3); ?>
          <?php endif; ?>
          <?php if ($gt_accent_text_3) : ?>
            <span class="hero-gt__accent">
              <?php echo esc_html($gt_accent_text_3); ?>
            </span>
          <?php endif; ?>
          <?php if ($gt_text_4) : ?>
            <?php echo esc_html($gt_text_4); ?><br>
          <?php endif; ?>
          <?php if ($gt_text_5) : ?>
            <?php echo esc_html($gt_text_5); ?><br>
          <?php endif; ?>
          <?php if ($gt_text_6) : ?>
            <?php echo esc_html($gt_text_6); ?>
          <?php endif; ?>
        </h1>
      <?php endif; ?>
        <?php if ($gt_subtitle) : ?>
        <p class="hero-gt__subtitle">
          <?php echo esc_html($gt_subtitle); ?>
        </p>
      <?php endif; ?>
      <?php if ($gt_btn_1_text || $gt_btn_2_text) : ?>
        <div class="hero-gt__actions">
          <?php if ($gt_btn_1_text) : ?>
            <a class="btn btn-secondary btn--orange hero-gt__btn"
              href="<?php echo esc_url(home_url('/schedule/')); ?>">
              <?php echo esc_html($gt_btn_1_text); ?>
            </a>
          <?php endif; ?>
          <?php if ($gt_btn_2_text) : ?>
            <button class="btn btn-secondary btn--transparent hero-gt__btn open-modal"
              type="button"
              data-modal-open>
              <?php echo esc_html($gt_btn_2_text); ?>
            </button>
          <?php endif; ?>
        </div>
      <?php endif; ?>
    </div>
    <?php if ($reviews_label || $reviews_rating || $reviews_count) : ?>
    <?php $reviews_tag = $reviews_url ? 'a' : 'div'; ?>
      <<?php echo $reviews_tag; ?>
        class="hero-gt__reviews reviews-badge"
        <?php if ($reviews_url) : ?>
          href="<?php echo esc_url($reviews_url); ?>"
          target="_blank"
        <?php endif; ?>>
        <?php if ($reviews_label) : ?>
          <span class="reviews-badge__label">
            <?php echo esc_html($reviews_label); ?>
          </span>
        <?php endif; ?>
        <?php if ($reviews_rating || $reviews_count) : ?>
          <span class="reviews-badge__stars">
            ★★★★★
          </span>
          <span class="reviews-badge__score">
            <?php if ($reviews_rating) : ?>
              <?php echo esc_html($reviews_rating); ?>
            <?php endif; ?>
            <?php if ($reviews_count) : ?>
              (<?php echo esc_html($reviews_count); ?>)
            <?php endif; ?>
          </span>
        <?php endif; ?>
      </<?php echo $reviews_tag; ?>>
      <?php endif; ?>
  </section>
  <!-- Секция Experience -->
  <?php get_template_part('templates/experience'); ?>
  <!-- Секция CTA_GUIDE как CTA -->
  <?php if (get_field('show_guide')) : ?>
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
  <?php endif; ?>
  <!-- Секция Quests -->
  <?php get_template_part('templates/quests'); ?>
  <!-- Секция Gallery -->
  <?php get_template_part('templates/gallery'); ?>
  <!-- Секция Testimonials -->
  <?php get_template_part('templates/testimonials'); ?>
  <!-- Секция Benefits -->
  <?php get_template_part('templates/benefits'); ?>
  <!-- Секция CTA -->
  <?php get_template_part('templates/cta'); ?>
  <!-- Секция Form -->
  <?php get_template_part('templates/contact-form', null, ['type' => 'gamified']); ?>
  <!-- Секция FAQ -->
  <?php get_template_part('templates/faq'); ?>
</main>

<?php get_footer(); ?>