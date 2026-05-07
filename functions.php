<?php

// Подключаем стили и скрипты
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css', [], '12');
    wp_enqueue_style('questime-style', get_template_directory_uri() . '/styles/style.css', ['swiper'], null);
    wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js', [], '12', true);
    wp_enqueue_script('questime-main', get_template_directory_uri() . '/js/main.js', ['swiper'], null, true);

    wp_localize_script('questime-main', 'questime_params', [
        'ajax_url' => admin_url('admin-ajax.php'),
    ]);

    // Скрипты только для страницы event-page
    if (is_page('event-page')) {
        wp_enqueue_script('questime-event', get_template_directory_uri() . '/js/event.js', ['questime-main'], null, true);
        wp_enqueue_script('google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyC2J-azecgmc3g6fPNXfMJL4tam2k89J5o&callback=initRouteMap&loading=async', [], null, true);
        }
});

add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
});

// Фавиконки
add_action('wp_head', function () {
    $uri = get_template_directory_uri();
    echo '<link rel="icon" type="image/svg+xml" href="' . $uri . '/assets/favicon/favicon.svg">' . "\n";
    echo '<link rel="shortcut icon" href="' . $uri . '/assets/favicon/favicon.ico">' . "\n";
});