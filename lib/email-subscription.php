<?php

function sharan_ajax_subscribe() {
  global $wpdb, $post;

  $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : null;

  if (!$email) {
    die(0);
  }

  // Check if subscription exists
  $exists = get_page_by_title($email, OBJECT, 'subscription');
  if ($exists && $exists->post_status != 'trash') {
    $message = 'You are already subscribed';
    echo $message;
    die();
  }

  // Send a subscription email
  $to = get_field('subscriptions_email', 'options');
  $subject = 'Newsletter subscription';
  $message = $email . ' has subscribed to the newsletter.';
  $success = sharan_mail($to, $subject, $message, sharan_from_header());

  /* Exit if sending the mail fails
   * This is top priority, it does not matter as much if the confirmation email
   * or adding of the item fail */
  if (!$success) {
    die(0);
  }

  // Send a confirmation mail
  $to = $email;
  $subject = get_field('subscriptions_email_subject', 'options');
  $message = get_field('subscriptions_email_message', 'options');
  $message = html_entity_decode($message);
  $success = sharan_mail($to, $subject, $message, sharan_from_header());

  // Add a subscription to the database
  $subscription = array(
    'post_title' => $email,
    'post_status' => 'publish',
    'post_type' => 'subscription'
  );
  $id = wp_insert_post($subscription);

  $message = 'Thank you for subscribing';
  echo $message;

  die(); // this is required to return a proper result
}

add_action( 'wp_ajax_nopriv_subscribe', 'sharan_ajax_subscribe' );
add_action( 'wp_ajax_subscribe', 'sharan_ajax_subscribe' );