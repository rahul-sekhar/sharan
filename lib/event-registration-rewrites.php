<?php

// Add rewrite rule and query args
function sharan_event_registration_query_vars( $vars ){
  $vars[] = "event";
  $vars[] = "register";
  return $vars;
}
add_filter( 'query_vars', 'sharan_event_registration_query_vars' );

function sharan_event_registration_rewrite_rules($rules) {
  $newRules = array(
    'events/([^/]*)/register/?$' => 'index.php?register=event&event=$matches[1]',
    'consultation/register/?$' => 'index.php?register=consultation'
  );
  $rules = $newRules + $rules;
  return $rules;
}
add_filter('rewrite_rules_array', 'sharan_event_registration_rewrite_rules');

function sharan_event_registration_templates() {
  define("SSL", true);

  if (defined('SSL')) :
    if ( get_query_var('register')) :
      if (!is_ssl()) :
        // header('HTTP/1.1 301 Moved Permanently');
        header("Location: https://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]);
        exit();
      endif;
    else :
      if (is_ssl()) :
        // header('HTTP/1.1 301 Moved Permanently');
        header("Location: http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]);
        exit();
      endif;
    endif;
  endif;

  if ( get_query_var( 'register' ) == 'event') {
    add_filter( 'template_include', function() {
      return get_template_directory() . '/register.php';
    });
  }

  if ( get_query_var( 'register' ) == 'consultation') {
    add_filter( 'template_include', function() {
      return get_template_directory() . '/register-consultation.php';
    });
  }
}
add_action( 'template_redirect', 'sharan_event_registration_templates' );

// Title for rewritten pages
function sharan_event_registration_wp_title( $title, $sep) {

  if ( get_query_var('register') == 'event') {
    $event = get_page_by_path(get_query_var('event'), OBJECT, 'events');
    if ($event) {
      $base_title = 'Register for ' . $event->post_title;
    }
  } elseif ( get_query_var( 'register' ) == 'consultation') {
    $base_title = 'Register for a consultation';
  }

  if (isset($base_title)) {
    return $base_title . " $sep " . get_bloginfo( 'name' );
  } else {
    return $title;
  }
}
add_filter( 'wp_title', 'sharan_event_registration_wp_title', 10, 2 );
