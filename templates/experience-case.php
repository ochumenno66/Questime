<?php
// Template part: Experience for Case Page (single-quest_case)
// ACF fields prefix: sc_ (single-case)
?>

<section class="experience section-special" id="experience">
    <h2 class="team__title text-align"><?php echo esc_html(get_field('sc_experience_title')); ?></h2>
    <div class="container">

        <div class="experience__row">
            <div class="experience__col--text">
                <?php echo wp_kses_post(get_field('sc_experience_text_1')); ?>
            </div>
            <div class="experience__col--img">
                <div class="experience__img-wrapper">
                    <?php $sc_img_1 = get_field('sc_experience_img_1'); ?>
                    <?php if ($sc_img_1): ?>
                        <img src="<?php echo esc_url($sc_img_1['url']); ?>" alt="<?php echo esc_attr($sc_img_1['alt']); ?>" class="experience__img" loading="lazy" decoding="async">
                    <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team-building/expirience-TB-1.webp" alt="Questime team experience" class="experience__img" loading="lazy" decoding="async">
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="experience__row experience__row--img-first">
            <div class="experience__col--img">
                <div class="experience__img-wrapper">
                    <?php $sc_img_2 = get_field('sc_experience_img_2'); ?>
                    <?php if ($sc_img_2): ?>
                        <img src="<?php echo esc_url($sc_img_2['url']); ?>" alt="<?php echo esc_attr($sc_img_2['alt']); ?>" class="experience__img" loading="lazy" decoding="async">
                    <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team-building/expirience-TB-2.webp" alt="Questime in action" class="experience__img" loading="lazy" decoding="async">
                    <?php endif; ?>
                </div>
            </div>
            <div class="experience__col--gains">
                <?php echo wp_kses_post(get_field('sc_experience_text_2')); ?>
            </div>
        </div>

        <div class="experience__row">
            <div class="experience__col--gains">
                <h3 class="experience__gains-title"><?php echo esc_html(get_field('sc_experience_gains_title') ?: 'What your team gains:'); ?></h3>
                <ul class="experience__list">
                    <?php if (have_rows('sc_experience_gains')): ?>
                        <?php while (have_rows('sc_experience_gains')): the_row(); ?>
                            <li class="experience__item">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/tick.svg" alt="" class="experience__tick" loading="lazy" decoding="async">
                                <?php echo esc_html(get_sub_field('sc_gain_text')); ?>
                            </li>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="experience__col--img">
                <div class="experience__img-wrapper">
                    <?php $sc_img_3 = get_field('sc_experience_img_3'); ?>
                    <?php if ($sc_img_3): ?>
                        <img src="<?php echo esc_url($sc_img_3['url']); ?>" alt="<?php echo esc_attr($sc_img_3['alt']); ?>" class="experience__img" loading="lazy" decoding="async">
                    <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team-building/expirience-TB-3.webp" alt="Questime event" class="experience__img" loading="lazy" decoding="async">
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="experience__actions">
            <a href="<?php echo esc_url(get_field('sc_experience_contact_url') ?: '#'); ?>" class="btn btn-secondary btn-experience btn--orange">Contact us</a>
        </div>

    </div>
</section>