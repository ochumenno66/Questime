<?php
// Template part: Testimonials — универсальный шаблон
// ACF fields prefix: tm_
// Используется на страницах: custom-games, front-page, gamified-tours, single-product, single-quest_case, team-building

if (get_field('show_testimonials')) :

    $button = get_field('reviews_button');

    $button_text = $button['button_text'] ?? '';
    $button_link = $button['button_link'] ?? '';

    $cards = [
        get_field('review_card_1'),
        get_field('review_card_2'),
        get_field('review_card_3'),
        get_field('review_card_4'),
        get_field('review_card_5'),
        get_field('review_card_6'),
    ];

    $filled_cards = array_filter($cards, function ($card) {
        return !empty($card['text'])
            || !empty($card['image'])
            || !empty($card['video']);
    });

    $count = count($filled_cards);

?>

    <section class="testimonials section-special section-decorated-light section-decorated-dark" id="testimonials">
        <div class="container">
            <div class="testimonials__header">
                <?php if (get_field('testimonials_title')) : ?>
                    <h2 class="testimonials__title text-align">
                        <?php the_field('testimonials_title'); ?>
                    </h2>
                <?php endif; ?>
                <?php if (get_field('testimonials_subtitle')) : ?>
                    <h3 class="testimonials__subtitle h3">
                        <?php the_field('testimonials_subtitle'); ?>
                    </h3>
                <?php endif; ?>
            </div>
        </div>
        <div class="testimonials__carousel swiper
            <?php echo ($count === 1) ? 'testimonials__carousel--single' : ''; ?>
            <?php echo ($count < 5) ? 'testimonials__carousel--few' : ''; ?>"
            data-count="<?php echo $count; ?>">
            <div class="testimonials__track swiper-wrapper">
                <?php foreach ($filled_cards as $card) :
                    $text = $card['text'] ?? '';
                    $image = $card['image'] ?? '';
                    $video = $card['video'] ?? '';
                    $avatar = $card['avatar'] ?? '';
                    $name = $card['name'] ?? '';
                    $has_image = !empty($image);
                    $has_video = !empty($video);
                    $card_class = 'testimonials__card--text';
                    if ($has_image) {
                        $card_class = 'testimonials__card--photo-vertical';
                    }
                    if ($has_video) {
                        $card_class = 'testimonials__card--photo-horizontal';
                    }
                ?>
                    <div class="testimonials__card <?php echo $card_class; ?> swiper-slide">
                        <?php if ($text) : ?>
                            <div class="testimonials__card-top">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/main/quote.png" alt="quote" class="testimonials__quote-icon">
                                <p class="testimonials__quote-text">
                                    <?php echo esc_html($text); ?>
                                </p>
                            </div>
                        <?php endif; ?>
                        <?php if ($has_image && !$has_video) : ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($name); ?>" class="testimonials__photo">
                        <?php endif; ?>
                        <?php if ($has_video) : ?>
                            <div
                                class="testimonials__video-preview"
                                data-video="<?php echo esc_url($video['url']); ?>">
                                <?php if ($image) : ?>
                                    <img
                                        src="<?php echo esc_url($image['url']); ?>"
                                        alt="<?php echo esc_attr($name); ?>"
                                        class="testimonials__photo">
                                <?php endif; ?>
                                <button class="testimonials__play-btn">
                                    <svg width="38" height="38" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z" fill="currentColor" />
                                    </svg>
                                </button>
                            </div>
                        <?php endif; ?>
                        <?php if ($avatar || $name) : ?>
                            <div class="testimonials__author">
                                <?php if ($avatar) : ?>
                                    <img src="<?php echo esc_url($avatar['url']); ?>" alt="<?php echo esc_attr($name); ?>" class="testimonials__avatar">
                                <?php endif; ?>
                                <?php if ($name) : ?>
                                    <span class="testimonials__name">
                                        <?php echo esc_html($name); ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php if ($button_text && $button_link) : ?>
            <div class="container">
                <div class="testimonials__footer">
                    <a href="<?php echo esc_url($button_link); ?>" class="btn btn-secondary testimonials__btn btn--transparent" target="_blank">
                        <?php echo esc_html($button_text); ?>
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </section>
    <div class="video-modal">
        <div class="video-modal__overlay"></div>
        <div class="video-modal__content">
            <button
                type="button"
                class="video-modal__close">
                <svg viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21.9203 12.0184L12.0208 21.9179" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M21.9203 21.9228L12.0208 12.0233" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
            <video
                class="video-modal__video"
                controls>
            </video>
        </div>
    </div>

<?php endif; ?>