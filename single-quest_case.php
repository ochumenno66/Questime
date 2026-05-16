<?php
/*
Template Name: Case Page
*/

get_header();
?>
<main>
    <!-- Секция Hero -->
    <?php $hero_bg = get_field('hero_background'); ?>
    <section class="hero-ep" id="hero"
        <?php if ($hero_bg): ?>
        style="background-image: url('<?php echo esc_url($hero_bg['url']); ?>'); background-size: cover; background-position: center;"
        <?php endif; ?>>
        <div class="container hero-ep__container">
            <?php questime_breadcrumbs(); ?>

            <div class="hero-ep__compass">
                <?php $compass = get_field('hero_compass'); ?>
                <?php if ($compass): ?>
                    <img src="<?php echo esc_url($compass['url']); ?>" alt="<?php echo esc_attr($compass['alt']); ?>" />
                <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/event-page/compass-EP.svg" alt="Compass" />
                <?php endif; ?>
            </div>

            <div class="hero-ep__content">
                <div class="hero-ep__tags">
                    <?php if (have_rows('hero_tags')): ?>
                        <?php while (have_rows('hero_tags')): the_row(); ?>
                            <span class="hero-ep__tag"><?php echo esc_html(get_sub_field('tag_text')); ?></span>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <div class="hero-ep__text">
                    <h1 class="hero-ep__title"><?php echo esc_html(get_field('hero_title') ?: get_the_title()); ?></h1>
                    <p class="hero-ep__subtitle"><?php echo esc_html(get_field('hero_subtitle')); ?></p>
                    <p class="hero-ep__description"><?php echo esc_html(get_field('hero_description')); ?></p>
                </div>
            </div>

            <div class="hero-ep__features">
                <div class="feature-card">
                    <div class="feature-card__icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/person-black-EP-AU.svg" alt="players" />
                    </div>
                    <p class="feature-card__value"><?php echo esc_html(get_field('hero_players')); ?></p>
                    <p class="feature-card__label">players</p>
                </div>
                <div class="feature-card">
                    <div class="feature-card__icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/date-EP-AU.svg" alt="duration" />
                    </div>
                    <p class="feature-card__value"><?php echo esc_html(get_field('hero_duration')); ?></p>
                    <p class="feature-card__label">Duration</p>
                </div>
                <div class="feature-card">
                    <div class="feature-card__icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/event-page/language-black.svg" alt="language" />
                    </div>
                    <p class="feature-card__value"><?php echo esc_html(get_field('hero_language')); ?></p>
                    <p class="feature-card__label">Language</p>
                </div>
                <div class="feature-card">
                    <div class="feature-card__icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/format-black-EP-AU.svg" alt="format" />
                    </div>
                    <p class="feature-card__value"><?php echo esc_html(get_field('hero_format')); ?></p>
                    <p class="feature-card__label">Format</p>
                    <div class="hero-ep__loupe">
                        <?php $loupe = get_field('hero_loupe'); ?>
                        <?php if ($loupe): ?>
                            <img src="<?php echo esc_url($loupe['url']); ?>" alt="<?php echo esc_attr($loupe['alt']); ?>" />
                        <?php else: ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/event-page/loupe.svg" alt="loupe" />
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Секция Gallery -->
    <?php get_template_part('templates/gallery'); ?>
    <!-- Секция Experiences -->
    <section class="experience section-special" id="experience">
        <h2 class="team__title text-align"><?php echo esc_html(get_field('experience_case_title')); ?></h2>
        <div class="container">

            <div class="experience__row">
                <div class="experience__col--text">
                    <?php echo wp_kses_post(get_field('experience_text_1')); ?>
                </div>
                <div class="experience__col--img">
                    <div class="experience__img-wrapper">
                        <?php $exp_img_1 = get_field('experience_img_1'); ?>
                        <?php if ($exp_img_1): ?>
                            <img src="<?php echo esc_url($exp_img_1['url']); ?>" alt="<?php echo esc_attr($exp_img_1['alt']); ?>" class="experience__img" loading="lazy" decoding="async">
                        <?php else: ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team-building/expirience-TB-1.webp" alt="Questime team experience" class="experience__img" loading="lazy" decoding="async">
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="experience__row experience__row--img-first">
                <div class="experience__col--img">
                    <div class="experience__img-wrapper">
                        <?php $exp_img_2 = get_field('experience_img_2'); ?>
                        <?php if ($exp_img_2): ?>
                            <img src="<?php echo esc_url($exp_img_2['url']); ?>" alt="<?php echo esc_attr($exp_img_2['alt']); ?>" class="experience__img" loading="lazy" decoding="async">
                        <?php else: ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team-building/expirience-TB-2.webp" alt="Questime in action" class="experience__img" loading="lazy" decoding="async">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="experience__col--gains">
                    <?php echo wp_kses_post(get_field('experience_text_2')); ?>
                </div>
            </div>

            <div class="experience__row">
                <div class="experience__col--gains">
                    <h3 class="experience__gains-title"><?php echo esc_html(get_field('experience_gains_title') ?: 'What your team gains:'); ?></h3>
                    <ul class="experience__list">
                        <?php if (have_rows('experience_gains')): ?>
                            <?php while (have_rows('experience_gains')): the_row(); ?>
                                <li class="experience__item">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/tick.svg" alt="" class="experience__tick" loading="lazy" decoding="async">
                                    <?php echo esc_html(get_sub_field('gain_text')); ?>
                                </li>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="experience__col--img">
                    <div class="experience__img-wrapper">
                        <?php $exp_img_3 = get_field('experience_img_3'); ?>
                        <?php if ($exp_img_3): ?>
                            <img src="<?php echo esc_url($exp_img_3['url']); ?>" alt="<?php echo esc_attr($exp_img_3['alt']); ?>" class="experience__img" loading="lazy" decoding="async">
                        <?php else: ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team-building/expirience-TB-3.webp" alt="Questime event" class="experience__img" loading="lazy" decoding="async">
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="experience__actions">
                <a href="<?php echo esc_url(get_field('experience_contact_url') ?: '#'); ?>" class="btn btn-secondary btn-experience btn--orange">Contact us</a>
            </div>

        </div>
    </section>
    <!-- Секция Testimonials -->
    <section class="testimonials section-special section-decorated-light section-decorated-dark" id="testimonials">
        <div class="container">
            <div class="testimonials__header">
                <h2 class="testimonials__title text-align"><?php echo esc_html(get_field('testimonials_title') ?: "Stories you don't just hear — you live"); ?></h2>
                <h3 class="testimonials__subtitle h3"><?php echo wp_kses_post(get_field('testimonials_subtitle')); ?></h3>
            </div>
        </div>

        <div class="testimonials__carousel swiper">
            <div class="testimonials__track swiper-wrapper">

                <?php if (have_rows('testimonials_cards')): ?>
                    <?php while (have_rows('testimonials_cards')): the_row(); ?>
                        <?php $card_type = get_sub_field('card_type'); ?>

                        <?php if ($card_type === 'text'): ?>
                            <div class="testimonials__card testimonials__card--text swiper-slide">
                                <div class="testimonials__card-top">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/main/quote.png" alt="quote" class="testimonials__quote-icon">
                                    <p class="testimonials__quote-text"><?php echo esc_html(get_sub_field('quote_text')); ?></p>
                                </div>
                                <div class="testimonials__author">
                                    <?php $avatar = get_sub_field('author_avatar'); ?>
                                    <img src="<?php echo esc_url($avatar['url']); ?>" alt="<?php echo esc_attr(get_sub_field('author_name')); ?>" class="testimonials__avatar">
                                    <span class="testimonials__name"><?php echo esc_html(get_sub_field('author_name')); ?></span>
                                </div>
                            </div>

                        <?php elseif ($card_type === 'photo-vertical'): ?>
                            <div class="testimonials__card testimonials__card--photo-vertical swiper-slide">
                                <?php $photo = get_sub_field('card_photo'); ?>
                                <img src="<?php echo esc_url($photo['url']); ?>" alt="<?php echo esc_attr(get_sub_field('author_name')); ?>" class="testimonials__photo">
                                <div class="testimonials__author">
                                    <?php $avatar = get_sub_field('author_avatar'); ?>
                                    <img src="<?php echo esc_url($avatar['url']); ?>" alt="<?php echo esc_attr(get_sub_field('author_name')); ?>" class="testimonials__avatar">
                                    <span class="testimonials__name"><?php echo esc_html(get_sub_field('author_name')); ?></span>
                                </div>
                            </div>

                        <?php elseif ($card_type === 'photo-horizontal'): ?>
                            <div class="testimonials__card testimonials__card--photo-horizontal swiper-slide">
                                <?php $photo = get_sub_field('card_photo'); ?>
                                <img src="<?php echo esc_url($photo['url']); ?>" alt="<?php echo esc_attr(get_sub_field('author_name')); ?>" class="testimonials__photo">
                                <div class="testimonials__author">
                                    <?php $avatar = get_sub_field('author_avatar'); ?>
                                    <img src="<?php echo esc_url($avatar['url']); ?>" alt="<?php echo esc_attr(get_sub_field('author_name')); ?>" class="testimonials__avatar">
                                    <span class="testimonials__name"><?php echo esc_html(get_sub_field('author_name')); ?></span>
                                </div>
                            </div>
                        <?php endif; ?>

                    <?php endwhile; ?>
                <?php endif; ?>

            </div>
        </div>

        <div class="container">
            <div class="testimonials__footer">
                <a href="<?php echo esc_url(get_field('testimonials_reviews_url') ?: '#'); ?>" class="btn btn-card testimonials__btn btn--transparent" target="_blank">Read More Reviews</a>
            </div>
        </div>
    </section>
    <!-- Секция Format -->
    <section class="persons format section-special" id="format">
        <div class="container">
            <div class="persons__list">
                <div class="persons__dot"></div>
                <div class="persons__item is-open">
                    <button class="persons__question" aria-expanded="true">
                        <img class="persons__icon" src="<?php echo get_template_directory_uri(); ?>/assets/icons/event-page/language-orange.svg" alt="cube" loading="lazy"
                            decoding="async">
                        <h4 class="persons__question-text">Online format — how it works?</h4>
                        <span class="persons__chevron">
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M31.6663 15L19.9997 25L8.33301 15" stroke="#191A18" stroke-width="2.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </span>
                    </button>
                    <div class="persons__answer">
                        <div class="format__content">
                            <div class="format__steps-col">
                                <div class="format__step">
                                    <span class="format__step-num">1</span>
                                    <p class="format__step-text">All participants watch a short intro video with the backstory and
                                        meet the characters: the Director, Actor, Maid, Star, Cameraman and Makeup Artist.</p>
                                </div>
                                <div class="format__step">
                                    <span class="format__step-num">2</span>
                                    <p class="format__step-text">Participants are divided into teams and sent to separate breakout
                                        rooms.</p>
                                </div>
                                <div class="format__step">
                                    <span class="format__step-num">3</span>
                                    <p class="format__step-text">Actors rotate between rooms, playing their scenes and interacting
                                        with each team.</p>
                                </div>
                                <div class="format__step">
                                    <span class="format__step-num">4</span>
                                    <p class="format__step-text">Teams complete challenges and mini-games with each character. The
                                        better the team performs, the more information they unlock.</p>
                                </div>
                                <div class="format__step">
                                    <span class="format__step-num"></span>
                                    <p class="format__step-text">We usually run the game on Zoom (but can adapt to other platforms).</p>
                                </div>
                            </div>
                            <div class="format__finale">
                                <span class="format__finale-label">The finale</span>
                                <div class="format__finale-text">
                                    <p>In the final stage, teams must decide who committed the crime.</p>
                                    <p>The ending depends entirely on your observation, logic and teamwork.</p>
                                    <p>Only your insight will determine how The Great Silent Quest ends.</p>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-secondary format__btn">Request ONLINE</button>
                        <div class="format__photo-wrap format__photo-wrap--left">
                            <img class="format__photo" src="<?php echo get_template_directory_uri(); ?>/assets/images/event-page/format-1.webp" alt="Online format photo 1"
                                loading="lazy" />
                        </div>

                        <div class="format__photo-wrap format__photo-wrap--right">
                            <img class="format__photo" src="<?php echo get_template_directory_uri(); ?>/assets/images/event-page/format-2.webp" alt="Online format photo 2"
                                loading="lazy" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Секция CTA -->
    <?php $cta_bg = get_field('cta_background'); ?>
    <section class="cta cta--event-page section-special decorated-dark-cta decorated-light-cta" id="cta"
        style="background-image: url('<?php echo $cta_bg ? esc_url($cta_bg['url']) : get_template_directory_uri() . '/assets/images/main/cta.webp'; ?>');">
        <div class="cta__overlay"></div>
        <div class="container">
            <div class="cta__inner">
                <h2 class="cta__title">
                    <?php echo wp_kses_post(get_field('cta_title')); ?>
                </h2>
                <?php $pdf = get_field('cta_pdf'); ?>
                <?php if ($pdf): ?>
                    <a href="<?php echo esc_url($pdf['url']); ?>" class="btn btn-secondary cta__btn btn--transparent" download="<?php echo esc_attr($pdf['title'] ?: 'Questime_Presentation'); ?>">Download PDF</a>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- Секция Form -->
    <section class="contact-form section-special" id="contact-form">
        <div class="container">
            <h2 class="contact-form__title">Let's talk!</h2>
            <form class="contact-form__wrapper" action="#" method="post">
                <div class="contact-form__content">
                    <div class="contact-form__info">
                        <p class="contact-form__text text-bottom">Feel free to ask your question or make a request directly.
                            Nataly or Mark will contact you within one business day.</p>
                        <p class="contact-form__text">Prefer to call? Please do!</p>
                        <p class="contact-form__text">Our number is <a class="contact-form__phone"
                                href="https://wa.me/31612365246" target="_blank">+31 6 123 65 246</a></p>
                    </div>
                </div>
                <div class="contact-form__fields">
                    <input class="contact-form__input" type="text" name="name" placeholder="Name" required>
                    <input class="contact-form__input" type="tel" name="phone" placeholder="Phone number" required>
                    <input class="contact-form__input" type="text" name="company" placeholder="Company" required>
                    <input class="contact-form__input" type="email" name="email" placeholder="Email" required>
                </div>
                <textarea class="contact-form__textarea" name="message" placeholder="Text of your request"
                    required></textarea>
                <div class="contact-form__actions">
                    <button class="btn btn-secondary contact-form__btn btn--orange" type="submit">Answer me!</button>
                    <div class="checkbox">
                        <input type="checkbox" id="agree" required>
                        <label for="agree">By subscribing, you agree to our <a href="/privacy-policy.html" target="_blank">Privacy
                                Policy</a></label>
                    </div>
                </div>
                <div class="contact-form__image-wrapper">
                    <img class="contact-form__image" src="<?php echo get_template_directory_uri(); ?>/assets/images/main/contact.jpg" alt="Nataly and Mark">
                </div>
            </form>
        </div>
    </section>
</main>

<?php
get_footer();
?>