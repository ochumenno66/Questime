<?php
/*
Template Part: Contact Modal
Вызов: get_template_part('templates/modal');
 */

$whatsapp_url = get_theme_mod('whatsapp_url', 'https://wa.me/31635640923');
$phone_display = get_theme_mod('phone_display');
$phone_display = is_string($phone_display) && !empty($phone_display)
  ? $phone_display
  : '+31 6 356 40 923';

// Modal — данные из ACF 
$modal_title         = get_theme_mod('modal_title', "Let's talk!");
$modal_description   = get_theme_mod('modal_description');
if (!$modal_description) {
  $modal_description = '
  <p>
    Feel free to ask your question or make a request directly.
    Nataly or Mark will contact you within one business day.
  </p>
  <p>
    Prefer to call? Please do!
  </p>
  ';
}
$modal_phone_text    = get_theme_mod('modal_phone_text', 'Our number is');
$modal_submit_text   = get_theme_mod('modal_submit_text', 'Answer me!');
$modal_whatsapp_text = get_theme_mod('modal_whatsapp_text', 'If your question is urgent, feel free to reach out to us on WhatsApp');
$privacy_policy      = get_permalink(get_page_by_path('privacy-policy'));
?>

<div class="contact-modal" id="contactModal" aria-hidden="true">
    <div class="contact-modal__overlay" id="contactModalOverlay"></div>
    <div class="window-modal" role="dialog" aria-modal="true" aria-labelledby="contactModalTitle">
        <button class="modal-close" id="modalClose" type="button" aria-label="Close">
            <svg viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M21.9203 12.0184L12.0208 21.9179" stroke="#191A18" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M21.9203 21.9228L12.0208 12.0233" stroke="#191A18" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
        <h2 class="contact-form__title modal-title" id="contactModalTitle">
            <?php echo esc_html($modal_title); ?>
        </h2>
        <?php if ($modal_description) : ?>
            <div class="modal-desc wysiwyg-content" id="modalDesc">
                <?php echo wpautop(wp_kses_post($modal_description)); ?>
                <p class="contact-form__text contact-form__text--phone">
                    <?php echo esc_html($modal_phone_text); ?>
                    <a class="contact-form__phone" href="<?php echo esc_url($whatsapp_url); ?>" target="_blank">
                    <?php echo esc_html($phone_display); ?>
                    </a>
                </p>
            </div>
        <?php endif; ?>
        <form class="contact-modal__form js-contact-form" data-form-type="modal">
            <input type="hidden" name="form_type" value="modal">
            <div class="contact-modal__fields">
                <div class="contact-modal__field">
                    <input class="contact-form__input" type="text" id="modal-name" name="name" placeholder="Name" required>
                </div>
                <div class="contact-modal__field">
                    <input class="contact-form__input" type="tel" id="modal-phone" name="phone" placeholder="Phone number" required>
                </div>
                <div class="contact-modal__field">
                    <input class="contact-form__input" type="text" id="modal-company" name="company" placeholder="Company">
                </div>
                <div class="contact-modal__field">
                    <input class="contact-form__input" type="email" id="modal-email" name="email" placeholder="Email" required>
                </div>
            </div>
            <div class="contact-modal__field">
                <textarea class="contact-form__textarea" id="modal-message" name="message" placeholder="Text of your request"></textarea>
            </div>
            <div class="contact-modal__actions">
                <div class="checkbox">
                    <input type="checkbox" id="modal-agree" name="agree" required>
                    <label for="modal-agree">
                        I agree to the
                        <a href="<?php echo esc_url($privacy_policy); ?>" target="_blank" rel="noopener noreferrer">
                            Privacy Policy
                        </a>
                        and the processing of personal data
                    </label>
                </div>
                <button class="btn btn-secondary btn--orange contact-modal__submit" id="modalSubmit" type="submit">
                    <?php echo esc_html($modal_submit_text); ?>
                </button>
            </div>
        </form>
        <div class="contact-modal__success" id="modalSuccess" hidden>
            Thank you! We will contact you shortly.
        </div>
        <a class="contact-modal__whatsapp" href="<?php echo esc_url($whatsapp_url); ?>" target="_blank" rel="noopener noreferrer">
            <?php echo esc_html($modal_whatsapp_text); ?>
        </a>
    </div>
</div>