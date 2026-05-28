<?php
// Template part: Experience — универсальный шаблон
// ACF fields prefix: exp_
// Используется на страницах: single-product, single-quest_case, about-us, gamified-tours

$show_experience_section = get_field('show_experience_section');
if ($show_experience_section):

    $experience_title              = get_field('experience_title');
    $row_1_reverse                 = get_field('row_1_reverse');
    $row_1_content                 = get_field('row_1_content');
    $row_1_image                   = get_field('row_1_image');
    $row_2_reverse                 = get_field('row_2_reverse');
    $row_2_content                 = get_field('row_2_content');
    $row_2_image                   = get_field('row_2_image');
    $row_3_reverse                 = get_field('row_3_reverse');
    $row_3_content                 = get_field('row_3_content');
    $row_3_image                   = get_field('row_3_image');
    $experience_badge              = get_field('experience_badge');
    $experience_schedule_btn_text  = get_field('experience_schedule_btn_text');
    $experience_linkedin_btn_text  = get_field('experience_linkedin_btn_text');
    $experience_modal_btn_text     = get_field('experience_modal_btn_text');
    $experience_linkedin_btn_url   = get_field('experience_linkedin_btn_url');

    $rows = [
        [
            'reverse' => $row_1_reverse,
            'content' => $row_1_content,
            'image' => $row_1_image,
        ],
        [
            'reverse' => $row_2_reverse,
            'content' => $row_2_content,
            'image' => $row_2_image,
        ],
        [
            'reverse' => $row_3_reverse,
            'content' => $row_3_content,
            'image' => $row_3_image,
        ],
    ];
?>

    <section class="experience" id="experience">
        <?php if ($experience_title): ?>
            <h2 class="team__title text-align">
                <?php echo esc_html($experience_title); ?>
            </h2>
        <?php endif; ?>
        <div class="container">
            <?php foreach ($rows as $row): ?>
                <?php if (!$row['content'] && !$row['image']) continue; ?>
                <div class="experience__row <?php echo $row['reverse'] ? 'experience__row--img-first' : ''; ?>">
                    <?php if ($row['reverse'] && $row['image']): ?>
                        <div class="experience__col--img">
                            <div class="experience__img-wrapper">
                                <img src="<?php echo esc_url($row['image']); ?>" alt="" class="experience__img" loading="lazy" decoding="async">
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($row['content']): ?>
                        <div class="experience__col--text">
                            <?php echo wp_kses_post($row['content']); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (!$row['reverse'] && $row['image']): ?>
                        <div class="experience__col--img">
                            <div class="experience__img-wrapper">
                                <img src="<?php echo esc_url($row['image']); ?>" alt="" class="experience__img" loading="lazy" decoding="async">
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
            <?php if ($experience_badge || $experience_schedule_btn_text || $experience_linkedin_btn_text || $experience_modal_btn_text): ?>
                <div class="experience__actions">
                    <?php if ($experience_badge): ?>
                        <span class="experience__badge">
                            <?php echo esc_html($experience_badge); ?>
                        </span>
                    <?php endif; ?>
                    <?php if ($experience_schedule_btn_text || $experience_linkedin_btn_text || $experience_modal_btn_text): ?>
                        <div class="experience__btns">
                            <?php if ($experience_schedule_btn_text): ?>
                                <a href="/schedule" class="btn btn-secondary btn-experience btn--orange">
                                    <?php echo esc_html($experience_schedule_btn_text); ?>
                                </a>
                            <?php endif; ?>
                            <?php if ($experience_linkedin_btn_text && $experience_linkedin_btn_url): ?>
                                <a href="<?php echo esc_url($experience_linkedin_btn_url); ?>" class="btn btn-secondary btn-experience btn--orange" target="_blank" rel="noopener noreferrer">
                                    <?php echo esc_html($experience_linkedin_btn_text); ?>
                                </a>
                            <?php endif; ?>
                            <?php if ($experience_modal_btn_text): ?>
                                <button type="button" class="btn btn-secondary experience__book open-modal">
                                    <?php echo esc_html($experience_modal_btn_text); ?>
                                </button>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

<?php endif; ?>