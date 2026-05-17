<?php
// Template part: CTA for Event Page and Case Page
// ACF fields prefix: cp_ (case-product)
?>

<?php $cp_cta_bg = get_field('cp_cta_background'); ?>
<section class="cta cta--event-page section-special decorated-dark-cta decorated-light-cta" id="cta"
    style="background-image: url('<?php echo $cp_cta_bg ? esc_url($cp_cta_bg['url']) : get_template_directory_uri() . '/assets/images/main/cta.webp'; ?>');">
    <div class="cta__overlay"></div>
    <div class="container">
        <div class="cta__inner">
            <h2 class="cta__title">
                <?php echo wp_kses_post(get_field('cp_cta_title')); ?>
            </h2>
            <?php $cp_pdf = get_field('cp_cta_pdf'); ?>
            <?php if ($cp_pdf): ?>
                <a href="<?php echo esc_url($cp_pdf['url']); ?>" class="btn btn-secondary cta__btn btn--transparent" download="<?php echo esc_attr($cp_pdf['title'] ?: 'Questime_Presentation'); ?>">Download PDF</a>
            <?php endif; ?>
        </div>
    </div>
</section>