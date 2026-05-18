<?php
/**
 * Template Part: Request Modal
 * Файл: templates/modal.php
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
    <div class="request-modal__overlay"></div>

    <div class="request-modal__dialog" role="dialog" aria-modal="true">

        <button class="request-modal__close" type="button" aria-label="Close">
            ...
        </button>

        <h2 class="contact-form__title">
            <?php echo esc_html($modal_title); ?>
        </h2>

        <div class="contact-form__info">
            <p class="contact-form__text text-bottom">
                <?php echo wp_kses_post($modal_description); ?>
            </p>

            <p class="contact-form__text">
                Our number is
                <a class="contact-form__phone"
                   href="tel:<?php echo esc_attr($phone_number); ?>">
                    <?php echo esc_html($formatted_phone); ?>
                </a>
            </p>
        </div>

        <div class="contact-form__fields">

            <div class="contact-form__field">
                <input class="contact-form__input"
                       type="text"
                       id="modal-name"
                       placeholder="Name">

                <span class="contact-form__error"></span>
            </div>

            <div class="contact-form__field">
                <input class="contact-form__input"
                       type="tel"
                       id="modal-phone"
                       placeholder="Phone number">

                <span class="contact-form__error"></span>
            </div>

            <div class="contact-form__field">
                <input class="contact-form__input"
                       type="text"
                       id="modal-company"
                       placeholder="Company">

                <span class="contact-form__error"></span>
            </div>

            <div class="contact-form__field">
                <input class="contact-form__input"
                       type="email"
                       id="modal-email"
                       placeholder="Email">

                <span class="contact-form__error"></span>
            </div>

        </div>

        <div class="contact-form__field">
            <textarea class="contact-form__textarea"
                      id="modal-message"
                      placeholder="Text of your request"></textarea>

            <span class="contact-form__error"></span>
        </div>

        <div class="contact-form__actions">

            <div class="checkbox">
                <input type="checkbox" id="modal-agree">

                <label for="modal-agree">
                    I agree to the
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('privacy-policy'))); ?>"
                       target="_blank">
                        Privacy Policy
                    </a>
                </label>
            </div>

            <button class="btn btn-secondary btn--orange contact-form__btn"
                    id="modalSubmit"
                    type="button">
                Answer me!
            </button>

        </div>

        <div class="contact-form__success" hidden>
            Thank you! We'll be in touch soon.
        </div>

    </div>
</div>