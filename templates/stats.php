<?php
// Переиспользуемая секция Stats
// Вызов: get_template_part('templates/stats');
// Кнопка скачивания показывается только если заполнено поле stats_presentation

$stats_bg      = get_field('stats_bg')           ?: '';
$s1_number     = get_field('stats_1_number')     ?: '7';
$s1_text       = get_field('stats_1_text')       ?: 'stories';
$s2_number     = get_field('stats_2_number')     ?: '400 000';
$s2_text       = get_field('stats_2_text')       ?: 'people have played our games';
$s3_number     = get_field('stats_3_number')     ?: '13';
$s3_text       = get_field('stats_3_text')       ?: 'years of experience';
$presentation  = get_field('stats_presentation') ?: '';

$bg_style = $stats_bg ? ' style="background-image: linear-gradient(0deg, rgba(25, 26, 24, 0.7), rgba(25, 26, 24, 0.7)), linear-gradient(178.88deg, #191a18 0.92%, rgba(25, 26, 24, 0) 49.96%, #191a18 99%), url(\'' . esc_url($stats_bg) . '\');"' : '';

// Если есть кнопка — нужна обёртка stats__inner (как на team-building)
$has_btn = !empty($presentation);
?>

<section class="stats section-special decorated-dark-stats decorated-light-stats" id="stats"<?php echo $bg_style; ?>>
    <?php if ($has_btn) : ?>
    <div class="stats__inner container">
        <div class="stats__wrapper">
    <?php else : ?>
    <div class="stats__wrapper container">
    <?php endif; ?>

        <div class="stat__wrapper">
            <span class="stat-number"><?php echo esc_html($s1_number); ?></span>
            <span class="stat-text"><?php echo esc_html($s1_text); ?></span>
        </div>
        <div class="stat__wrapper">
            <span class="stat-number"><?php echo esc_html($s2_number); ?></span>
            <span class="stat-text"><?php echo esc_html($s2_text); ?></span>
        </div>
        <div class="stat__wrapper">
            <span class="stat-number"><?php echo esc_html($s3_number); ?></span>
            <span class="stat-text"><?php echo esc_html($s3_text); ?></span>
        </div>

    <?php if ($has_btn) : ?>
        </div>
        <a href="<?php echo esc_url($presentation); ?>" download class="btn btn-secondary btn-download btn--transparent">
        <span>Download Our Presentation</span>
        </a>
    </div>
    <?php else : ?>
    </div>
    <?php endif; ?>

</section>

