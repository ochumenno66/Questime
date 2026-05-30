<?php
// Template part: CTA 
// Используется на страницах: front-page, about-us, gamified-tours, team-building, event-page, case-page

$show_cta_block = get_field('show_cta_block');

if ($show_cta_block):

    $cta_background  = get_field('cta_background');
    $cta_title       = get_field('cta_title');
    $cta_subtitle    = get_field('cta_subtitle');
    $cta_button_text = get_field('cta_button_text');
    $cta_button_pdf  = get_field('cta_button_pdf');

?>

<section class="cta section-special decorated-light-cta decorated-dark-cta" id="cta" style="
        background:
        linear-gradient(0deg, rgba(25, 26, 24, 0.7), rgba(25, 26, 24, 0.7)),
        linear-gradient(to bottom, #191a18 10%, transparent 72%, #191a18 100%),
        url('<?php echo esc_url($cta_background); ?>') center / cover no-repeat;">
    <div class="cta__wrapper container">
        <div class="cta__content">
            <?php if ($cta_title): ?>
                <div class="cta__main-title">
                    <?php echo wp_kses_post($cta_title); ?>
                </div>
            <?php endif; ?>
            <?php if ($cta_subtitle): ?>
                <div class="cta__desc">
                    <?php echo esc_html($cta_subtitle); ?>
                </div>
            <?php endif; ?>
            <?php if ($cta_button_text && $cta_button_pdf): ?>
                <a href="<?php echo esc_url($cta_button_pdf['url']); ?>" class="btn btn-secondary cta__btn btn--transparent" target="_blank" rel="noopener noreferrer">
                    <?php echo esc_html($cta_button_text); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php endif; ?>