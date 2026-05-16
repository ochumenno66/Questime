<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

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
      <ul class="header-menu">
        <li><a href="<?php echo home_url('/gamified-tours/'); ?>">Gamified Tours</a></li>
        <li><a href="<?php echo home_url('/schedule/'); ?>">Schedule</a></li>
        <li><a href="<?php echo home_url('/#reviews'); ?>">Reviews</a></li>
        <li><a href="https://questime.shop/" target="_blank">Home Mysteries</a></li>
        <li><a href="<?php echo home_url('/custom-games/'); ?>">Custom Games</a></li>
        <li><a href="<?php echo home_url('/about-us/'); ?>">About</a></li>
      </ul>
    </nav>

    <div class="header-socials__wrapper--mobile">
      <?php questime_social_icons(); ?>
    </div>

    <a class="btn-book btn-book--mobile" href="<?php echo home_url('/schedule/'); ?>">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/chat.svg" alt="">
      <span>Contact us</span>
    </a>

    <div class="header__right">
      <div class="header-socials__wrapper">
        <?php questime_social_icons(); ?>
      </div>

      <a class="btn-book btn-book--notmobile" href="<?php echo home_url('/schedule/'); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/chat.svg" alt="">
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
  </div>

  <div class="burger-dropdown" id="burgerDropdown">
    <div class="container">
      <ul class="burger-dropdown__menu">
        <li><a href="<?php echo home_url('/gamified-tours/'); ?>">Gamified Tours</a></li>
        <li><a href="<?php echo home_url('/schedule/'); ?>">Schedule</a></li>
        <li><a href="<?php echo home_url('/#reviews'); ?>">Reviews</a></li>
        <li><a href="https://questime.shop/" target="_blank">Home Mysteries</a></li>
        <li><a href="<?php echo home_url('/custom-games/'); ?>">Custom Games</a></li>
        <li><a href="<?php echo home_url('/about-us/'); ?>">About</a></li>
      </ul>
    </div>
  </div>
</header>

<div class="mobile-overlay" id="mobileOverlay"></div>
<div class="mobile-menu" id="mobileMenu">
  <nav class="mobile-menu__nav">
    <ul>
      <li><a href="<?php echo home_url('/gamified-tours/'); ?>">Gamified Tours</a></li>
      <li><a href="<?php echo home_url('/schedule/'); ?>">Schedule</a></li>
        <li><a href="<?php echo home_url('/#reviews'); ?>">Reviews</a></li>
        <li><a href="https://questime.shop/" target="_blank">Home Mysteries</a></li>
        <li><a href="<?php echo home_url('/custom-games/'); ?>">Custom Games</a></li>
        <li><a href="<?php echo home_url('/about-us/'); ?>">About</a></li>
    </ul>
  </nav>
  <div class="mobile-menu__footer">
    <div class="mobile-menu__socials">
      <?php questime_social_icons(); ?>
    </div>
    <a class="btn-book" href="<?php echo home_url('/schedule/'); ?>">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/chat.svg" alt="">
      <span>Contact us</span>
    </a>
  </div>
</div>