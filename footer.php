<footer class="footer section-decorated-light">
  <div class="footer__wrapper container">
    <a href="<?php echo home_url('/'); ?>" class="logo">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/logo.svg" alt="logo" />
    </a>

    <nav class="footer-nav">
      <ul class="footer-menu">
        <li><a href="<?php echo home_url('/page-gamified-tours/'); ?>">Gamified Tours</a></li>
        <li><a href="<?php echo home_url('/schedule/'); ?>">Schedule</a></li>
        <li><a href="#reviews">Reviews</a></li>
        <li><a href="https://questime.shop/" target="_blank">Home Mysteries</a></li>
        <li><a href="<?php echo home_url('/custom-games/'); ?>">Custom Games</a></li>
        <li><a href="<?php echo home_url('/about-us/'); ?>">About</a></li>
      </ul>
    </nav>

    <div class="footer-socials__wrapper">
      <a class="social-icon" href="#" target="_blank">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/logo_linkedin.svg" alt="linkedin">
      </a>
      <a class="social-icon" href="#" target="_blank">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/logo_threads.svg" alt="threads">
      </a>
      <a class="social-icon" href="#" target="_blank">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/logo_instagram.svg" alt="instagram">
      </a>
    </div>
  </div>
</footer>

<button class="scroll-top" id="scrollTop">↑</button>

<?php wp_footer(); ?>
</body>
</html>