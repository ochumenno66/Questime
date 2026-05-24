<?php
// Переиспользуемая секция Benefits
// Вызов: get_template_part('templates/benefits');

if (!get_field('show_benefits')) {
    return;
}

$benefits_title = get_field('benefits_title') ?: 'Why us?';

// Карточка 1
$b1_icon  = get_field('benefits_1_icon') ?: get_template_directory_uri() . '/assets/icons/benefits/loupe.svg';
$b1_title = get_field('benefits_1_title') ?: 'Deep Historical Research';
$b1_text  = get_field('benefits_1_text') ?: 'We dig deeper than guidebooks — every story is carefully researched and historically accurate';

// Карточка 2
$b2_icon  = get_field('benefits_2_icon') ?: get_template_directory_uri() . '/assets/icons/benefits/lamp.svg';
$b2_title = get_field('benefits_2_title') ?: 'Smart Gamification';
$b2_text  = get_field('benefits_2_text') ?: 'We use elements from board games, RPGs, video games, and escape rooms to create experiences that are strategic, immersive, and fun';

// Карточка 3
$b3_icon  = get_field('benefits_3_icon') ?: get_template_directory_uri() . '/assets/icons/benefits/dart.svg';
$b3_title = get_field('benefits_3_title') ?: 'Cinematic Storytelling';
$b3_text  = get_field('benefits_3_text') ?: 'Our experiences are built like films — with tension, characters, and powerful narrative arcs';

// Кнопка
$benefits_btn_text = get_field('benefits_btn_text') ?: 'Learn More About Us';
$benefits_btn_link = get_field('benefits_btn_link') ?: home_url('/about-us/');
?>

<section class="benefits text-align section-special" id="benefits">
  <div class="container">
    <h2 class="benefits__title">
      <?php echo esc_html($benefits_title); ?>
    </h2>
    <div class="benefits__wrapper">
      <div class="benefits__card">
        <img class="benefits__icon" src="<?php echo esc_url($b1_icon); ?>" alt="<?php echo esc_attr($b1_title); ?>">
        <h3 class="benefits__card-title">
          <?php echo esc_html($b1_title); ?>
        </h3>
        <p class="benefits__card-text">
          <?php echo esc_html($b1_text); ?>
        </p>
      </div>
      <div class="benefits__card">
        <img class="benefits__icon" src="<?php echo esc_url($b2_icon); ?>" alt="<?php echo esc_attr($b2_title); ?>">
        <h3 class="benefits__card-title">
          <?php echo esc_html($b2_title); ?>
        </h3>
        <p class="benefits__card-text">
          <?php echo esc_html($b2_text); ?>
        </p>
      </div>
      <div class="benefits__card">
        <img class="benefits__icon" src="<?php echo esc_url($b3_icon); ?>" alt="<?php echo esc_attr($b3_title); ?>">
        <h3 class="benefits__card-title">
          <?php echo esc_html($b3_title); ?>
        </h3>
        <p class="benefits__card-text">
          <?php echo esc_html($b3_text); ?>
        </p>
      </div>
    </div>

    <?php if (!is_page('about-us')) : ?>
    <a href="<?php echo esc_url($benefits_btn_link); ?>" class="benefits__btn btn btn-secondary btn--orange">
      <?php echo esc_html($benefits_btn_text); ?>
    </a>

    <?php endif; ?>
  </div>
</section>