<?php

function sharan_from_header() {
  return 'From: ' . get_bloginfo('name') . ' <' . get_option('admin_email') . '>' . "\r\n";
}

function sharan_mail($to, $subject, $message) {
  if (defined('DEVELOPMENT') && DEVELOPMENT) :
    $debug_mail = <<<EOT

To: $to
Subject: $subject
Message:
$message

EOT;
    // echo $debug_mail;
    return true;
  else :
    return wp_mail($to, $subject, $message, sharan_from_header());
  endif;
}