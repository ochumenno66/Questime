<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>404 — Page not found</title>

    <?php wp_head(); ?>
</head>
<body <?php body_class('page-404 bg-bokeh'); ?>>
    <?php get_header(); ?>
    <main>
      <section class="page-404">
        <div class="page-404__image-wrapper">
          <picture>
            <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/404-mobile.webp" media="(max-width: 768px)"/>
            <img class="page-404__image" src="<?php echo get_template_directory_uri(); ?>/assets/images/404.webp" alt="404 illustration"/>
          </picture>
          <div class="page-404__overlay">
            <h2 class="page-404__title">It seems that an error has occurred...</h2>
            <a href="<?php echo home_url(); ?>" class="btn btn-secondary btn--orange page-404__btn">Go to homepage</a>
          </div>
        </div>
      </section>
    </main>

    <?php get_footer(); ?>
  </body>
</html>