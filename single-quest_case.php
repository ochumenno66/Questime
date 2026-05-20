<?php
/*
Template Name: Case Page
*/

get_header();
?>
<main>
    <!-- Секция Hero -->
    <?php get_template_part('templates/hero-case-product'); ?>
    <!-- Секция Gallery -->
    <?php get_template_part('templates/gallery'); ?>
    <!-- Секция Experiences -->
    <?php get_template_part('templates/experience-case-product'); ?>
    <!-- Секция Testimonials -->
    <?php get_template_part('templates/testimonials'); ?>
    <!-- Секция Format -->
    <?php get_template_part('templates/format'); ?>
    <!-- Секция CTA -->
    <?php get_template_part('templates/cta'); ?>
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