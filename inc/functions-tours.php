<?php

/**
 * РАСПИСАНИЕ ЭКСКУРСИЙ

 * Принцип: один товар WooCommerce = один квест.

 * Цена берётся из экскурсии и подставляется в корзину динамически.
 * Товар в WooCommerce имеет цену 0 — реальная цена берётся из экскурсии.
 */

if (!defined('ABSPATH')) exit;



// 1. РЕГИСТРАЦИЯ CPT "tour"


add_action('init', 'register_tour_post_type');
function register_tour_post_type()
{
    register_post_type('tour', [
        'labels' => [
            'name'               => 'Экскурсии',
            'singular_name'      => 'Экскурсия',
            'add_new'            => 'Добавить экскурсию',
            'add_new_item'       => 'Добавить новую экскурсию',
            'edit_item'          => 'Редактировать экскурсию',
            'new_item'           => 'Новая экскурсия',
            'view_item'          => 'Просмотр экскурсии',
            'search_items'       => 'Поиск экскурсий',
            'not_found'          => 'Экскурсии не найдены',
            'not_found_in_trash' => 'В корзине нет экскурсий',
        ],
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => ['slug' => 'tours'],
        'supports'     => ['title', 'editor', 'thumbnail'],
        'menu_icon'    => 'dashicons-calendar-alt',
        'show_in_rest' => true,
    ]);
}



// 2. РЕГИСТРАЦИЯ ПОЛЕЙ ACF


add_action('acf/init', 'register_tour_acf_fields');
function register_tour_acf_fields()
{
    if (!function_exists('acf_add_local_field_group')) return;

    acf_add_local_field_group([
        'key'    => 'group_tour_fields',
        'title'  => 'Данные экскурсии',
        'fields' => [
            [
                'key'           => 'field_tour_product',
                'label'         => 'Товар WooCommerce',
                'name'          => 'tour_product',
                'type'          => 'post_object',
                'post_type'     => ['product'],
                'return_format' => 'id',
                'ui'            => 1,
                'required'      => 1,
                'instructions'  => 'Выберите квест из списка товаров WooCommerce',
            ],
            [
                'key'            => 'field_tour_date',
                'label'          => 'Дата экскурсии',
                'name'           => 'tour_date',
                'type'           => 'date_picker',
                'display_format' => 'd.m.Y',
                'return_format'  => 'd.m.Y',
                'first_day'      => 1,
                'required'       => 1,
            ],
            [
                'key'         => 'field_tour_time',
                'label'       => 'Время начала',
                'name'        => 'tour_time',
                'type'        => 'text',
                'placeholder' => '10:00',
                'required'    => 1,
            ],
            [
                'key'   => 'field_tour_duration',
                'label' => 'Продолжительность (часы)',
                'name'  => 'tour_duration',
                'type'  => 'number',
                'min'   => 0.5,
                'step'  => 0.5,
            ],
            [
                'key'      => 'field_tour_price',
                'label'    => 'Базовая цена (€)',
                'name'     => 'tour_price',
                'type'     => 'number',
                'min'      => 0,
                'required' => 1,
            ],
            [
                'key'      => 'field_tour_seats_total',
                'label'    => 'Всего мест',
                'name'     => 'tour_seats_total',
                'type'     => 'number',
                'min'      => 1,
                'required' => 1,
            ],
            [
                'key'           => 'field_tour_seats_taken',
                'label'         => 'Занято мест (не трогать вручную)',
                'name'          => 'tour_seats_taken',
                'type'          => 'number',
                'default_value' => 0,
                'min'           => 0,
            ],
            [
                'key'   => 'field_tour_meeting_point',
                'label' => 'Место встречи',
                'name'  => 'tour_meeting_point',
                'type'  => 'text',
            ],
        ],
        'location' => [
            [['param' => 'post_type', 'operator' => '==', 'value' => 'tour']],
        ],
    ]);
}


// 3. УТИЛИТЫ

function tour_parse_date(string $date): ?DateTime
{
    if (empty(trim($date))) return null;
    foreach (['d.m.Y', 'Ymd', 'Y-m-d', 'd/m/Y'] as $format) {
        $dt = DateTime::createFromFormat($format, $date);
        if ($dt !== false) return $dt;
    }
    return null;
}

function tour_plural(int $n, string $one, string $few, string $many): string
{
    $mod10  = $n % 10;
    $mod100 = $n % 100;
    if ($mod100 >= 11 && $mod100 <= 19) return $many;
    if ($mod10 === 1) return $one;
    if ($mod10 >= 2 && $mod10 <= 4) return $few;
    return $many;
}


function tour_get_product_id(int $tour_id): int
{
    $raw = get_field('tour_product', $tour_id);
    if (is_object($raw)) return (int) $raw->ID;
    return (int) $raw;
}


// 4. ВСПОМОГАТЕЛЬНЫЕ ФУНКЦИИ


function tour_get_price_info(int $post_id): array
{
    $date_str = (string) get_field('tour_date', $post_id);
    $base     = (float) get_field('tour_price', $post_id);

    $empty = [
        'base_price'   => $base,
        'final_price'  => $base,
        'discount'     => false,
        'discount_pct' => 20,
        'days_left'    => 0,
        'hours_left'   => 0,
        'deadline_ts'  => 0,
    ];

    $dt = tour_parse_date($date_str);
    if (!$dt) return $empty;

    $tour_ts   = $dt->getTimestamp();
    $now_ts    = time();
    $days_left = ($tour_ts - $now_ts) / DAY_IN_SECONDS;
    $product_raw   = get_field('tour_product', $post_id);
    $product_id    = is_object($product_raw) ? (int) $product_raw->ID : (int) $product_raw;
    $discount_pct  = $product_id ? (int) get_field('tour_discount_pct',  $product_id) : 10;
    $discount_days = $product_id ? (int) get_field('tour_discount_days', $product_id) : 30;
    if (!$discount_pct)  $discount_pct  = 10;
    if (!$discount_days) $discount_days = 30;

    $discount = $days_left > $discount_days;
    $price    = $discount ? round($base * (1 - $discount_pct / 100)) : $base;

    return [
        'base_price'   => $base,
        'final_price'  => $price,
        'discount'     => $discount,
        'discount_pct' => $discount_pct,
        'days_left'    => (int) ceil($days_left),
        'hours_left'   => (int) ceil($days_left * 24),
        'deadline_ts'  => $tour_ts - ($discount_days * DAY_IN_SECONDS),
    ];
}

function tour_get_seats_info(int $post_id): array
{
    $total = (int) get_field('tour_seats_total', $post_id);
    $taken = (int) get_field('tour_seats_taken', $post_id);
    $left  = max(0, $total - $taken);

    return [
        'total'    => $total,
        'taken'    => $taken,
        'left'     => $left,
        'sold_out' => $left <= 0 && $total > 0,
        'few_left' => $left > 0 && $left <= 3,
        'percent'  => $total > 0 ? round(($taken / $total) * 100) : 0,
    ];
}

function tour_get_next_badge_for_product(int $product_id): string
{
    if (!$product_id) {
        return '';
    }

    $tours = get_posts([
        'post_type'      => 'tour',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'meta_query'     => [[
            'key'   => 'tour_product',
            'value' => $product_id,
        ]],
    ]);

    if (empty($tours)) {
        return '';
    }

    $next_tour = null;
    $now_dt    = new DateTime('now', new DateTimeZone('Europe/Amsterdam'));

    foreach ($tours as $tour) {
        $date_str  = (string) get_field('tour_date', $tour->ID);
        $tour_time = get_field('tour_time', $tour->ID) ?: '00:00';
        $dt        = tour_parse_date($date_str);

        if (!$dt) {
            continue;
        }

        $time_parts = explode(':', $tour_time);
        $dt->setTime(
            (int) $time_parts[0],
            (int) ($time_parts[1] ?? 0)
        );

        $compare_dt = clone $dt;
        $compare_dt->modify('-1 hour');

        if ($compare_dt < $now_dt) {
            continue;
        }

        if ($next_tour === null || $dt < $next_tour) {
            $next_tour = clone $dt;
        }
    }

    if (!$next_tour) {
        return '';
    }

    return 'The next event is ' . $next_tour->format('F j \a\t g:i A');
}

function tour_get_by_months(): array
{
    $query = new WP_Query([
        'post_type'      => 'tour',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'meta_key'       => 'tour_date',
        'orderby'        => 'meta_value',
        'order'          => 'ASC',
    ]);

    $ru_months = [
        1 => 'Январь',
        2 => 'Февраль',
        3 => 'Март',
        4 => 'Апрель',
        5 => 'Май',
        6 => 'Июнь',
        7 => 'Июль',
        8 => 'Август',
        9 => 'Сентябрь',
        10 => 'Октябрь',
        11 => 'Ноябрь',
        12 => 'Декабрь',
    ];

    $months   = [];
    $now_dt   = new DateTime('now', new DateTimeZone('Europe/Amsterdam'));

    if ($query->have_posts()) {
        foreach ($query->posts as $post) {
            $date_str  = (string) get_field('tour_date', $post->ID);
            $tour_time = get_field('tour_time', $post->ID) ?: '00:00';
            $dt        = tour_parse_date($date_str);

            if (!$dt) continue;

            // Устанавливаем время экскурсии и отнимаем 1 час
            $time_parts = explode(':', $tour_time);
            $dt->setTime((int)$time_parts[0], (int)($time_parts[1] ?? 0));
            $dt->modify('-1 hour');

            // Скрываем если до начала (минус 1 час) уже прошло
            if ($dt < $now_dt) continue;

            // Восстанавливаем оригинальное время для отображения
            $dt_display = tour_parse_date($date_str);

            $month_num = (int) $dt_display->format('n');
            $year      = $dt_display->format('Y');
            $month_key = $dt_display->format('Ym');

            if (!isset($months[$month_key])) {
                $months[$month_key] = [
                    'key'   => $month_key,
                    'label' => $ru_months[$month_num] . ' ' . $year,
                    'short' => $ru_months[$month_num],
                    'year'  => $year,
                    'tours' => [],
                ];
            }
            $months[$month_key]['tours'][] = $post;
        }
    }

    wp_reset_postdata();
    return $months;
}


// 5. КОРЗИНА — динамическая цена из экскурсии


// При добавлении в корзину сохраняем tour_id и цену из экскурсии
add_filter('woocommerce_add_cart_item_data', function ($cart_item_data, $product_id) {
    if (empty($_REQUEST['tour_id'])) return $cart_item_data;

    $tour_id = (int) $_REQUEST['tour_id'];
    if (get_post_type($tour_id) !== 'tour') return $cart_item_data;

    $price_info = tour_get_price_info($tour_id);
    $seats_info = tour_get_seats_info($tour_id);

    // Не добавляем если мест нет
    if ($seats_info['sold_out']) {
        wc_add_notice(__('К сожалению, на эту экскурсию мест больше нет.', 'woocommerce'), 'error');
        return null;
    }

    $cart_item_data['tour_id']      = $tour_id;
    $cart_item_data['tour_date']    = get_field('tour_date', $tour_id);
    $cart_item_data['tour_time']    = get_field('tour_time', $tour_id);
    $cart_item_data['custom_price'] = $price_info['final_price'];
    // Уникальный ключ — позволяет добавить один товар с разными датами
    $cart_item_data['unique_key']   = md5($tour_id);

    return $cart_item_data;
}, 10, 2);

// Подставляем цену из экскурсии в корзину
add_action('woocommerce_before_calculate_totals', function ($cart) {
    if (is_admin() && !defined('DOING_AJAX')) return;
    if (did_action('woocommerce_before_calculate_totals') >= 2) return;

    foreach ($cart->get_cart() as $cart_item) {
        if (!empty($cart_item['custom_price'])) {
            $cart_item['data']->set_price((float) $cart_item['custom_price']);
        }
    }
}, 20);

// Показываем дату и время в корзине и оформлении заказа
add_filter('woocommerce_get_item_data', function ($item_data, $cart_item) {
    if (!empty($cart_item['tour_date'])) {
        $item_data[] = ['key' => 'Дата',  'value' => $cart_item['tour_date']];
    }
    if (!empty($cart_item['tour_time'])) {
        $item_data[] = ['key' => 'Время', 'value' => $cart_item['tour_time']];
    }
    return $item_data;
}, 10, 2);

// Сохраняем tour_id и цену в метаданные позиции заказа
add_action('woocommerce_checkout_create_order_line_item', function ($item, $cart_item_key, $values) {
    if (!empty($values['tour_id'])) {
        $item->add_meta_data('tour_id',   $values['tour_id'],      true);
        $item->add_meta_data('tour_date', $values['tour_date'],    true);
        $item->add_meta_data('tour_time', $values['tour_time'],    true);
        $item->add_meta_data('tour_price', $values['custom_price'], true);
    }
}, 10, 3);

// Разрешаем покупку товаров используемых как квесты (цена подставляется из экскурсии)
add_filter('woocommerce_is_purchasable', function ($purchasable, $product) {
    $tours = get_posts([
        'post_type'      => 'tour',
        'post_status'    => 'publish',
        'posts_per_page' => 1,
        'meta_query'     => [[
            'key'   => 'tour_product',
            'value' => $product->get_id(),
        ]],
    ]);
    if (!empty($tours)) return true;
    return $purchasable;
}, 10, 2);

// Разрешаем добавление в корзину
add_filter('woocommerce_add_to_cart_validation', function ($passed, $product_id, $quantity) {
    if (!empty($_REQUEST['tour_id'])) return true;
    return $passed;
}, 99, 3);



// 6. ОБНОВЛЕНИЕ МЕСТ ПРИ ЗАКАЗЕ

add_action('woocommerce_order_status_completed',  'tour_on_order_completed');
add_action('woocommerce_order_status_processing', 'tour_on_order_completed');

function tour_on_order_completed(int $order_id)
{
    $order = wc_get_order($order_id);
    if (!$order) return;
    foreach ($order->get_items() as $item) {
        $tour_id = (int) $item->get_meta('tour_id');
        if (!$tour_id) continue;
        $taken = (int) get_field('tour_seats_taken', $tour_id);
        update_field('tour_seats_taken', $taken + (int) $item->get_quantity(), $tour_id);
    }
}

add_action('woocommerce_order_status_cancelled', 'tour_on_order_cancelled');
add_action('woocommerce_order_status_refunded',  'tour_on_order_cancelled');

function tour_on_order_cancelled(int $order_id)
{
    $order = wc_get_order($order_id);
    if (!$order) return;
    foreach ($order->get_items() as $item) {
        $tour_id = (int) $item->get_meta('tour_id');
        if (!$tour_id) continue;
        $taken = (int) get_field('tour_seats_taken', $tour_id);
        update_field('tour_seats_taken', max(0, $taken - (int) $item->get_quantity()), $tour_id);
    }
}


// 7. CRON — ежедневное обновление

add_action('wp', function () {
    if (!wp_next_scheduled('tour_daily_price_update')) {
        wp_schedule_event(time(), 'daily', 'tour_daily_price_update');
    }
});

add_action('tour_daily_price_update', function () {
    // Помечаем прошедшие экскурсии как черновики
    $tours = get_posts([
        'post_type'      => 'tour',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
    ]);
    $today = new DateTime('today');
    foreach ($tours as $tour) {
        $dt = tour_parse_date((string) get_field('tour_date', $tour->ID));
        if ($dt && $dt < $today) {
            wp_update_post(['ID' => $tour->ID, 'post_status' => 'draft']);
        }
    }
});


// 8. AJAX

add_action('wp_ajax_tour_get_info',        'ajax_tour_get_info');
add_action('wp_ajax_nopriv_tour_get_info', 'ajax_tour_get_info');

function ajax_tour_get_info()
{
    check_ajax_referer('tour_nonce', 'nonce');
    $tour_id = (int) $_POST['tour_id'];
    if (!$tour_id) wp_send_json_error('No tour ID');
    wp_send_json_success([
        'price' => tour_get_price_info($tour_id),
        'seats' => tour_get_seats_info($tour_id),
    ]);
}
