<?php
/**
 * Template Part: Request Modal
 * Файл: templates/modal-contact.php
 */

// Кастомайзер
$whatsapp = get_theme_mod('whatsapp_url', 'https://wa.me/31635640923');

// ACF поля модалки
$modal_title       = get_field('modal_title')       ?: "Let's talk!";
$modal_description = get_field('modal_description') ?: 'Feel free to ask your question or make a request directly. Nataly or Mark will contact you within one business day.<br> Prefer to call? Please do!';

// Номер из WhatsApp
$phone_number = preg_replace('/\D/', '', $whatsapp);

// Красивый вывод номера
$formatted_phone = preg_replace(
    '/(\d{2})(\d{1})(\d{3})(\d{2})(\d{3})/',
    '+$1 $2 $3 $4 $5',
    $phone_number
);
?>

<div class="request-modal" id="requestModal" aria-hidden="true">
    <div class="request-modal__overlay" id="requestModalOverlay"></div>
    <div class="request-modal__dialog" role="dialog" aria-modal="true" aria-labelledby="requestModalTitle">
        <button class="request-modal__close" id="requestModalClose" aria-label="Close">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" aria-hidden="true">
                <path d="M1 1L17 17M17 1L1 17" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </button>
        <h2 class="request-modal__title" id="requestModalTitle">
            <?php echo esc_html($modal_title); ?>
        </h2>
        <p class="request-modal__desc">
            <?php echo wp_kses_post($modal_description); ?><br>Our number is
            <a class="contact-form__phone" href="tel:<?php echo esc_attr($phone_number); ?>">
                <?php echo esc_html($formatted_phone); ?>
            </a>
        </p>
        <div class="contact-form__fields">
            <div class="request-modal__field">
                <input class="contact-form__input" type="text" id="modal-name" name="name" placeholder="Name" autocomplete="name">
                <span class="request-modal__error" id="modal-name-error"></span>
            </div>
            <div class="request-modal__field">
                <input class="contact-form__input" type="tel" id="modal-phone" name="phone" placeholder="Phone number" autocomplete="tel">
                <span class="request-modal__error" id="modal-phone-error"></span>
            </div>
            <div class="request-modal__field">
                <input class="contact-form__input" type="text" id="modal-company" name="company" placeholder="Company">
                <span class="request-modal__error" id="modal-company-error"></span>
            </div>
            <div class="request-modal__field">
                <input class="contact-form__input" type="email" id="modal-email" name="email" placeholder="Email" autocomplete="email">
                <span class="request-modal__error" id="modal-email-error"></span>
            </div>
        </div>
        <div class="request-modal__field">
            <textarea class="contact-form__textarea contact-form__textarea--modal" id="modal-message" name="message" placeholder="Text of your request"></textarea>
            <span class="request-modal__error" id="modal-message-error"></span>
        </div>
        <div class="checkbox">
            <input type="checkbox" id="modal-agree">
            <label for="modal-agree">
                I agree to the
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('privacy-policy'))); ?>" target="_blank">
                    Privacy Policy
                </a>
                and the processing of personal data
            </label>
        </div>
        <span class="request-modal__error" id="modal-agree-error"></span>
        <div class="request-modal__success" id="modalSuccess" hidden>
            Thank you! We'll be in touch soon.
        </div>
        <button class="btn btn-secondary btn--orange request-modal__submit" id="modalSubmit" type="button">
            Answer me!
        </button>
        <a class="request-modal__whatsapp" href="<?php echo esc_url($whatsapp); ?>" target="_blank" rel="noopener noreferrer">
            If your question is urgent, feel free to reach out to us on WhatsApp
        </a>
    </div>
</div>