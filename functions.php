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

// КАСТОМАЙЗЕР — социальные сети (иконка + ссылка, до 4 штук)
add_action('customize_register', function (WP_Customize_Manager $wp_customize) {

    $wp_customize->add_panel('questime_socials_panel', [
        'title'    => 'Социальные сети',
        'priority' => 30,
    ]);

    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_section("questime_social_{$i}", [
            'title'    => "Соцсеть #{$i}",
            'panel'    => 'questime_socials_panel',
            'priority' => $i * 10,
        ]);

        $wp_customize->add_setting("social_{$i}_url", [
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        ]);
        $wp_customize->add_control("social_{$i}_url", [
            'label'   => 'Ссылка',
            'section' => "questime_social_{$i}",
            'type'    => 'url',
        ]);

        $wp_customize->add_setting("social_{$i}_icon", [
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        ]);
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "social_{$i}_icon", [
            'label'   => 'Иконка (SVG / PNG)',
            'section' => "questime_social_{$i}",
        ]));

        $wp_customize->add_setting("social_{$i}_alt", [
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        ]);
        $wp_customize->add_control("social_{$i}_alt", [
            'label'   => 'Alt / название сети',
            'section' => "questime_social_{$i}",
            'type'    => 'text',
        ]);
    }
});


// ХЕЛПЕР: вывод иконок соцсетей — вызывается в header.php и footer.php
function questime_social_icons(): void {
    for ($i = 1; $i <= 4; $i++) {
        $url  = get_theme_mod("social_{$i}_url",  '');
        $icon = get_theme_mod("social_{$i}_icon", '');
        $alt  = get_theme_mod("social_{$i}_alt",  'social');

        if (empty($url) || empty($icon)) {
            continue;
        }

        printf(
            '<a class="social-icon" href="%s" target="_blank" rel="noopener noreferrer"><img src="%s" alt="%s"></a>' . "\n",
            esc_url($url),
            esc_url($icon),
            esc_attr($alt)
        );
    }
}
