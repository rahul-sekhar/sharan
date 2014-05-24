<?php

function sharan_ajax_subscribe() {
  global $wpdb, $post;

  $email = isset($_POST['email']) ? trim(strip_tags($_POST['email'])) : null;

  if (!$email) {
    die(0);
  }

  // Check if subscription exists
  $exists = get_page_by_title($email, OBJECT, 'subscription');
  if ($exists) {
    $message = 'You are already subscribed';
    echo $message;
    die();
  }

  // Send a subscription email
  $to = get_field('subscriptions_email', 'options');
  $subject = 'Newsletter subscription';
  $message = $email . ' has subscribed to the newsletter.';
  $headers = 'From: ' . get_bloginfo('name') . ' <' . get_option('admin_email') . '>' . "\r\n";
  var_dump($to);
  var_dump($subject);
  var_dump($message);
  var_dump($headers);
  $success = wp_mail($to, $subject, $message, $headers);

  // Exit if sending the mail fails
  if (!$success) {
    die(0);
  }

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