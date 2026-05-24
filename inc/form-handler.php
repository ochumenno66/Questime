<?php
defined('ABSPATH') || exit;
function questime_process_form(): void
{
  // Защита от спама
  $ip = sanitize_text_field($_SERVER['REMOTE_ADDR'] ?? '0.0.0.0');
  $rate_key = 'questime_rate_' . md5($ip);
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

  if (empty($name)) {
    $errors['name'] = 'Enter your name';
  } elseif (mb_strlen($name) < 2) {
    $errors['name'] = 'Name is too short';
  }

  // Телефон обязателен только не для gamified формы
  if ($form_type !== 'gamified') {
    if (empty($phone)) {
      $errors['phone'] = 'Enter phone number';
    } else {
      $digits = preg_replace('/\D/', '', $phone);
      if (strlen($digits) < 8) {
        $errors['phone'] = 'Enter correct phone number';
      }
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

  // Получатель
  $to = get_theme_mod(
    'questime_leads_email',
    'info@questime.com'
  );

  // Заголовок письма
  $subject = 'Questime - New website request';

  // Названия форм
  $form_labels = [
    'default'  => 'Default Form',
    'gamified' => 'Gamified Form',
    'modal'    => 'Modal Form',
  ];

  $form_name = $form_labels[$form_type] ?? 'Website Form';

  // Сообщение письма
  $email_message = "New request from Questime website\n";
  $email_message .= str_repeat('-', 40) . "\n";
  $email_message .= "Form Type: {$form_name}\n";
  $email_message .= "Name: {$name}\n";
  if (!empty($phone)) {
    $email_message .= "Phone: {$phone}\n";
  }

  if (!empty($company)) {
    $email_message .= "Company: {$company}\n";
  }

  $email_message .= "Email: {$email}\n";

  // Дополнительные поля gamified формы
  if ($form_type === 'gamified') {
    if (!empty($interest)) {
      $email_message .= "Interest: {$interest}\n";
    }

    if (!empty($preferred_date)) {
      $email_message .= "Preferred Date: {$preferred_date}\n";
    }
  }

  // Сообщение
  if (!empty($message)) {
    $email_message .= str_repeat('-', 40) . "\n";
    $email_message .= "Message:\n{$message}\n";
  }

  // Системная информация
  $email_message .= str_repeat('-', 40) . "\n";
  $email_message .= "Date: " . wp_date('d.m.Y H:i') . "\n";
  $email_message .= "IP: {$ip}\n";
  $email_message .= "Website: " . get_site_url() . "\n";

  // Headers
  $headers = [
    'Content-Type: text/plain; charset=UTF-8',
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