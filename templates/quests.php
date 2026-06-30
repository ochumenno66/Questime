<?php
/**
 * Template Part: Quests slider
 *
 * Контекст (передаётся через get_template_part 3-м аргументом):
 *   category  (string)  — slug категории product_cat для фильтрации.
 *                         Если не передан — показывает gamified-tours.
 *                         Если передан 'related' — режим "You may also like":
 *                         показывает товары из ACF-поля quests_related_products
 *                         текущего товара.
 *
 * Примеры вызова:
 *   get_template_part('templates/quests');                                            // gamified-tours (дефолт)
 *   get_template_part('templates/quests', null, ['category' => 'gamified-tours']);   // явно gamified-tours
 *   get_template_part('templates/quests', null, ['category' => 'corporate-events']); // corporate events
 *   get_template_part('templates/quests', null, ['category' => 'related']);          // You may also like
 */

$_ctx        = isset($args) && is_array($args) ? $args : [];
$_category   = isset($_ctx['category']) ? $_ctx['category'] : 'gamified-tours';
$_is_related = ($_category === 'related');
$_is_home    = ($_category === 'home');

// --- Вспомогательная функция: есть ли у товара активная будущая экскурсия ---
if (!function_exists('_questime_product_has_active_tour')) {
    function _questime_product_has_active_tour(int $product_id): bool {
        $tours = get_posts([
            'post_type'      => 'tour',
            'post_status'    => 'publish',
            'posts_per_page' => 1,
            'meta_query'     => [['key' => 'tour_product', 'value' => $product_id]],
        ]);
        if (empty($tours)) return false;
        // Проверяем, что хотя бы одна экскурсия в будущем
        $now = new DateTime('now', new DateTimeZone('Europe/Amsterdam'));
        foreach ($tours as $t) {
            $date_str = (string) get_field('tour_date', $t->ID);
            if (!$date_str) continue;
            $dt = function_exists('tour_parse_date') ? tour_parse_date($date_str) : DateTime::createFromFormat('d.m.Y', $date_str);
            if ($dt && $dt >= $now) return true;
        }
        return false;
    }
}

// --- Заголовок секции ---
if ($_is_related) {
    $section_heading = get_field('quests_related_heading') ?: 'You may also like';
} elseif ($_is_home) {
    $section_heading = get_field('home_quests_heading', 'option') ?: (get_field('home_quests_heading') ?: '');
} else {
    $section_heading = get_field('quests_heading') ?: '';
}

// --- Кнопки ---
$btn_schedule    = get_field('quest_btn_schedule_text') ?: 'View Schedule';
$schedule_link   = get_field('quest_btn_schedule_link') ?: home_url('/schedule/');
$btn_book        = get_field('quest_btn_book_text') ?: 'Book a Private Tour';
$btn_learn       = get_field('quest_btn_learn_text') ?: 'Learn more';

// --- Список товаров ---
if ($_is_related) {
    // Режим "You may also like": берём товары из ACF relationship/post_object поля
    $related_raw = get_field('quests_related_products'); // возвращает массив WP_Post или ID
    $quest_posts = [];
    if (!empty($related_raw) && is_array($related_raw)) {
        foreach ($related_raw as $item) {
            $quest_posts[] = is_object($item) ? $item : get_post((int)$item);
        }
        $quest_posts = array_filter($quest_posts);
    }
    $has_posts = !empty($quest_posts);
} elseif ($_is_home) {
    $home_raw = get_field('home_quests_products', get_the_ID());
    $quest_posts = [];
    if (!empty($home_raw) && is_array($home_raw)) {
        foreach ($home_raw as $item) {
            $quest_posts[] = is_object($item) ? $item : get_post((int)$item);
        }
        $quest_posts = array_filter($quest_posts);
    }
    $has_posts = !empty($quest_posts);
} else {
    // Режим по категории
    $quests_query = new WP_Query([
        'post_type'      => 'product',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'tax_query'      => [[
            'taxonomy' => 'product_cat',
            'field'    => 'slug',
            'terms'    => $_category,
        ]],
        'orderby' => 'menu_order',
        'order'   => 'ASC',
    ]);
    $quest_posts = $quests_query->have_posts() ? $quests_query->posts : [];
    $has_posts   = !empty($quest_posts);
}
?>

<section class="quests section-special" id="quests">
    <div class="container">
        <?php if ($section_heading) : ?>
            <h2 class="text-align">
                <?php echo esc_html($section_heading); ?>
            </h2>
        <?php endif; ?>
        <div class="quests__slider-wrap">
            <div class="swiper quests__slider">
                <div class="swiper-wrapper">

                    <?php if ($has_posts) :
                        // Если запрос через WP_Query — нужно перебрать через loop
                        // Если related — у нас уже массив WP_Post
                        if (!$_is_related && !$_is_home) {
                            // Сбросим query и будем использовать posts напрямую
                            wp_reset_postdata();
                        }

                        foreach ($quest_posts as $quest_post) :
                            $post_id       = $quest_post->ID;
                            $product       = wc_get_product($post_id);
                            if (!$product) continue;

                            $title         = get_the_title($post_id);
                            $description   = get_the_excerpt($post_id) ?: wp_trim_words(get_post_field('post_content', $post_id), 30);
                            $url           = get_permalink($post_id);
                            $thumbnail_url = get_the_post_thumbnail_url($post_id, 'large')
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

                            // Показывать ли кнопку View Schedule
                            $show_schedule_btn = _questime_product_has_active_tour($post_id);
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
                                <?php if ($show_schedule_btn) :
                                    $link_url    = is_array($schedule_link) ? $schedule_link['url'] : $schedule_link;
                                    $link_target = is_array($schedule_link) && !empty($schedule_link['target']) ? $schedule_link['target'] : '_self';
                                ?>
                                    <a
                                        href="<?php echo esc_url($link_url); ?>"
                                        class="btn btn-card quest-card__btn-schedule btn--orange"
                                        target="<?php echo esc_attr($link_target); ?>">
                                        <?php echo esc_html($btn_schedule); ?>
                                    </a>
                                <?php endif; ?>
                                <button
                                    type="button"
                                    class="btn btn-card quest-card__btn-book open-modal" data-modal-open
                                    data-modal="request">
                                    <?php echo esc_html($btn_book); ?>
                                </button>
                            </div>
                        </article>

                    <?php
                        endforeach;
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
