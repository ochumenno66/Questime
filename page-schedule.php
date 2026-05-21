<?php
/*
Template Name: Schedule
*/

get_header(); ?>

<main>
  <section class="schedule section-special">
    <div class="container">
      <!-- Хлебные крошки — автоматические -->
      <?php questime_breadcrumbs(); ?>

      <?php
      // Получаем экскурсии, сгруппированные по месяцам
      // Функция tour_get_by_months() определена в inc/functions-tours.php
      $months      = function_exists('tour_get_by_months') ? tour_get_by_months() : [];
      $months_keys = array_keys($months);

      $month_names = [
        '01' => 'January',
        '02' => 'February',
        '03' => 'March',
        '04' => 'April',
        '05' => 'May',
        '06' => 'June',
        '07' => 'July',
        '08' => 'August',
        '09' => 'September',
        '10' => 'October',
        '11' => 'November',
        '12' => 'December',
      ];

      $day_names = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
      ?>

      <?php if (! empty($months)) :
        // Год берём из первого месяца
        $first_key = $months_keys[0];           // формат "YYYY-MM"
        $current_year = substr($first_key, 0, 4);
      ?>

        <span class="schedule__year"><?= esc_html($current_year) ?></span>

        <!-- Вкладки месяцев -->
        <div class="schedule__months" role="tablist" aria-label="Month selector">

          <?php foreach ($months as $key => $month) :
            $is_active  = ($key === $months_keys[0]);
            $month_label = $month['short'];
          ?>
            <button
              class="btn schedule__month-btn <?= $is_active ? 'is-active' : '' ?>"
              role="tab"
              aria-selected="<?= $is_active ? 'true' : 'false' ?>"
              aria-controls="month-<?= esc_attr($key) ?>"
              data-month="<?= esc_attr($key) ?>">
              <?= esc_html($month_label) ?>
            </button>
          <?php endforeach; ?>
        </div>

        <!-- Панели с экскурсиями по месяцам -->
        <?php foreach ($months as $key => $month) :
          $is_active = ($key === $months_keys[0]);
        ?>
          <div
            class="schedule__list <?= $is_active ? '' : 'is-hidden' ?>"
            id="month-<?= esc_attr($key) ?>"
            role="list">
            <?php foreach ($month['tours'] as $i => $tour) :

              // --- Данные из ACF ---
              $date_str   = (string) get_field('tour_date', $tour->ID);    // формат d.m.Y
              $time_start = get_field('tour_time', $tour->ID);             // "13:00"
              $duration   = (float) get_field('tour_duration', $tour->ID); // часы: 2.5
              $product_id = (int) get_field('tour_wc_product_id', $tour->ID);

              // --- Вычисляем дату ---
              $dt       = function_exists('tour_parse_date') ? tour_parse_date($date_str) : null;
              $day_num  = $dt ? $dt->format('j')                   : '—';
              $day_name = $dt ? $day_names[(int)$dt->format('w')]  : '';

              // --- Время окончания ---
              $time_end = '';
              if ($time_start && $duration) {
                $end_ts   = strtotime($time_start) + (int)($duration * 3600);
                $time_end = date('H:i', $end_ts);
              }
              $time_range = $time_start
                ? ($time_end ? "{$time_start} – {$time_end}" : $time_start)
                : '';

              // --- Цена и места ---
              $price_info = function_exists('tour_get_price_info') ? tour_get_price_info($tour->ID) : null;
              $seats_info = function_exists('tour_get_seats_info') ? tour_get_seats_info($tour->ID) : null;

              $sold_out = $seats_info['sold_out'] ?? false;
              $few_left = $seats_info['few_left'] ?? false;
              $discount = $price_info['discount']    ?? false;
              $price    = $price_info['final_price'] ?? 0;
              $price_old = $price_info['base_price'] ?? 0;

              // --- Ссылка "купить" ---
              $buy_url = ($product_id && class_exists('WooCommerce'))
                ? add_query_arg(['add-to-cart' => $product_id], wc_get_cart_url())
                : get_permalink($tour->ID);

              // --- Миниатюра ---
              $thumb_url = get_the_post_thumbnail_url($tour->ID, 'medium');

              // --- Чередование цвета карточки (оранжевая — каждая чётная) ---
              $is_orange = ($i % 2 === 1);

              // --- Описание ---
              $excerpt = get_the_excerpt($tour->ID);

              // --- Ссылка на страницу экскурсии ---
              $tour_url = get_permalink($tour->ID);
            ?>

              <article class="schedule__event-wrapper" role="listitem">
                <div class="schedule__event <?= $is_orange ? 'schedule__event--orange' : '' ?>">

                  <!-- Дата и время -->
                  <div class="schedule__date-wrapper">
                    <div class="schedule__date">
                      <span class="schedule__date-num"><?= esc_html($day_num) ?></span>
                      <span class="schedule__date-day"><?= esc_html($day_name) ?></span>
                    </div>
                    <?php if ($time_range) : ?>
                      <div class="schedule__time"><?= esc_html($time_range) ?></div>
                    <?php endif; ?>
                  </div>

                  <!-- Название и подзаголовок -->
                  <div class="schedule__title-col">
                    <a href="<?= esc_url($tour_url) ?>" class="schedule__quest-title">
                      <?= esc_html($tour->post_title) ?>
                    </a>
                    <?php
                    // Подзаголовок — из поля ACF "tour_subtitle", или пустой
                    $subtitle = get_field('tour_subtitle', $tour->ID);
                    if ($subtitle) :
                    ?>
                      <span class="schedule__quest-subtitle"><?= esc_html($subtitle) ?></span>
                    <?php endif; ?>
                  </div>

                  <!-- Описание и цена -->
                  <div class="schedule__desc-col">
                    <?php if ($excerpt) : ?>
                      <p class="schedule__desc-text"><?= esc_html($excerpt) ?></p>
                    <?php endif; ?>

                    <div class="schedule__price-wrapper">

                      <?php if ($sold_out) : ?>
                        <!-- Мест нет -->
                        <span class="schedule__badge schedule__badge--sold">sold out</span>

                      <?php else : ?>

                        <?php if ($discount) : ?>
                          <span class="schedule__badge schedule__badge--early">
                            early booking −<?= (int)($price_info['discount_pct'] ?? 10) ?>%
                          </span>
                        <?php elseif ($few_left) : ?>
                          <span class="schedule__badge schedule__badge--few">few spots left</span>
                        <?php endif; ?>

                        <div class="schedule__price-row">
                          <?php if ($discount && $price_old > $price) : ?>
                            <span class="schedule__price-old">
                              <?= number_format($price_old, 0, '.', ' ') ?> €
                            </span>
                          <?php endif; ?>
                          <span class="schedule__price">
                            <?= number_format($price, 0, '.', ' ') ?> €
                          </span>
                          <a href="<?= esc_url($buy_url) ?>" class="btn schedule__buy-btn">
                            Buy ticket
                          </a>
                        </div>

                      <?php endif; ?>

                    </div>
                  </div>

                  <!-- Фото -->
                  <?php if ($thumb_url) : ?>
                    <div class="schedule__photo-wrap">
                      <img
                        class="schedule__photo"
                        src="<?= esc_url($thumb_url) ?>"
                        alt="<?= esc_attr($tour->post_title) ?>"
                        loading="lazy" />
                    </div>
                  <?php endif; ?>

                </div>
              </article>

            <?php endforeach; ?>
          </div>

        <?php endforeach; ?>

      <?php else : ?>
        <p class="schedule__empty">No upcoming tours. Stay tuned!</p>
      <?php endif; ?>

    </div>
  </section>
</main>

<?php get_footer(); ?>