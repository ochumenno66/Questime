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
                <?php if (have_rows('cp_hero_tags')): ?>
                    <?php while (have_rows('cp_hero_tags')): the_row(); ?>
                        <span class="hero-ep__tag"><?php echo esc_html(get_sub_field('cp_tag_text')); ?></span>
                    <?php endwhile; ?>
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
                <p class="feature-card__value"><?php echo esc_html(get_field('cp_hero_players')); ?></p>
                <p class="feature-card__label">players</p>
            </div>
            <div class="feature-card">
                <div class="feature-card__icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/date-EP-AU.svg" alt="duration" />
                </div>
                <p class="feature-card__value"><?php echo esc_html(get_field('cp_hero_duration')); ?></p>
                <p class="feature-card__label">Duration</p>
            </div>
            <div class="feature-card">
                <div class="feature-card__icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/event-page/language-black.svg" alt="language" />
                </div>
                <p class="feature-card__value"><?php echo esc_html(get_field('cp_hero_language')); ?></p>
                <p class="feature-card__label">Language</p>
            </div>
            <div class="feature-card">
                <div class="feature-card__icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/format-black-EP-AU.svg" alt="format" />
                </div>
                <p class="feature-card__value"><?php echo esc_html(get_field('cp_hero_format')); ?></p>
                <p class="feature-card__label">Format</p>
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