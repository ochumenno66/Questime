<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php
$whatsapp = get_theme_mod('whatsapp_url', 'https://wa.me/31635640923');
?>

<header id="header" class="header <?php echo (is_product() || is_singular('quest_case') || is_404()) ? 'decorated-dark-header' : ''; ?>">
  <div class="header__wrapper container">
    <?php if (has_custom_logo()) : ?>
      <?php the_custom_logo(); ?>
    <?php else : ?>
      <a href="<?php echo home_url('/'); ?>" class="logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/logo.svg" alt="logo" />
      </a>
    <?php endif; ?>

    <nav class="header-nav">
      <?php
      wp_nav_menu([
        'theme_location' => 'primary',
        'menu_class'     => 'header-menu',
        'container'      => false,
        'fallback_cb'    => function() {
          // Фоллбэк если меню не назначено
          echo '<ul class="header-menu">';
          echo '<li><a href="' . home_url('/gamified-tours/') . '">Gamified Tours</a></li>';
          echo '<li><a href="' . home_url('/team-building/') . '">Corporate Events</a></li>';
          echo '<li><a href="https://questime.shop/" target="_blank">Home Mysteries</a></li>';
          echo '<li><a href="' . home_url('/custom-games/') . '">Custom Games</a></li>';
          echo '<li><a href="' . home_url('/about-us/') . '">About</a></li>';
          echo '</ul>';
        },
      ]);
      ?>
    </nav>

    <div class="header-socials__wrapper--mobile">
      <?php questime_social_icons(); ?>
    </div>

    <div class="header__right">
      <div class="header-socials__wrapper">
        <?php questime_social_icons(); ?>
      </div>

      <div class="header-buttons__wrapper">
        <!-- Кнопка Schedule -->
        <a class="btn-book btn-book--schedule btn-book--notmobile" href="<?php echo home_url('/schedule/'); ?>">
          <span>Schedule</span>
        </a>

        <!-- Кнопка Contact us → WhatsApp -->
        <a class="btn-book btn-book--notmobile" href="<?php echo esc_url($whatsapp); ?>" target="_blank" rel="noopener noreferrer">
          <span>Contact us</span>
        </a>

      </div>

      
    </div>
    <!-- Кнопки мобильные -->
    <a class="btn-book btn-book--mobile" href="<?php echo esc_url($whatsapp); ?>" target="_blank" rel="noopener noreferrer">
      <span>Contact us</span>
    </a>

    <button class="burger-btn" id="burgerBtn" aria-label="Menu" aria-expanded="false">
      <span class="burger-icon">
        <span></span>
        <span></span>
        <span></span>
      </span>
    </button>
  </div>

  <div class="burger-dropdown" id="burgerDropdown">
    <div class="container">
      <?php
      wp_nav_menu([
        'theme_location' => 'primary',
        'menu_class'     => 'burger-dropdown__menu',
        'container'      => false,
        'fallback_cb'    => function() use ($whatsapp) {
          echo '<ul class="burger-dropdown__menu">';
          echo '<li><a href="' . home_url('/gamified-tours/') . '">Gamified Tours</a></li>';
          echo '<li><a href="' . home_url('/team-building/') . '">Corporate Events</a></li>';
          echo '<li><a href="https://questime.shop/" target="_blank">Home Mysteries</a></li>';
          echo '<li><a href="' . home_url('/custom-games/') . '">Custom Games</a></li>';
          echo '<li><a href="' . home_url('/about-us/') . '">About</a></li>';
          echo '</ul>';
        },
      ]);
      ?>
    </div>
  </div>
</header>

<div class="mobile-overlay" id="mobileOverlay"></div>
<div class="mobile-menu" id="mobileMenu">
  <nav class="mobile-menu__nav">
    <?php
    wp_nav_menu([
      'theme_location' => 'primary',
      'container'      => false,
      'fallback_cb'    => function() use ($whatsapp) {
        echo '<ul>';
        echo '<li><a href="' . home_url('/gamified-tours/') . '">Gamified Tours</a></li>';
        echo '<li><a href="' . home_url('/team-building/') . '">Corporate Events</a></li>';
        echo '<li><a href="https://questime.shop/" target="_blank">Home Mysteries</a></li>';
        echo '<li><a href="' . home_url('/custom-games/') . '">Custom Games</a></li>';
        echo '<li><a href="' . home_url('/about-us/') . '">About</a></li>';
        echo '<li><a href="' . home_url('/schedule/') . '">Schedule</a></li>';
        echo '</ul>';
      },
    ]);
    ?>
  </nav>
  <div class="mobile-menu__footer">
    <div class="mobile-menu__socials">
      <?php questime_social_icons(); ?>
    </div>
    <a class="btn-book" href="<?php echo esc_url($whatsapp); ?>" target="_blank" rel="noopener noreferrer">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/chat.svg" alt="">
      <span>Contact us</span>
    </a>
  </div>
</div>