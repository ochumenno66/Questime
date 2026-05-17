<?php
// Template part: Testimonials for Event Page and Case Page
// ACF fields prefix: cp_ (case-product)
?>

<section class="testimonials section-special section-decorated-light section-decorated-dark" id="testimonials">
    <div class="container">
        <div class="testimonials__header">
            <h2 class="testimonials__title text-align"><?php echo esc_html(get_field('cp_testimonials_title') ?: "Stories you don't just hear — you live"); ?></h2>
            <h3 class="testimonials__subtitle h3"><?php echo wp_kses_post(get_field('cp_testimonials_subtitle')); ?></h3>
        </div>
    </div>

    <div class="testimonials__carousel swiper">
        <div class="testimonials__track swiper-wrapper">

            <?php if (have_rows('cp_testimonials_cards')): ?>
                <?php while (have_rows('cp_testimonials_cards')): the_row(); ?>
                    <?php $card_type = get_sub_field('cp_card_type'); ?>

                    <?php if ($card_type === 'text'): ?>
                        <div class="testimonials__card testimonials__card--text swiper-slide">
                            <div class="testimonials__card-top">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/main/quote.png" alt="quote" class="testimonials__quote-icon">
                                <p class="testimonials__quote-text"><?php echo esc_html(get_sub_field('cp_quote_text')); ?></p>
                            </div>
                            <div class="testimonials__author">
                                <?php $avatar = get_sub_field('cp_author_avatar'); ?>
                                <img src="<?php echo esc_url($avatar['url']); ?>" alt="<?php echo esc_attr(get_sub_field('cp_author_name')); ?>" class="testimonials__avatar">
                                <span class="testimonials__name"><?php echo esc_html(get_sub_field('cp_author_name')); ?></span>
                            </div>
                        </div>

                    <?php elseif ($card_type === 'photo-vertical'): ?>
                        <div class="testimonials__card testimonials__card--photo-vertical swiper-slide">
                            <?php $photo = get_sub_field('cp_card_photo'); ?>
                            <img src="<?php echo esc_url($photo['url']); ?>" alt="<?php echo esc_attr(get_sub_field('cp_author_name')); ?>" class="testimonials__photo">
                            <div class="testimonials__author">
                                <?php $avatar = get_sub_field('cp_author_avatar'); ?>
                                <img src="<?php echo esc_url($avatar['url']); ?>" alt="<?php echo esc_attr(get_sub_field('cp_author_name')); ?>" class="testimonials__avatar">
                                <span class="testimonials__name"><?php echo esc_html(get_sub_field('cp_author_name')); ?></span>
                            </div>
                        </div>

                    <?php elseif ($card_type === 'photo-horizontal'): ?>
                        <div class="testimonials__card testimonials__card--photo-horizontal swiper-slide">
                            <?php $photo = get_sub_field('cp_card_photo'); ?>
                            <img src="<?php echo esc_url($photo['url']); ?>" alt="<?php echo esc_attr(get_sub_field('cp_author_name')); ?>" class="testimonials__photo">
                            <div class="testimonials__author">
                                <?php $avatar = get_sub_field('cp_author_avatar'); ?>
                                <img src="<?php echo esc_url($avatar['url']); ?>" alt="<?php echo esc_attr(get_sub_field('cp_author_name')); ?>" class="testimonials__avatar">
                                <span class="testimonials__name"><?php echo esc_html(get_sub_field('cp_author_name')); ?></span>
                            </div>
                        </div>
                    <?php endif; ?>

                <?php endwhile; ?>
            <?php endif; ?>

        </div>
    </div>

    <div class="container">
        <div class="testimonials__footer">
            <a href="<?php echo esc_url(get_field('cp_testimonials_reviews_url') ?: '#'); ?>" class="btn btn-card testimonials__btn btn--transparent" target="_blank">Read More Reviews</a>
        </div>
    </div>
</section>