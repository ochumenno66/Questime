<?php
/*
Template Name: Team Building
*/

get_header();

$whatsapp       = get_theme_mod('whatsapp_url');
$reviews_rating = get_theme_mod('reviews_rating');
$reviews_count  = get_theme_mod('reviews_count');
$reviews_label  = get_theme_mod('reviews_label');
$reviews_url    = get_theme_mod('reviews_url');

$tb_hero_bg       = get_field('tb_hero_bg');
$tb_hero_tagline  = get_field('tb_hero_tagline');
$tb_hero_title    = get_field('tb_hero_title');
$tb_hero_subtitle = get_field('tb_hero_subtitle');
$tb_btn_text      = get_field('tb_hero_btn_text');
?>

<main>
  <!-- Секция Hero -->
  <section class="hero hero-tb section-special section-decorated-dark" id="hero">
    <?php if ($tb_hero_bg) : ?>
      <div class="hero-tb--img" style="
        background:
        linear-gradient(0deg, rgba(25, 26, 24, 0.7), rgba(25, 26, 24, 0.7)),
        linear-gradient(to bottom, #191a18 10%, transparent 72%, #191a18 100%),
        url('<?php echo esc_url($tb_hero_bg); ?>') center / cover no-repeat;
      ">
      </div>
    <?php endif; ?>
    <div class="hero-tb__wrapper container">
      <?php questime_breadcrumbs(); ?>
      <div class="hero-tb__content text-align">
        <?php if ($tb_hero_tagline) : ?>
          <div class="hero-tb__tagline">
            <?php echo wp_kses_post($tb_hero_tagline); ?>
          </div>
        <?php endif; ?>
        <?php if ($tb_hero_title) : ?>
          <h1 class="hero-tb__title">
            <?php echo wp_kses_post($tb_hero_title); ?>
          </h1>
        <?php endif; ?>
        <?php if ($tb_hero_subtitle) : ?>
          <div class="hero-tb__subtitle">
            <?php echo wp_kses_post($tb_hero_subtitle); ?>
          </div>
        <?php endif; ?>
        <?php if ($tb_btn_text) : ?>
          <div class="hero-tb__actions">
            <a class="btn btn-secondary btn--orange hero-tb__btn open-modal" href="<?php echo esc_url($whatsapp); ?>" target="_blank">
              <?php echo esc_html($tb_btn_text); ?>
            </a>
          </div>
        <?php endif; ?>
        <?php if ($reviews_label || $reviews_rating || $reviews_count) : ?>
          <?php $reviews_tag = $reviews_url ? 'a' : 'div'; ?>
          <<?php echo $reviews_tag; ?> class="hero-tb__reviews reviews-badge"
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
  <!-- Секция Stats -->
  <?php get_template_part('templates/stats'); ?>
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
  <?php get_template_part('templates/contact-form', null, ['type' => 'default']); ?>
  <!-- Секция FAQ -->
  <?php get_template_part('templates/faq'); ?>
</main>

<?php get_footer(); ?>