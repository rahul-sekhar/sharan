<?php

// Check if registrations are closed for an event
function registrations_closed( $event ) {
  if (!$event) {
    return true;
  }

  // Get the registration closing date
  $closing_date = get_field('registration_closing_date', $event->ID);

  // Default to the event start date if this is not set
  if (!$closing_date) {
    $closing_date = get_field('from', $event->ID);
  }

  // Check if we have passed that date
  return ($closing_date < date('Ymd'));
}

// Check if registrations are allowed for an event
function registrations_allowed( $event ) {
  if (!$event) {
    return false;
  }
  return (bool)get_field('price_options', $event->ID);
}

function registration_return_path() {
  if ( get_query_var( 'register' ) == 'event') {
    return get_the_permalink();
  } else {
    return '/consultation';
  }
}

function get_registration_options() {
  if (get_query_var('register') == 'event') :
    return get_field('price_options');
  else :
    return get_field('consultation_price_options', 'options');
  endif;
}

function get_registration_name() {
  if (get_query_var('register') == 'event') :
    return get_the_title();
  else :
    return 'Consultation';
  endif;
}

function sharan_register() {
  if ( get_query_var( 'register' ) == 'event') {
    return register_event();
  } else {
    return register_consultation();
  }
}

function sanitize_registration_fields() {
  $_POST['price_option'] = isset($_POST['price_option']) ? (int)$_POST['price_option'] : 0;
  $_POST['name'] = isset($_POST['name']) ? filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING) : null;
  $_POST['email'] = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL) : null;
  $_POST['phone'] = isset($_POST['phone']) ? filter_var(trim($_POST['phone']), FILTER_SANITIZE_STRING) : null;
  $_POST['address'] = isset($_POST['address']) ? filter_var(trim($_POST['address']), FILTER_SANITIZE_STRING) : null;
  $_POST['comments'] = isset($_POST['comments']) ? filter_var(trim($_POST['comments']), FILTER_SANITIZE_STRING) : null;
}


// Actual event registration
function register_event() {
  sanitize_registration_fields();
  $price_option = get_field('price_options')[$_POST['price_option']];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $comments = $_POST['comments'];

  // Check required fields
  if (!$name || !$email || !$phone || !$address || !$price_option) {
    return false;
  }

  $event_name = get_the_title();
  $event_link = get_permalink();
  $price_option_name = $price_option['name'];
  $amount = $price_option['price'];

  // Send a registration email
  $to = get_field('event_registration_email', 'options');
  $subject = 'Event registration';
  $message = <<<EOT
Event: $event_name ($event_link)

Payment option: $price_option_name

Amount: $amount

Name: $name

Email: $email

Phone: $phone

Address:
$address

Comments:
$comments
EOT;

  $success = sharan_mail($to, $subject, $message);

  /* Exit if sending the mail fails
   * This is top priority, it does not matter as much if the confirmation email
   * or adding of the item fail */
  if (!$success) {
    return false;
  }

  // Send a confirmation mail
  $to = $email;
  $subject = get_field('event_registration_email_subject', 'options');
  $subject = html_entity_decode($subject);
  $message = get_field('event_registration_email_message', 'options');
  $message = html_entity_decode($message);

  // Message replacements
  $message_placeholders = array(':name', ':event_name', ':event_link', ':price_option_name', ':amount');
  $message_replacements = array($name, $event_name, $event_link, $price_option_name, $amount);
  $message = str_replace($message_placeholders, $message_replacements, $message);

  $success = sharan_mail($to, $subject, $message);

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

  update_field('field_5383609e116b2', $price_option_name, $id);
  update_field('field_538360ef116b3', $amount, $id);

  return true;
}

function register_consultation() {
  sanitize_registration_fields();
  $price_option = get_field('consultation_price_options', 'options')[$_POST['price_option']];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $comments = $_POST['comments'];

  // Check required fields
  if (!$name || !$email || !$phone || !$address || !$price_option) {
    return false;
  }

  $price_option_name = $price_option['name'];
  $amount = $price_option['price'];

  // Send a registration email
  $to = get_field('consultation_registration_email', 'options');
  $subject = 'Consultation registration';
  $message = <<<EOT
Payment option: $price_option_name

Amount: $amount

Name: $name

Email: $email

Phone: $phone

Address:
$address

Comments:
$comments
EOT;
  $message = html_entity_decode($message);

  $success = sharan_mail($to, $subject, $message);

  /* Exit if sending the mail fails
   * This is top priority, it does not matter as much if the confirmation email
   * or adding of the item fail */
  if (!$success) {
    return false;
  }

  // Send a confirmation mail
  $to = $email;
  $subject = get_field('consultation_registration_email_subject', 'options');
  $subject = html_entity_decode($subject);
  $message = get_field('consultation_registration_email_message', 'options');

  // Message replacements
  $message_placeholders = array(':name', ':price_option_name', ':amount');
  $message_replacements = array($name, $price_option_name, $amount);
  $message = str_replace($message_placeholders, $message_replacements, $message);
  $message = html_entity_decode($message);

  $success = sharan_mail($to, $subject, $message);

  // Add a registration to the database
  $registration = array(
    'post_title' => 'Consultation - ' . $name,
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

  update_field('field_53835a8c38d82', true, $id);

  update_field('field_5383609e116b2', $price_option_name, $id);
  update_field('field_538360ef116b3', $amount, $id);

  return true;
}