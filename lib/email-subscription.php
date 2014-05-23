<?php

function sharan_ajax_subscribe() {
  global $wpdb, $post;

  $email = isset($_POST['email']) ? strip_tags($_POST['email']) : null;

  if (!$email) {
    die(0);
  }

  $message = 'Thank you for subscribing';
  echo $message;

  die(); // this is required to return a proper result
}

add_action( 'wp_ajax_nopriv_subscribe', 'sharan_ajax_subscribe' );
add_action( 'wp_ajax_subscribe', 'sharan_ajax_subscribe' );