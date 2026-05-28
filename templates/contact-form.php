<?php
/*
  Template Part: Contact Form
  Подключается:
  get_template_part('template-parts/contact-form', null, ['type' => 'default']); на страницах
  get_template_part('template-parts/contact-form', null, ['type' => 'gamified']); на страницах 
 */

if (!get_field('show_contact_form')) {
    return;
}

$form_type = !empty($args['type']) ? $args['type'] : 'default';

$whatsapp_url = get_theme_mod('whatsapp_url', 'https://wa.me/31635640923');
$phone_display = get_theme_mod('phone_display');
$phone_display = is_string($phone_display) && !empty($phone_display)
  ? $phone_display
  : '+31 6 356 40 923';


// Default form — данные из ACF
$contact_image     = get_field('contact_form_image');
$contact_image_url = !empty($contact_image['url'])
  ? $contact_image['url']
  : get_template_directory_uri() . '/assets/images/main/contact.jpg';
$default_title     = get_field('contact_form_title') ?: "Let's talk!";
$contact_content   = get_field('contact_form_content');
$contact_content   = $contact_content ?: '
<p>
  Feel free to ask your question or make a request directly.
  Nataly or Mark will contact you within one business day.
</p>
<p>
  Prefer to call? Please do!
</p>
';
$default_button     = get_field('contact_form_button')     ?: 'Answer me!';
$default_phone_text = get_field('contact_form_phone_text') ?: 'Our number is';
$default_phone_html = sprintf(
  '<p class="contact-form__text contact-form__text--phone">
    %s
    <a class="contact-form__phone" href="%s" target="_blank">%s</a>
  </p>',
  esc_html($default_phone_text),
  esc_url($whatsapp_url),
  esc_html($phone_display)
);

// Gamified form — данные из ACF
$gamified_title   = get_field('contact_form_gamified_title')   ?:"Let's plan your adventure";
$gamified_content = get_field('contact_form_gamified_content');
$gamified_content = $gamified_content ?: '
<p>
  Have a question? Want to organize a private experience or a custom gamified tour?
  Tell us what you\'re looking for!
</p>
<p>
  Natalia or Mark will personally get back to you within one business day.
</p>
<p>
  Prefer to talk it through?
</p>
';
$gamified_button       = get_field('contact_form_gamified_button')       ?:'Answer me!';
$gamified_phone_before = get_field('contact_form_gamified_phone_before') ?: 'Call us directly at';
$gamified_phone_after  = get_field('contact_form_gamified_phone_after')  ?: '— we’d love to hear your plans.';
$gamified_phone_html = sprintf(
  '<p class="contact-form__text-gt contact-form__text-gt--phone">
    %s
    <a class="contact-form__phone" href="%s" target="_blank">%s</a>
    %s
  </p>',
  esc_html($gamified_phone_before),
  esc_url($whatsapp_url),
  esc_html($phone_display),
  esc_html($gamified_phone_after)
);

// Gamified form, выпадающий список с турами — данные из ACF
$option_1_text  = get_field('gt_option_1_text');
$option_2_text  = get_field('gt_option_2_text');
$option_3_text  = get_field('gt_option_3_text');
$option_4_text  = get_field('gt_option_4_text');
$option_5_text  = get_field('gt_option_5_text');

$options = [
  [
    'text'  => $option_1_text,
  ],
  [
    'text'  => $option_2_text,
  ],
  [
    'text'  => $option_3_text,
  ],
  [
    'text'  => $option_4_text,
  ],
  [
    'text'  => $option_5_text,
  ],
];
?>

<?php if ($form_type === 'gamified') : ?>

<section class="contact-form contact-form-cg section-special" id="contact-form">
  <div class="container">
    <h2 class="contact-form__title">
      <?php echo esc_html($gamified_title); ?>
    </h2>
    <form class="contact-form__wrapper-gt js-contact-form" data-form-type="gamified" action="#" method="post">
      <input type="hidden" name="form_type" value="gamified">
      <div class="contact-form__content-gt wysiwyg-content">
        <?php echo wp_kses_post($gamified_content); ?>
        <?php echo wp_kses_post($gamified_phone_html); ?>
      </div>
      <div class="contact-form__row">
        <input class="contact-form__input" type="text" name="name" placeholder="Name*" required>
        <input class="contact-form__input" type="email" name="email" placeholder="Email*" required>
      </div>
      <div class="custom-select input-interest" id="interestSelect">
        <div class="custom-select__trigger contact-form__input">
          <span class="custom-select__value">
            What are you interested in?*
          </span>
          <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M25.3327 12L15.9993 20L6.66602 12" stroke="#191A18" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </div>
        <ul class="custom-select__dropdown">
          <?php foreach ($options as $option) : ?>
            <?php
              $text = !empty($option['text'])
              ? trim($option['text'])
              : '';
              $value = sanitize_title($text);
            ?>
          <?php if (!empty($text)) : ?>
            <li class="custom-select__option" data-value="<?php echo esc_attr($value); ?>">
              <?php echo esc_html($text); ?>
            </li>
          <?php endif; ?>
          <?php endforeach; ?>
        </ul>
        <input type="hidden" name="interest" required>
      </div>
      <input class="contact-form__input input-date" type="text" name="preferred_date" placeholder="Preferred Date" required>
      <textarea class="contact-form__textarea-gt input-textarea" name="message" placeholder="Text of your request" required></textarea>
      <div class="contact-form__actions-gt">
        <button class="btn btn-secondary contact-form__btn-gt btn--orange" type="submit">
          <?php echo esc_html($gamified_button); ?>
        </button>
        <div class="checkbox checkbox-gt">
          <input type="checkbox" id="agree-gamified" name="agree" required>
          <label for="agree-gamified"> By subscribing, you agree to our
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('privacy-policy'))); ?>" target="_blank">
              Privacy Policy
            </a>
          </label>
        </div>
      </div>
      <div class="contact-form__image-wrapper-gt">
        <img class="contact-form__image-gt" src="<?php echo esc_url($contact_image_url); ?>" alt="">
      </div>
    </form>
    <div class="contact-form__success contact-form__success-gt js-form-success" hidden>
      <div class="contact-form__success-inner">
        <h3 class="contact-form__success-title">
          Thank you!
        </h3>
        <p class="contact-form__success-text">
          We will contact you shortly.
        </p>
      </div>
    </div>
  </div>
</section>

<?php else : ?>

<section class="contact-form section-special" id="contact-form">
  <div class="container">
    <h2 class="contact-form__title">
      <?php echo esc_html($default_title); ?>
    </h2>
    <form class="contact-form__wrapper js-contact-form" data-form-type="default" action="#" method="post">
      <input type="hidden" name="form_type" value="default">
      <div class="contact-form__content">
        <div class="contact-form__info">
          <?php echo wp_kses_post($contact_content); ?>
          <?php echo wp_kses_post($default_phone_html); ?>
        </div>
      </div>
      <div class="contact-form__fields">
        <input class="contact-form__input" type="text" name="name" placeholder="Name" required>
        <input class="contact-form__input" type="tel" name="phone" placeholder="Phone number" required>
        <input class="contact-form__input" type="text" name="company" placeholder="Company" required>
        <input class="contact-form__input" type="email" name="email" placeholder="Email" required>
      </div>
      <textarea class="contact-form__textarea" name="message" placeholder="Text of your request" required></textarea>
      <div class="contact-form__actions">
        <button class="btn btn-secondary contact-form__btn btn--orange" type="submit">
          <?php echo esc_html($default_button); ?>
        </button>
        <div class="checkbox">
          <input type="checkbox" id="agree-default" name="agree" required>
          <label for="agree-default">
            By subscribing, you agree to our
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('privacy-policy'))); ?>" target="_blank">
              Privacy Policy
            </a>
          </label>
        </div>
      </div>
      <div class="contact-form__success js-form-success" hidden>
        <div class="contact-form__success-inner">
          <h3 class="contact-form__success-title">
            Thank you!
          </h3>
          <p class="contact-form__success-text">
            We will contact you shortly.
          </p>
        </div>
      </div>
      <div class="contact-form__image-wrapper">
        <img class="contact-form__image" src="<?php echo esc_url($contact_image_url); ?>" alt="">
      </div>
    </form>
  </div>
</section>

<?php endif; ?>