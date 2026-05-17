<?php
// Template part: Experience for Event Page (single-product)
// ACF fields prefix: sp_ (single-product)
?>

<section class="experience section-special" id="experience">
    <div class="container">

        <div class="experience__row">
            <div class="experience__col--text">
                <?php echo wp_kses_post(get_field('sp_experience_text_1')); ?>
            </div>
            <div class="experience__col--img">
                <div class="experience__img-wrapper">
                    <?php $sp_img_1 = get_field('sp_experience_img_1'); ?>
                    <?php if ($sp_img_1): ?>
                        <img src="<?php echo esc_url($sp_img_1['url']); ?>" alt="<?php echo esc_attr($sp_img_1['alt']); ?>" class="experience__img" loading="lazy" decoding="async">
                    <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team-building/expirience-TB-1.webp" alt="Team building experience" class="experience__img" loading="lazy" decoding="async">
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="experience__row experience__row--img-first experience-reverse--ep">
            <div class="experience__col--img">
                <div class="experience__img-wrapper">
                    <?php $sp_img_2 = get_field('sp_experience_img_2'); ?>
                    <?php if ($sp_img_2): ?>
                        <img src="<?php echo esc_url($sp_img_2['url']); ?>" alt="<?php echo esc_attr($sp_img_2['alt']); ?>" class="experience__img" loading="lazy" decoding="async">
                    <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team-building/expirience-TB-2.webp" alt="Team building activity" class="experience__img" loading="lazy" decoding="async">
                    <?php endif; ?>
                </div>
            </div>
            <div class="experience__col--text">
                <?php echo wp_kses_post(get_field('sp_experience_text_2')); ?>
            </div>
        </div>

        <div class="experience__row">
            <div class="experience__col--gains">
                <h3 class="experience__gains-title"><?php echo esc_html(get_field('sp_experience_gains_title') ?: 'What your team gains:'); ?></h3>
                <ul class="experience__list">
                    <?php if (have_rows('sp_experience_gains')): ?>
                        <?php while (have_rows('sp_experience_gains')): the_row(); ?>
                            <li class="experience__item">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/tick.svg" alt="" class="experience__tick" loading="lazy" decoding="async">
                                <?php echo esc_html(get_sub_field('sp_gain_text')); ?>
                            </li>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="experience__col--img">
                <div class="experience__img-wrapper">
                    <?php $sp_img_3 = get_field('sp_experience_img_3'); ?>
                    <?php if ($sp_img_3): ?>
                        <img src="<?php echo esc_url($sp_img_3['url']); ?>" alt="<?php echo esc_attr($sp_img_3['alt']); ?>" class="experience__img" loading="lazy" decoding="async">
                    <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team-building/expirience-TB-3.webp" alt="Team event" class="experience__img" loading="lazy" decoding="async">
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="experience__actions">
            <span class="experience__badge"><?php echo esc_html(get_field('sp_experience_badge')); ?></span>
            <div class="experience__btns">
                <a href="<?php echo esc_url(get_field('sp_experience_ticket_url') ?: '#'); ?>" class="btn btn-secondary btn-experience btn--orange">Buy ticket</a>
                <a href="<?php echo esc_url(get_field('sp_experience_whatsapp_url') ?: 'https://wa.me/'); ?>" class="btn btn-secondary experience__book">Book a Private Tour</a>
            </div>
        </div>

    </div>
</section>