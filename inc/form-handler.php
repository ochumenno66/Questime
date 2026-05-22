<?php

defined('ABSPATH') || exit;

function questime_process_form(): void
{
  wp_send_json_success([
    'test' => $_POST
  ]);

  return;

  // Защита от спама
  $ip = sanitize_text_field($_SERVER['REMOTE_ADDR'] ?? '0.0.0.0');

  $rate_key  = 'questime_rate_' . md5($ip);
  $rate_data = get_transient($rate_key) ?: [];

  $now = time();

  $rate_data = array_filter(
    $rate_data,
    fn($timestamp) => ($now - $timestamp) < 60
  );

  if (count($rate_data) >= 3) {
    wp_send_json_error([
      'error' => 'Too many requests. Please try again later.'
    ], 429);
  }

  $rate_data[] = $now;

  set_transient($rate_key, array_values($rate_data), 60);

  // Данные формы
  $form_type = sanitize_text_field(
    wp_unslash($_POST['form_type'] ?? 'default')
  );

  $name = sanitize_text_field(
    wp_unslash($_POST['name'] ?? '')
  );

  $phone = sanitize_text_field(
    wp_unslash($_POST['phone'] ?? '')
  );

  $company = sanitize_text_field(
    wp_unslash($_POST['company'] ?? '')
  );

  $email = sanitize_email(
    wp_unslash($_POST['email'] ?? '')
  );

  $message = sanitize_textarea_field(
    wp_unslash($_POST['message'] ?? '')
  );

  $interest = sanitize_text_field(
    wp_unslash($_POST['interest'] ?? '')
  );

  $preferred_date = sanitize_text_field(
    wp_unslash($_POST['preferred_date'] ?? '')
  );

  $agree = filter_var(
    $_POST['agree'] ?? '',
    FILTER_VALIDATE_BOOLEAN
  );

  // Валидация
  $errors = [];

  if (mb_strlen($name) < 2) {
    $errors['name'] = 'Enter your name';
  }

  if (!empty($phone)) {
    $digits = preg_replace('/\D/', '', $phone);

    if (strlen($digits) < 10) {
      $errors['phone'] = 'Enter correct phone number';
    }
  }

  if (!is_email($email)) {
    $errors['email'] = 'Enter correct email';
  }

  if (!$agree) {
    $errors['agree'] = 'You must agree to Privacy Policy';
  }

  if (!empty($errors)) {
    wp_send_json_error([
      'errors' => $errors
    ], 422);
  }

  // Email получателя
  $to = get_theme_mod(
    'questime_leads_email',
    get_option('admin_email')
  );

  // Заголовок
  $subject = 'New request from website';

  // Тип формы
  $form_labels = [
    'default'  => 'Default Form',
    'gamified' => 'Gamified Form',
    'modal'    => 'Modal Form',
  ];

  $form_name = $form_labels[$form_type] ?? 'Website Form';

  // Сообщение
  $email_message = "
New request from website

--------------------------------

Form Type: {$form_name}

Name: {$name}

Phone: {$phone}

Company: {$company}

Email: {$email}

Message:
{$message}
";

  // Доп поля gamified формы
  if ($form_type === 'gamified') {

    $email_message .= "

Interest: {$interest}

Preferred Date: {$preferred_date}
";
  }

  $email_message .= "

--------------------------------

Date: " . wp_date('d.m.Y H:i') . "

IP: {$ip}

Website: " . get_site_url();

  // Заголовки письма
  $headers = [
    'Content-Type: text/plain; charset=UTF-8',
    'Reply-To: ' . $email,
  ];

  // Отправка
  $sent = wp_mail(
    $to,
    $subject,
    $email_message,
    $headers
  );

  if ($sent) {

    wp_send_json_success([
      'message' => 'Thank you! We will contact you soon.'
    ]);

  } else {

    wp_send_json_error([
      'error' => 'Mail sending error. Please try later.'
    ], 500);
  }
}