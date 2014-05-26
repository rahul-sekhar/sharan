<?php

function sharan_mail($to, $subject, $message, $headers) {
  if (DEVELOPMENT) :
    echo <<<EOT

Headers:
$headers
To: $to
Subject: $subject
Message:
$message

EOT;
    return true;
  else :
    return wp_mail($to, $subject, $message, $headers);
  endif;
}