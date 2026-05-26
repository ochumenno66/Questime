<?php
// Template part: Experience — универсальный шаблон
// ACF fields prefix: exp_
// Используется на страницах: single-product, single-quest_case, about-us, gamified-tours
?>

<?php
$exp_section_class   = get_field('exp_section_class') ?: '';
$exp_section_title   = get_field('exp_section_title');
$exp_row2_reverse    = get_field('exp_row2_reverse');
$exp_gains_title     = get_field('exp_gains_title');
$exp_badge           = get_field('exp_badge');
$exp_btn1_text       = get_field('exp_btn1_text');
$exp_btn1_url        = get_field('exp_btn1_url') ?: '#';
$exp_btn1_class      = get_field('exp_btn1_class') ?: 'btn-experience btn--orange';
$exp_btn2_text       = get_field('exp_btn2_text');
$whatsapp            = get_theme_mod('whatsapp_url', 'https://wa.me/31635640923');

$exp_img_1 = get_field('exp_img_1');
$exp_img_2 = get_field('exp_img_2');
$exp_img_3 = get_field('exp_img_3');
?>

<section class="experience section-special <?php echo esc_attr($exp_section_class); ?>" id="experience">
    <?php if ($exp_section_title): ?>
        <h2 class="team__title text-align"><?php echo wp_kses_post($exp_section_title); ?></h2>
    <?php endif; ?>
    <div class="container">

        <!-- Ряд 1: текст + картинка -->
        <div class="experience__row">
            <div class="experience__col--text">
                <?php echo wp_kses_post(get_field('exp_text_1')); ?>
            </div>
            <div class="experience__col--img">
                <div class="experience__img-wrapper">
                    <?php if ($exp_img_1): ?>
                        <img src="<?php echo esc_url($exp_img_1['url']); ?>" alt="<?php echo esc_attr($exp_img_1['alt']); ?>" class="experience__img" loading="lazy" decoding="async">
                    <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team-building/expirience-TB-1.webp" alt="Experience" class="experience__img" loading="lazy" decoding="async">
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Ряд 2: картинка + текст/список -->
        <div class="experience__row experience__row--img-first <?php echo $exp_row2_reverse ? 'experience-reverse--ep' : ''; ?>">
            <div class="experience__col--img">
                <div class="experience__img-wrapper">
                    <?php if ($exp_img_2): ?>
                        <img src="<?php echo esc_url($exp_img_2['url']); ?>" alt="<?php echo esc_attr($exp_img_2['alt']); ?>" class="experience__img" loading="lazy" decoding="async">
                    <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team-building/expirience-TB-2.webp" alt="Experience" class="experience__img" loading="lazy" decoding="async">
                    <?php endif; ?>
                </div>
            </div>
            <div class="experience__col--gains">
                <?php if ($exp_gains_title): ?>
                    <h3 class="experience__gains-title"><?php echo wp_kses_post($exp_gains_title); ?></h3>
                    <ul class="experience__list">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <?php $gain = get_field("exp_gain_{$i}"); ?>
                            <?php if ($gain): ?>
                                <li class="experience__item">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/tick.svg" alt="" class="experience__tick" loading="lazy" decoding="async">
                                    <?php echo wp_kses_post($gain); ?>
                                </li>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </ul>
                <?php else: ?>
                    <?php echo wp_kses_post(get_field('exp_text_2')); ?>
                <?php endif; ?>
            </div>
        </div>

        <!-- Ряд 3: текст/список + картинка -->
        <div class="experience__row">
            <div class="experience__col--<?php echo $exp_gains_title ? 'gains' : 'text'; ?>">
                <?php echo wp_kses_post(get_field('exp_text_3')); ?>
            </div>
            <div class="experience__col--img">
                <div class="experience__img-wrapper">
                    <?php if ($exp_img_3): ?>
                        <img src="<?php echo esc_url($exp_img_3['url']); ?>" alt="<?php echo esc_attr($exp_img_3['alt']); ?>" class="experience__img" loading="lazy" decoding="async">
                    <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team-building/expirience-TB-3.webp" alt="Experience" class="experience__img" loading="lazy" decoding="async">
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <?php if ($exp_badge || $exp_btn1_text || $exp_btn2_text): ?>
            <div class="experience__actions">
                <?php if ($exp_badge): ?>
                    <span class="experience__badge"><?php echo wp_kses_post($exp_badge); ?></span>
                <?php endif; ?>
                <?php if ($exp_btn1_text || $exp_btn2_text): ?>
                    <div class="experience__btns">
                        <?php if ($exp_btn1_text): ?>
                            <a href="<?php echo esc_url($exp_btn1_url); ?>" class="btn btn-secondary <?php echo esc_attr($exp_btn1_class); ?>">
                                <?php echo wp_kses_post($exp_btn1_text); ?>
                            </a>
                        <?php endif; ?>
                        <?php if ($exp_btn2_text): ?>
                            <a href="<?php echo esc_url($whatsapp); ?>" class="btn btn-secondary experience__book open-modal" data-modal-open target="_blank">
                                <?php echo wp_kses_post($exp_btn2_text); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

    </div>
</section>