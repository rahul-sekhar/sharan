<?php

function sharan_subscribe() {
  global $wpdb, $post;

  $name = isset($_POST['name']) ? filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING) : null;
  $email = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL) : null;
  $city = isset($_POST['city']) ? filter_var(trim($_POST['city']), FILTER_SANITIZE_STRING) : null;
  $country = isset($_POST['country']) ? filter_var(trim($_POST['country']), FILTER_SANITIZE_STRING) : null;
  $mobile = isset($_POST['mobile']) ? filter_var(trim($_POST['mobile']), FILTER_SANITIZE_STRING) : null;
  $comments = isset($_POST['comments']) ? filter_var(trim($_POST['comments']), FILTER_SANITIZE_STRING) : null;

  // Check required fields
  if (!$name || !$city || !$country || !$email) {
    return false;
  }

  // Send a subscription email
  $to = get_field('subscription_email', 'options');
  $subject = 'Newsletter subscription';
  $message = <<<EOT
Name: $name

Email: $email

City: $city

Country: $country

Mobile: $mobile

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
  $subject = get_field('subscription_email_subject', 'options');
  $subject = html_entity_decode($subject);
  $message = get_field('subscription_email_message', 'options');

  // Message replacements
  $message_placeholders = array(':name', ':email');
  $message_replacements = array($name, $email);
  $message = str_replace($message_placeholders, $message_replacements, $message);
  $message = html_entity_decode($message);

  $success = sharan_mail($to, $subject, $message);

  // Add a subscription to the database
  $subscription = array(
    'post_title' => $name,
    'post_status' => 'publish',
    'post_type' => 'subscription'
  );
  $id = wp_insert_post($subscription);

  // Set fields
  update_field('field_sub_53835a5b38d7e', $email, $id);
  update_field('field_sub_53835a4938d7d', $city, $id);
  update_field('field_sub_53835a6a38d80', $country, $id);
  update_field('field_sub_53835a6338d7f', $mobile, $id);
  update_field('field_sub_53835a7238d81', $comments, $id);

  return true;
}