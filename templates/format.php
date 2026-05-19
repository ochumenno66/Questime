  <?php if (get_field('show_online_format')) : ?>

      <section class="persons format section-special" id="format">

          <div class="container">
              <div class="persons__list">

                  <div class="persons__dot"></div>

                  <div class="persons__item is-open">

                      <button class="persons__question" aria-expanded="true">

                          <img
                              class="persons__icon"
                              src="<?php echo get_template_directory_uri(); ?>/assets/icons/event-page/language-orange.svg"
                              alt="cube"
                              loading="lazy"
                              decoding="async">

                          <?php if (get_field('online_format_title')) : ?>
                              <h4 class="persons__question-text">
                                  <?php the_field('online_format_title'); ?>
                              </h4>
                          <?php endif; ?>

                          <span class="persons__chevron">
                              <svg width="40" height="40" viewBox="0 0 40 40" fill="none">
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

                          <div class="format__content">

                              <div class="format__steps-col">

                                  <?php
                                    for ($i = 1; $i <= 4; $i++) :

                                        $step = get_field("online_step_{$i}");

                                        if ($step) :
                                    ?>

                                          <div class="format__step">
                                              <span class="format__step-num">
                                                  <?php echo $i; ?>
                                              </span>

                                              <p class="format__step-text">
                                                  <?php echo esc_html($step); ?>
                                              </p>
                                          </div>

                                  <?php
                                        endif;
                                    endfor;
                                    ?>

                                  <?php if (get_field('online_extra_step')) : ?>

                                      <div class="format__step">

                                          <span class="format__step-num"></span>

                                          <p class="format__step-text">
                                              <?php the_field('online_extra_step'); ?>
                                          </p>

                                      </div>

                                  <?php endif; ?>

                              </div>

                              <div class="format__finale">

                                  <?php if (get_field('online_finale_label')) : ?>
                                      <span class="format__finale-label">
                                          <?php the_field('online_finale_label'); ?>
                                      </span>
                                  <?php endif; ?>
                                  <div class="format__finale-text">

                                      <?php if (get_field('online_finale_text')) : ?>
                                          <?php the_field('online_finale_text'); ?>
                                      <?php endif; ?>

                                  </div>

                              </div>

                          </div>

                          <?php if (get_field('online_format_btn_text')) : ?>

                              <button
                                  class="btn btn-secondary format__btn"
                                  type="button">
                                  <?php the_field('online_format_btn_text'); ?>
                              </button>

                          <?php endif; ?>

                          <?php
                            $left_photo = get_field('online_photo_left');

                            if ($left_photo) :
                            ?>

                              <div class="format__photo-wrap format__photo-wrap--left">
                                  <img
                                      class="format__photo"
                                      src="<?php echo esc_url($left_photo['url']); ?>"
                                      alt="<?php echo esc_attr($left_photo['alt']); ?>"
                                      loading="lazy">
                              </div>

                          <?php endif; ?>

                          <?php
                            $right_photo = get_field('online_photo_right');

                            if ($right_photo) :
                            ?>

                              <div class="format__photo-wrap format__photo-wrap--right">
                                  <img
                                      class="format__photo"
                                      src="<?php echo esc_url($right_photo['url']); ?>"
                                      alt="<?php echo esc_attr($right_photo['alt']); ?>"
                                      loading="lazy">
                              </div>

                          <?php endif; ?>

                      </div>
                  </div>
              </div>
          </div>
      </section>

  <?php endif; ?>

  <?php if (get_field('show_demo_format')) : ?>

      <section class="persons section-special">

          <div class="container">
              <div class="persons__list">

                  <div class="persons__dot"></div>

                  <div class="persons__item is-open">

                      <button class="persons__question" aria-expanded="true">

                          <img
                              class="persons__icon"
                              src="<?php echo get_template_directory_uri(); ?>/assets/icons/event-page/format-orange.svg"
                              alt="cube"
                              loading="lazy"
                              decoding="async">

                          <?php if (get_field('demo_title')) : ?>
                              <h4 class="persons__question-text demo-text">
                                  <?php the_field('demo_title'); ?>
                              </h4>
                          <?php endif; ?>

                          <span class="persons__chevron">
                              <svg width="40" height="40" viewBox="0 0 40 40" fill="none">
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

                          <?php if (get_field('demo_intro')) : ?>
                              <p class="persons__intro">
                                  <?php the_field('demo_intro'); ?>
                              </p>
                          <?php endif; ?>

                          <?php if (get_field('demo_button')) : ?>

                              <button
                                  class="btn btn-secondary format__btn"
                                  type="button">
                                  <?php the_field('demo_button'); ?>
                              </button>

                          <?php endif; ?>

                      </div>

                  </div>
              </div>
          </div>
      </section>

  <?php endif; ?>