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
    if (is_product()) {
        wp_enqueue_script('questime-event', get_template_directory_uri() . '/js/event.js', ['questime-main'], null, true);
        $maps_key = get_theme_mod('google_maps_api_key', '');
        if ($maps_key) {
            wp_enqueue_script('google-maps', 'https://maps.googleapis.com/maps/api/js?key=' . $maps_key . '&callback=initRouteMap&loading=async', [], null, true);
        }
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

// КАСТОМАЙЗЕР — социальные сети (иконка + ссылка, до 4 штук) + Google maps api ключ
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

    // Контакты
    $wp_customize->add_section('questime_contacts_section', [
        'title'    => 'Контакты',
        'priority' => 31,
    ]);

    $wp_customize->add_setting('whatsapp_url', [
        'default'           => 'https://wa.me/31635640923',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ]);

    $wp_customize->add_control('whatsapp_url', [
        'label'   => 'WhatsApp ссылка',
        'section' => 'questime_contacts_section',
        'type'    => 'url',
    ]);

    $wp_customize->add_section('questime_api_section', [
        'title'    => 'API ключи',
        'priority' => 31,
    ]);

    $wp_customize->add_setting('google_maps_api_key', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ]);

    $wp_customize->add_control('google_maps_api_key', [
        'label'   => 'Google Maps API ключ',
        'section' => 'questime_api_section',
        'type'    => 'text',
    ]);
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

// ХЛЕБНЫЕ КРОШКИ — автоматические для любой страницы
// Вызов: questime_breadcrumbs();
function questime_breadcrumbs(): void {
    // На главной не показываем
    if (is_front_page()) {
        return;
    }

    $sep = '<span class="breadcrumb__sep">
        <svg width="15" height="13" viewBox="0 0 15 13" fill="none">
            <path d="M0 6H12.25L7 0.75L7.66 0L14.16 6.5L7.66 13L7 12.25L12.25 7H0V6Z" fill="#E68345"/>
        </svg>
    </span>';

    echo '<nav class="hero__breadcrumbs" aria-label="Breadcrumb">';
    echo '<a href="' . esc_url(home_url('/')) . '" class="breadcrumb__link">Main</a>';

    // WooCommerce: страница товара
    // Main → Gamified Tours → Название товара
    if (function_exists('is_product') && is_product()) {
        echo $sep;
        echo '<a href="' . esc_url(home_url('/gamified-tours/')) . '" class="breadcrumb__link">Gamified Tours</a>';
        echo $sep;
        echo '<span class="breadcrumb__current">' . esc_html(get_the_title()) . '</span>';
    
    // CPT: Кейсы
    // Main → Custom Games → Название кейса
    } elseif (is_singular('quest_case')) {
        echo $sep;
        echo '<a href="' . esc_url(home_url('/custom-games/')) . '" class="breadcrumb__link">Custom Games</a>';
        echo $sep;
        echo '<span class="breadcrumb__current">' . esc_html(get_the_title()) . '</span>';

    // Обычные страницы с родителем
    } elseif (is_page()) {
        $page    = get_queried_object();
        $parents = array_reverse(get_post_ancestors($page));

        foreach ($parents as $parent_id) {
            echo $sep;
            echo '<a href="' . esc_url(get_permalink($parent_id)) . '" class="breadcrumb__link">';
            echo esc_html(get_the_title($parent_id));
            echo '</a>';
        }

        echo $sep;
        echo '<span class="breadcrumb__current">' . esc_html(get_the_title()) . '</span>';

    // Запись (post)
    } elseif (is_single()) {
        $categories = get_the_category();
        if (!empty($categories)) {
            echo $sep;
            echo '<a href="' . esc_url(get_category_link($categories[0]->term_id)) . '" class="breadcrumb__link">';
            echo esc_html($categories[0]->name);
            echo '</a>';
        }
        echo $sep;
        echo '<span class="breadcrumb__current">' . esc_html(get_the_title()) . '</span>';

    // Архив / категория
    } elseif (is_archive()) {
        echo $sep;
        echo '<span class="breadcrumb__current">' . esc_html(get_the_archive_title()) . '</span>';

    // 404
    } elseif (is_404()) {
        echo $sep;
        echo '<span class="breadcrumb__current">404</span>';
    }

    echo '</nav>';
}


// Убираем стандартные стили WooCommerce — используем свои
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

// Подключаем свой шаблон single-product вместо стандартного WooCommerce
add_filter('woocommerce_locate_template', function ($template, $template_name) {
    if ($template_name === 'single-product.php') {
        $custom = get_template_directory() . '/single-product.php';
        if (file_exists($custom)) {
            return $custom;
        }
    }
    return $template;
}, 10, 2);

// Поддержка WooCommerce в теме
add_action('after_setup_theme', function () {
    add_theme_support('woocommerce');
});


// Регистрация CPT: quest_case
add_action('init', function () {
    register_post_type('quest_case', [
        'labels' => [
            'name'               => 'Cases',
            'singular_name'      => 'Case',
            'add_new'            => 'Add Case',
            'add_new_item'       => 'Add New Case',
            'edit_item'          => 'Edit Case',
            'view_item'          => 'View Case',
            'search_items'       => 'Search Cases',
            'not_found'          => 'No cases found',
            'not_found_in_trash' => 'No cases in trash',
        ],
        'public'       => true,
        'show_in_menu' => true,
        'menu_icon'    => 'dashicons-portfolio',
        'supports'     => ['title', 'thumbnail'],
        'has_archive'  => false,
        'rewrite'      => ['slug' => 'cases'],
        'show_in_rest' => true,
    ]);

    // Таксономия категорий кейсов
    register_taxonomy('case_category', 'quest_case', [
        'labels' => [
            'name'          => 'Case Categories',
            'singular_name' => 'Case Category',
            'add_new_item'  => 'Add New Category',
            'edit_item'     => 'Edit Category',
        ],
        'public'       => true,
        'hierarchical' => true,
        'rewrite'      => ['slug' => 'case-category'],
        'show_in_rest' => true,
    ]);
});