<?php
// Template part: Hero for Event Page and Case Page
// ACF fields prefix: cp_ (case-product)
?>

<?php $cp_hero_bg = get_field('cp_hero_background'); ?>
<section class="hero-ep" id="hero"
    <?php if ($cp_hero_bg): ?>
    style="background-image: url('<?php echo esc_url($cp_hero_bg['url']); ?>'); background-size: cover; background-position: center;"
    <?php endif; ?>>
    <div class="container hero-ep__container">
        <?php questime_breadcrumbs(); ?>

        <div class="hero-ep__compass">
            <?php $cp_compass = get_field('cp_hero_compass'); ?>
            <?php if ($cp_compass): ?>
                <img src="<?php echo esc_url($cp_compass['url']); ?>" alt="<?php echo esc_attr($cp_compass['alt']); ?>" />
            <?php else: ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/event-page/compass-EP.svg" alt="Compass" />
            <?php endif; ?>
        </div>

        <div class="hero-ep__content">
            <div class="hero-ep__tags">
                <?php if (get_field('cp_hero_tag_1')): ?>
                    <span class="hero-ep__tag"><?php echo esc_html(get_field('cp_hero_tag_1')); ?></span>
                <?php endif; ?>
                <?php if (get_field('cp_hero_tag_2')): ?>
                    <span class="hero-ep__tag"><?php echo esc_html(get_field('cp_hero_tag_2')); ?></span>
                <?php endif; ?>
                <?php if (get_field('cp_hero_tag_3')): ?>
                    <span class="hero-ep__tag"><?php echo esc_html(get_field('cp_hero_tag_3')); ?></span>
                <?php endif; ?>
                <?php if (get_field('cp_hero_tag_4')): ?>
                    <span class="hero-ep__tag"><?php echo esc_html(get_field('cp_hero_tag_4')); ?></span>
                <?php endif; ?>
            </div>

            <div class="hero-ep__text">
                <h1 class="hero-ep__title"><?php echo esc_html(get_field('cp_hero_title') ?: get_the_title()); ?></h1>
                <p class="hero-ep__subtitle"><?php echo esc_html(get_field('cp_hero_subtitle')); ?></p>
                <p class="hero-ep__description"><?php echo esc_html(get_field('cp_hero_description')); ?></p>
            </div>
        </div>

        <div class="hero-ep__features">
            <div class="feature-card">
                <div class="feature-card__icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/person-black-EP-AU.svg" alt="players" />
                </div>
                <p class="feature-card__value"><?php echo esc_html(get_field('cp_hero_players_value')); ?></p>
                <p class="feature-card__label"><?php echo esc_html(get_field('cp_hero_players_label') ?: 'players'); ?></p>
            </div>
            <div class="feature-card">
                <div class="feature-card__icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/date-EP-AU.svg" alt="duration" />
                </div>
                <p class="feature-card__value"><?php echo esc_html(get_field('cp_hero_duration_value')); ?></p>
                <p class="feature-card__label"><?php echo esc_html(get_field('cp_hero_duration_label') ?: 'Duration'); ?></p>
            </div>
            <div class="feature-card">
                <div class="feature-card__icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/event-page/language-black.svg" alt="language" />
                </div>
                <p class="feature-card__value"><?php echo esc_html(get_field('cp_hero_language_value')); ?></p>
                <p class="feature-card__label"><?php echo esc_html(get_field('cp_hero_language_label') ?: 'Language'); ?></p>
            </div>
            <div class="feature-card">
                <div class="feature-card__icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/format-black-EP-AU.svg" alt="format" />
                </div>
                <p class="feature-card__value"><?php echo esc_html(get_field('cp_hero_format_value')); ?></p>
                <p class="feature-card__label"><?php echo esc_html(get_field('cp_hero_format_label') ?: 'Format'); ?></p>
                <div class="hero-ep__loupe">
                    <?php $cp_loupe = get_field('cp_hero_loupe'); ?>
                    <?php if ($cp_loupe): ?>
                        <img src="<?php echo esc_url($cp_loupe['url']); ?>" alt="<?php echo esc_attr($cp_loupe['alt']); ?>" />
                    <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/event-page/loupe.svg" alt="loupe" />
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
</section>