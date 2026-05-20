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
      <ul class="footer-menu">
        <li><a href="<?php echo home_url('/page-gamified-tours/'); ?>">Gamified Tours</a></li>
        <li><a href="<?php echo home_url('/schedule/'); ?>">Schedule</a></li>
        <li><a href="<?php echo home_url('/#reviews'); ?>">Reviews</a></li>
        <li><a href="https://questime.shop/" target="_blank">Home Mysteries</a></li>
        <li><a href="<?php echo home_url('/custom-games/'); ?>">Custom Games</a></li>
        <li><a href="<?php echo home_url('/about-us/'); ?>">About</a></li>
      </ul>
    </nav>

    <div class="footer-socials__wrapper">
      <?php questime_social_icons(); ?>
    </div>
  </div>
</footer>

<button class="scroll-top" id="scrollTop">↑</button>

<?php wp_footer(); ?>
<?php get_template_part('templates/modal'); ?>
<?php get_template_part('templates/cookie-banner'); ?>
</body>
</html>