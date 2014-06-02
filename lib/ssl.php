<?php

function check_ssl($url) {
  if ( is_ssl() ) {
    return str_replace('http://', 'https://', $url);
  } else {
    return $url;
  }

}