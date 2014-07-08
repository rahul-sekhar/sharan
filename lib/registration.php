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

// Sends registration emails, given a registration object
function sharan_registration_mails($id) {
  $is_event = !get_field('consultation', $id);
  $gateway = !(get_field('status', $id) == 'Offline payment');

  $name = get_field('name', $id);
  $email = get_field('email', $id);
  $phone = get_field('phone', $id);
  $address = get_field('address', $id);
  $comments = get_field('comments', $id);
  $price_option_name = get_field('price_option', $id);
  $amount = get_field('amount', $id);
  $transaction_id = get_field('transaction_id', $id);

  $payment_type = $gateway ? '(Payzippy)' : '(Manual)';

  if ($is_event) :
    $event_id = get_field('event', $id);
    $event_name = get_the_title($event_id);
    $event_link = get_permalink($event_id);

    $to = get_field('event_registration_email', 'options');
    $subject = 'Event registration ' . $payment_type;
    $message = "Event: $event_name ($event_link)\n";
  else :
    $to = get_field('consultation_registration_email', 'options');
    $subject = 'Consultation registration ' . $payment_type;
    $message = "";
  endif;

  $message .= <<<EOT
Transaction ID: $transaction_id

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

  sharan_mail($to, $subject, $message);

  // Send a confirmation mail
  $to = $email;
  $message_placeholders = array(':name', ':price_option_name', ':amount', ':transaction_id');
  $message_replacements = array($name, $price_option_name, $amount, $transaction_id);
  if ($is_event) :
    if ($gateway) :
      $subject = get_field('event_registration_email_subject', 'options');
      $message = get_field('event_registration_email_message', 'options');
    else :
      $subject = get_field('manual_event_registration_email_subject', 'options');
      $message = get_field('manual_event_registration_email_message', 'options');
    endif;
    array_push($message_placeholders, ':event_name', ':event_link');
    array_push($message_replacements, $event_name, $event_link);
  else :
    if ($gateway) :
      $subject = get_field('consultation_registration_email_subject', 'options');
      $message = get_field('consultation_registration_email_message', 'options');
    else :
      $subject = get_field('manual_consultation_registration_email_subject', 'options');
      $message = get_field('manual_consultation_registration_email_message', 'options');
    endif;
  endif;

  $subject = html_entity_decode($subject);
  $message = str_replace($message_placeholders, $message_replacements, $message);
  $message = html_entity_decode($message);

  sharan_mail($to, $subject, $message);
}