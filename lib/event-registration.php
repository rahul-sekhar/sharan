<?php

// Check if registrations are closed for an event
function registrations_closed( $event ) {
  // Get the registration closing date
  $closing_date = get_field('registration_closing_date', $event->ID);

  // Default to the event start date if this is not set
  if (!$closing_date) {
    $closing_date = get_field('from', $event->ID);
  }

  // Check if we have passed that date
  $registrations_closed = ($closing_date < date('Ymd'));
}


// Actual event registration
function register_event() {
  $payment_option = isset($_POST['payment_option']) ? (int)$_POST['payment_option'] : 0;
  $payment_option = get_field('payment_options')[$payment_option];

  $name = isset($_POST['name']) ? filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING) : null;
  $email = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL) : null;
  $phone = isset($_POST['phone']) ? filter_var(trim($_POST['phone']), FILTER_SANITIZE_STRING) : null;
  $address = isset($_POST['address']) ? filter_var(trim($_POST['address']), FILTER_SANITIZE_STRING) : null;
  $comments = isset($_POST['comments']) ? filter_var(trim($_POST['comments']), FILTER_SANITIZE_STRING) : null;

  // Check required fields
  if (!$name || !$email || !$phone || !$address || !$payment_option) {
    return false;
  }

  $event_name = get_the_title();
  $event_link = get_permalink();
  $payment_option_name = $payment_option['name'];
  $amount = $payment_option['price'];

  // Send a registration email
  $to = get_field('event_registrations_email', 'options');
  $subject = 'Event registration';
  $message = <<<EOT
Event: $event_name ($event_link)

Payment option: $payment_option_name

Amount: $amount

Name: $name

Email: $email

Phone: $phone

Address:
$address

Comments:
$comments
EOT;

  $success = sharan_mail($to, $subject, $message, sharan_from_header());

  /* Exit if sending the mail fails
   * This is top priority, it does not matter as much if the confirmation email
   * or adding of the item fail */
  if (!$success) {
    return false;
  }

  // Send a confirmation mail
  $to = $email;
  $subject = get_field('registrations_email_subject', 'options');
  $message = get_field('registrations_email_message', 'options');
  $message = html_entity_decode($message);

  // Message replacements
  $message_placeholders = array(':name', ':event_name', ':event_link', ':payment_option_name', ':amount');
  $message_replacements = array($name, $event_name, $event_link, $payment_option_name, $amount);
  $message = str_replace($message_placeholders, $message_replacements, $message);

  $success = sharan_mail($to, $subject, $message, sharan_from_header());

  // Add a registration to the database
  $registration = array(
    'post_title' => $event_name . ' - ' . $name,
    'post_status' => 'publish',
    'post_type' => 'registration'
  );
  $id = wp_insert_post($registration);

  // Set fields
  update_field('field_53835a4938d7d', $name, $id);
  update_field('field_53835a5b38d7e', $email, $id);
  update_field('field_53835a6338d7f', $phone, $id);
  update_field('field_53835a6a38d80', $address, $id);
  update_field('field_53835a7238d81', $comments, $id);

  update_field('field_53835a8c38d82', false, $id);
  update_field('field_53835a9c38d83', get_the_ID(), $id);

  update_field('field_5383609e116b2', $payment_option_name, $id);
  update_field('field_538360ef116b3', $amount, $id);

  return true;
}