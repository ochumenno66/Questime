<?php
// Template part: CTA — универсальный шаблон
// ACF fields prefix: cta_
// Используется на страницах: front-page, about-us, gamified-tours, team-building, event-page, case-page
?>

<?php
$cta_bg          = get_field('cta_background');
$cta_extra_class = get_field('cta_extra_class') ?: '';
$cta_subtitle    = get_field('cta_subtitle');
$cta_pdf         = get_field('cta_pdf');
$cta_btn_text    = get_field('cta_btn_text') ?: 'Download PDF';
$whatsapp        = get_theme_mod('whatsapp_url', 'https://wa.me/31635640923');
$cta_wa_btn_text = get_field('cta_wa_btn_text');
?>

<section class="cta section-special decorated-dark-cta decorated-light-cta <?php echo esc_attr($cta_extra_class); ?>" id="cta"
    style="background-image: url('<?php echo $cta_bg ? esc_url($cta_bg['url']) : get_template_directory_uri() . '/assets/images/main/cta.webp'; ?>');">
    <div class="cta__overlay"></div>
    <div class="container">
        <div class="cta__inner">

            <h2 class="cta__title">
                <?php echo wp_kses_post(get_field('cta_title')); ?>
            </h2>

            <?php if ($cta_subtitle): ?>
                <h3 class="cta__desc"><?php echo esc_html($cta_subtitle); ?></h3>
            <?php endif; ?>

            <?php if ($cta_pdf): ?>
                <a href="<?php echo esc_url($cta_pdf['url']); ?>"
                    class="btn btn-secondary cta__btn btn--transparent"
                    download="<?php echo esc_attr($cta_pdf['title'] ?: 'Questime_Presentation'); ?>">
                    <?php echo esc_html($cta_btn_text); ?>
                </a>
            <?php endif; ?>

            <?php if ($cta_wa_btn_text): ?>
                <a href="<?php echo esc_url($whatsapp); ?>"
                    class="btn btn-secondary cta__btn btn--transparent"
                    target="_blank">
                    <?php echo esc_html($cta_wa_btn_text); ?>
                </a>
            <?php endif; ?>

        </div>
    </div>
</section>