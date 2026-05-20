  <section class="quests section-special" id="quests">
      <div class="container">
          <?php if (get_field('quests_heading')) : ?>
              <h2 class="text-align">
                  <?php the_field('quests_heading'); ?>
              </h2>
          <?php endif; ?>
          <div class="quests__slider-wrap">
              <div class="swiper quests__slider">
                  <div class="swiper-wrapper">

                      <?php
                        $btn_schedule = get_field('quest_btn_schedule_text') ?: 'View Schedule';
                        $schedule_link = get_field('quest_btn_schedule_link');

                        $btn_book = get_field('quest_btn_book_text') ?: 'Book a Private Tour';
                        $btn_learn = get_field('quest_btn_learn_text') ?: 'Learn more';

                        $quests = new WP_Query([
                            'post_type'      => 'product',
                            'posts_per_page' => -1,
                            'post_status'    => 'publish',
                            'tax_query'      => [[
                                'taxonomy' => 'product_cat',
                                'field'    => 'slug',
                                'terms'    => 'gamified-tours',
                            ]],
                            'orderby' => 'menu_order',
                            'order'   => 'ASC',
                        ]);

                        if ($quests->have_posts()) :
                            while ($quests->have_posts()) :
                                $quests->the_post();

                                $product       = wc_get_product(get_the_ID());
                                $title         = get_the_title();
                                $description   = get_the_excerpt() ?: wp_trim_words(get_the_content(), 30);
                                $url           = get_permalink();
                                $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'large')
                                    ?: get_template_directory_uri() . '/assets/images/quests/quests-1.webp';

                                $tags = [];
                                $attributes = $product->get_attributes();

                                uasort($attributes, function ($a, $b) {
                                    return $a->get_position() <=> $b->get_position();
                                });

                                foreach ($attributes as $attribute) {
                                    if (!$attribute->is_taxonomy()) {
                                        $tags[] = $attribute->get_name();
                                    }
                                }
                        ?>

                              <article class="quest-card swiper-slide">
                                  <div class="quest-card__top">
                                      <div class="quest-card__image-wrap">
                                          <div class="quest-card__image">
                                              <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($title); ?>" loading="lazy" />
                                              <span class="quest-card__image-corner"></span>
                                          </div>
                                      </div>
                                      <div class="quest-card__top-text">
                                          <?php if (!empty($tags)) : ?>
                                              <div class="quest-card__tags">
                                                  <?php foreach ($tags as $tag) : ?>
                                                      <span class="quest-card__tag"><?php echo esc_html($tag); ?></span>
                                                  <?php endforeach; ?>
                                              </div>
                                          <?php endif; ?>
                                          <h4 class="quest-card__title"><?php echo esc_html($title); ?></h4>
                                      </div>
                                  </div>

                                  <div class="quest-card__desc-wrap">
                                      <p class="quest-card__desc"><?php echo wp_kses_post($description); ?></p>

                                      <a href="<?php echo esc_url($url); ?>" class="btn btn-card quest-card__btn-learn">
                                          <?php echo esc_html($btn_learn); ?>
                                          <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                              <path d="M4.5 2.5L7.5 6L4.5 9.5" stroke="#D75300" stroke-width="0.5" stroke-linecap="round" stroke-linejoin="round" />
                                          </svg>
                                      </a>
                                  </div>

                                  <div class="quest-card__actions">
                                      <?php if ($schedule_link) : ?>
                                          <a
                                              href="<?php echo esc_url($schedule_link['url']); ?>"
                                              class="btn btn-card quest-card__btn-schedule btn--orange"
                                              target="<?php echo esc_attr($schedule_link['target'] ?: '_self'); ?>">
                                              <?php echo esc_html($btn_schedule); ?>
                                          </a>
                                      <?php endif; ?>
                                      <button
                                          type="button"
                                          class="btn btn-card quest-card__btn-book"
                                          data-modal="request">
                                          <?php echo esc_html($btn_book); ?>
                                      </button>
                                  </div>
                              </article>

                          <?php
                            endwhile;
                            wp_reset_postdata();
                        else : ?>
                          <p class="quests__empty">Квесты скоро появятся!</p>
                      <?php endif; ?>

                  </div>
              </div>
              <div class="quests__nav">
                  <button class="quests__nav-btn quests__btn-prev" aria-label="previous"></button>
                  <div class="quests__pagination"></div>
                  <button class="quests__nav-btn quests__btn-next" aria-label="next"></button>
              </div>
          </div>
      </div>
  </section>