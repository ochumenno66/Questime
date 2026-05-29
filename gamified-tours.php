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
$gt_hero_title    = get_field('gt_hero_title');
$gt_hero_subtitle = get_field('gt_hero_subtitle');
$gt_btn_1_text    = get_field('gt_hero_btn_1_text');
$gt_btn_2_text    = get_field('gt_hero_btn_2_text');

// Блок - CTA_GUIDE
$gt_guide_bg       = get_field('gt_guide_bg')       ?: get_template_directory_uri() . '/assets/images/gamifiedTours/cta-GT.webp';
$gt_guide_content  = get_field('gt_guide_content');
$gt_guide_content = $gt_guide_content ?: '
<p>
  We’ve created
  <span class="text-orange--guide">a free Family Guide</span>
  to Amsterdam — so there are
  <span class="text-orange--guide">no "I’m bored"</span>
  moments on your trip.
</p>
';
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
        url('<?php echo esc_url($gt_hero_bg); ?>') center / cover no-repeat;
        ">
      </div>
    <?php endif; ?>
    <div class="hero-gt__wrapper container">
      <?php questime_breadcrumbs(); ?>
      <div class="hero-gt__content text-align">
        <?php if ($gt_hero_title) : ?>
          <h1 class="hero-gt__title">
            <?php echo wp_kses_post($gt_hero_title); ?>
          </h1>
        <?php endif; ?>
        <?php if ($gt_hero_subtitle) : ?>
          <div class="hero-gt__subtitle">
            <?php echo wp_kses_post($gt_hero_subtitle); ?>
          </div>
        <?php endif; ?>
        <?php if ($gt_btn_1_text || $gt_btn_2_text) : ?>
          <div class="hero-gt__actions">
            <?php if ($gt_btn_1_text) : ?>
              <a class="btn btn-secondary btn--orange hero-gt__btn" href="<?php echo esc_url(home_url('/schedule/')); ?>">
                <?php echo esc_html($gt_btn_1_text); ?>
              </a>
            <?php endif; ?>
            <?php if ($gt_btn_2_text) : ?>
              <button class="btn btn-secondary btn--transparent hero-gt__btn open-modal" type="button" data-modal-open>
                <?php echo esc_html($gt_btn_2_text); ?>
              </button>
            <?php endif; ?>
          </div>
        <?php endif; ?>
        <?php if ($reviews_label || $reviews_rating || $reviews_count) : ?>
          <?php $reviews_tag = $reviews_url ? 'a' : 'div'; ?>
          <<?php echo $reviews_tag; ?> class="hero-gt__reviews reviews-badge"
            <?php if ($reviews_url) : ?>
            href="<?php echo esc_url($reviews_url); ?>"
            <?php endif; ?>>
            <?php if ($reviews_label) : ?>
              <span class="reviews-badge__label">
                <?php echo esc_html($reviews_label); ?>
              </span>
            <?php endif; ?>
            <?php if ($reviews_rating || $reviews_count) : ?>
              <span class="reviews-badge__stars" aria-label="<?php echo esc_attr($reviews_rating); ?> out of 5 stars">
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
      </div>
    </div>
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
          <h2 class="cta-guide__text wysiwyg-content">
            <?php echo wp_kses_post($gt_guide_content); ?>
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