<?php
// Template part: Testimonials — универсальный шаблон
// ACF fields prefix: tm_
// Используется на страницах: custom-games, front-page, gamified-tours, single-product, single-quest_case, team-building
?>

<?php
$tm_section_class  = get_field('tm_section_class') ?: '';
$tm_section_id     = get_field('tm_section_id') ?: 'testimonials';
$tm_title          = get_field('tm_title') ?: "Stories you don't just hear — you live";
$tm_subtitle       = get_field('tm_subtitle');
$tm_reviews_url    = get_field('tm_reviews_url') ?: '#';
$tm_btn_text       = get_field('tm_btn_text') ?: 'Read More Reviews';
$tm_btn_class      = get_field('tm_btn_class') ?: 'btn-card';
?>

<section class="testimonials section-special section-decorated-light section-decorated-dark <?php echo esc_attr($tm_section_class); ?>" id="<?php echo esc_attr($tm_section_id); ?>">
    <div class="container">
        <div class="testimonials__header">
            <h2 class="testimonials__title text-align"><?php echo esc_html($tm_title); ?></h2>
            <?php if ($tm_subtitle): ?>
                <h3 class="testimonials__subtitle h3"><?php echo wp_kses_post($tm_subtitle); ?></h3>
            <?php else: ?>
                <h3 class="testimonials__subtitle h3">For <span class="testimonials__accent">over 13 years</span>, we've created and led <span class="testimonials__accent">500+ gamified tours</span> around the world.</h3>
            <?php endif; ?>
        </div>
    </div>

    <div class="testimonials__carousel swiper">
        <div class="testimonials__track swiper-wrapper">

            <?php for ($i = 1; $i <= 6; $i++):
                $tm_card_type   = get_field("tm_card_{$i}_type");
                $tm_card_quote  = get_field("tm_card_{$i}_quote");
                $tm_card_photo  = get_field("tm_card_{$i}_photo");
                $tm_card_avatar = get_field("tm_card_{$i}_avatar");
                $tm_card_name   = get_field("tm_card_{$i}_name");

                if (!$tm_card_type || !$tm_card_name) continue;
            ?>

                <?php if ($tm_card_type === 'text' && $tm_card_quote): ?>
                    <div class="testimonials__card testimonials__card--text swiper-slide">
                        <div class="testimonials__card-top">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/main/quote.png" alt="quote" class="testimonials__quote-icon">
                            <p class="testimonials__quote-text"><?php echo esc_html($tm_card_quote); ?></p>
                        </div>
                        <div class="testimonials__author">
                            <?php if ($tm_card_avatar): ?>
                                <img src="<?php echo esc_url($tm_card_avatar['url']); ?>" alt="<?php echo esc_attr($tm_card_name); ?>" class="testimonials__avatar">
                            <?php endif; ?>
                            <span class="testimonials__name"><?php echo esc_html($tm_card_name); ?></span>
                        </div>
                    </div>

                <?php elseif ($tm_card_type === 'photo-vertical' && $tm_card_photo): ?>
                    <div class="testimonials__card testimonials__card--photo-vertical swiper-slide">
                        <img src="<?php echo esc_url($tm_card_photo['url']); ?>" alt="<?php echo esc_attr($tm_card_name); ?>" class="testimonials__photo">
                        <div class="testimonials__author">
                            <?php if ($tm_card_avatar): ?>
                                <img src="<?php echo esc_url($tm_card_avatar['url']); ?>" alt="<?php echo esc_attr($tm_card_name); ?>" class="testimonials__avatar">
                            <?php endif; ?>
                            <span class="testimonials__name"><?php echo esc_html($tm_card_name); ?></span>
                        </div>
                    </div>

                <?php elseif ($tm_card_type === 'photo-horizontal' && $tm_card_photo): ?>
                    <div class="testimonials__card testimonials__card--photo-horizontal swiper-slide">
                        <img src="<?php echo esc_url($tm_card_photo['url']); ?>" alt="<?php echo esc_attr($tm_card_name); ?>" class="testimonials__photo">
                        <div class="testimonials__author">
                            <?php if ($tm_card_avatar): ?>
                                <img src="<?php echo esc_url($tm_card_avatar['url']); ?>" alt="<?php echo esc_attr($tm_card_name); ?>" class="testimonials__avatar">
                            <?php endif; ?>
                            <span class="testimonials__name"><?php echo esc_html($tm_card_name); ?></span>
                        </div>
                    </div>
                <?php endif; ?>

            <?php endfor; ?>

        </div>
    </div>

    <div class="container">
        <div class="testimonials__footer">
            <a href="<?php echo esc_url($tm_reviews_url); ?>" class="btn <?php echo esc_attr($tm_btn_class); ?> testimonials__btn btn--transparent" target="_blank">
                <?php echo esc_html($tm_btn_text); ?>
            </a>
        </div>
    </div>
</section>