<?php
/*
Template Name: Event page
*/

$route_enabled     = get_field('route_enabled');
$route_text_before = get_field('route_text_before') ?: '';
$route_text_after  = get_field('route_text_after')  ?: '';

$route_points = [];
for ($i = 1; $i <= 10; $i++) {
  $label = get_field("route_point_{$i}_label") ?: '';
  $lat   = get_field("route_point_{$i}_lat")   ?: '';
  $lng   = get_field("route_point_{$i}_lng")   ?: '';
  $desc  = get_field("route_point_{$i}_desc")  ?: '';

  if (empty($lat) || empty($lng)) {
    continue;
  }

  $route_points[] = [
    'label' => $label ?: "Point {$i}",
    'lat'   => (float) $lat,
    'lng'   => (float) $lng,
    'desc'  => $desc,
  ];
}

// Передаём данные карты в JS
add_action('wp_footer', function () use ($route_points) {
  if (!empty($route_points)) {
    echo '<script>window.routePointsData = ' . wp_json_encode($route_points) . ';</script>';
  }
}, 1);

get_header(); ?>

<main>
  <!-- Секция Hero -->
  <?php get_template_part('templates/hero-case-product'); ?>
  <!-- Секция Gallery -->
  <?php get_template_part('templates/gallery'); ?>
  <!-- Секция Experience -->
  <?php get_template_part('templates/experience'); ?>
  <!-- Секция Route -->
  <?php if ($route_enabled && !empty($route_points)) : ?>
    <section class="route section-special" id="route">
      <h2 class="route__title text-align">Route</h2>
      <div class="route__body container">

        <div class="route__points-wrap">
          <?php if ($route_text_before) : ?>
            <p class="route__text route__text--before">
              <?php echo wp_kses_post($route_text_before); ?>
            </p>
          <?php endif; ?>

          <div class="route__points" id="routePointList"></div>

          <?php if ($route_text_after) : ?>
            <p class="route__text route__text--after">
              <?php echo wp_kses_post($route_text_after); ?>
            </p>
          <?php endif; ?>
        </div>

        <div class="route__map">
          <div id="map"></div>
        </div>
      </div>
    </section>
  <?php endif; ?>
  <!-- Секция Video -->
  <?php get_template_part('templates/video-banner'); ?>
  <!-- Секция Persons -->
  <?php if (get_field('show_persons_section')) : ?>

    <section class="persons section-special" id="persons">
      <div class="container">
        <div class="persons__list">

          <div class="persons__dot"></div>

          <div class="persons__item">

            <button class="persons__question" aria-expanded="true">

              <img
                class="persons__icon"
                src="<?php echo get_template_directory_uri(); ?>/assets/icons/event-page/person-orange.svg"
                alt="person"
                loading="lazy"
                decoding="async">

              <?php if (get_field('persons_title')) : ?>
                <h4 class="persons__question-text">
                  <?php the_field('persons_title'); ?>
                </h4>
              <?php endif; ?>

              <span class="persons__chevron">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M31.6663 15L19.9997 25L8.33301 15"
                    stroke="#191A18"
                    stroke-width="2.5"
                    stroke-linecap="round"
                    stroke-linejoin="round" />
                </svg>
              </span>

            </button>

            <div class="persons__answer">

              <?php if (get_field('persons_intro')) : ?>
                <p class="persons__intro">
                  <?php the_field('persons_intro'); ?>
                </p>
              <?php endif; ?>

              <div class="persons__rows">

                <?php
                for ($i = 1; $i <= 30; $i++) :

                  $name = get_field("person_{$i}_name");
                  $desc = get_field("person_{$i}_desc");

                  if ($name || $desc) :
                ?>

                    <div class="persons__row">

                      <?php if ($name) : ?>
                        <span class="persons__name">
                          <?php echo esc_html($name); ?>
                        </span>
                      <?php endif; ?>

                      <?php if ($desc) : ?>
                        <span class="persons__desc">
                          <?php echo esc_html($desc); ?>
                        </span>
                      <?php endif; ?>

                    </div>

                <?php
                  endif;
                endfor;
                ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  <?php endif; ?>
  <!-- Секция Testimonials -->
  <?php get_template_part('templates/testimonials'); ?>
  <!-- Секция Format -->
  <?php get_template_part('templates/format'); ?>
  <!-- Секция Benefits -->
  <?php get_template_part('templates/benefits'); ?>
  <!-- Секция CTA -->
  <?php get_template_part('templates/cta'); ?>
  <!-- Секция Quests -->
  <?php get_template_part('templates/quests'); ?>
  <!-- Секция Form -->
  <?php get_template_part('templates/contact-form', null, ['type' => 'default']); ?>
</main>

<?php get_footer(); ?>