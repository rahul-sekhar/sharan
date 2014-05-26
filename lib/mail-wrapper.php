<?php

function sharan_mail($to, $subject, $message, $headers) {
  if (defined('DEVELOPMENT') && DEVELOPMENT) :
    $debug_mail = <<<EOT

Headers:
$headers
To: $to
Subject: $subject
Message:
$message

EOT;
    // echo $debug_mail;
    return true;
  else :
    return wp_mail($to, $subject, $message, $headers);
  endif;
}