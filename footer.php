<footer class="footer section-decorated-light">
  <div class="footer__wrapper container">
    <?php if (has_custom_logo()) : ?>
      <?php the_custom_logo(); ?>
    <?php else : ?>
      <a href="<?php echo home_url('/'); ?>" class="logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/logo.svg" alt="logo" />
      </a>
    <?php endif; ?>

    <nav class="footer-nav">
      <?php
      wp_nav_menu([
        'theme_location' => 'footer',
        'menu_class'     => 'footer-menu',
        'container'      => false,
        'fallback_cb'    => function() {
          echo '<ul class="footer-menu">';
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

    <div class="footer-socials__wrapper">
      <?php questime_social_icons(); ?>
    </div>
  </div>

  <!-- Нижняя строка: Privacy Policy + Copyright -->
  <div class="footer__bottom">
      <div class="footer-bottom__wrapper container">
      <a href="<?php echo get_permalink(get_page_by_path('privacy-policy')); ?>" class="footer__privacy">
        Privacy Policy
      </a>
      <span class="footer__copyright">© <?php echo date('Y'); ?> Questime. All rights reserved.</span>
    </div>
  </div>
    
</footer>

<button class="scroll-top" id="scrollTop">↑</button>

<?php wp_footer(); ?>
<?php get_template_part('templates/modal'); ?>
<?php get_template_part('templates/cookie-banner'); ?>
</body>
</html>