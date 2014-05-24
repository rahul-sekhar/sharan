<?php

function sharan_from_header() {
  return 'From: ' . get_bloginfo('name') . ' <' . get_option('admin_email') . '>' . "\r\n";
}