<?php
/*
Template Name: Team Building
*/

get_header();

$whatsapp       = get_theme_mod('whatsapp_url', 'https://wa.me/31635640923');
$reviews_rating = get_theme_mod('reviews_rating', '4.9');
$reviews_count  = get_theme_mod('reviews_count', '500+');
$reviews_label  = get_theme_mod('reviews_label', 'Google Reviews');
$reviews_url    = get_theme_mod('reviews_url', '');

$tb_hero_bg       = get_field('tb_hero_bg')         ?: get_template_directory_uri() . '/assets/images/team-building/tb-hero.webp';
$tb_tagline       = get_field('tb_hero_tagline')    ?: 'On-site, cafe, outdoor and online';
$tb_accent_text_1 = get_field('tb_hero_accent_1')   ?: 'UNFORGETTABLE';
$tb_text_1        = get_field('tb_hero_text_1')     ?: 'mysteries';
$tb_accent_text_2 = get_field('tb_hero_accent_2')   ?: 'YOUR TEAM';
$tb_text_2        = get_field('tb_hero_text_2')     ?: 'solves';
$tb_accent_text_3 = get_field('tb_hero_accent_3')   ?: 'TOGETHER!';
$tb_subtitle      = get_field('tb_hero_subtitle')   ?: 'for groups of 6–120 people';
$tb_btn_text      = get_field('tb_hero_btn_text')   ?: 'Contact us';
?>

<main>
  <!-- Секция Hero -->
  <section class="hero hero-tb section-special section-decorated-dark" id="hero">
    <div class="hero-tb--img" style=" background:
      linear-gradient(0deg, rgba(25, 26, 24, 0.7), rgba(25, 26, 24, 0.7)),
      linear-gradient(to bottom, #191a18 10%, transparent 72%, #191a18 100%),
      url('<?php echo esc_url($tb_hero_bg); ?>') center / cover no-repeat;">
    </div>
    <div class="hero-tb__wrapper container">
      <?php questime_breadcrumbs(); ?>
      <div class="hero-tb__content text-align">
        <p class="hero-tb__tagline">
          <?php echo esc_html($tb_tagline); ?>
        </p>
        <h1 class="hero-tb__title">
          <span class="hero-tb__accent">
            <?php echo esc_html($tb_accent_text_1); ?>
          </span>
          <?php echo esc_html($tb_text_1); ?><br>
          <span class="hero-tb__accent">
            <?php echo esc_html($tb_accent_text_2); ?>
          </span>
          <?php echo esc_html($tb_text_2); ?>
          <span class="hero-tb__accent">
            <?php echo esc_html($tb_accent_text_3); ?>
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
      <?php
      $reviews_tag = $reviews_url ? 'a' : 'div';
      ?>
      <<?php echo $reviews_tag; ?> class="hero-tb__reviews reviews-badge"
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