<?php

// Add rewrite rule and query args
function sharan_form_query_vars( $vars ){
  $vars[] = "event";
  $vars[] = "register";
  $vars[] = "subscribe";
  return $vars;
}
add_filter( 'query_vars', 'sharan_form_query_vars' );

function sharan_form_rewrite_rules($rules) {
  $newRules = array(
    'events/([^/]*)/register/?$' => 'index.php?register=event&event=$matches[1]',
    'consultation/register/?$' => 'index.php?register=consultation',
    'subscribe/?$' => 'index.php?subscribe=true'
  );
  $rules = $newRules + $rules;
  return $rules;
}
add_filter('rewrite_rules_array', 'sharan_form_rewrite_rules');

function sharan_form_templates() {
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

  if ( get_query_var( 'subscribe' )) {
    add_filter( 'template_include', function() {
      return get_template_directory() . '/subscribe.php';
    });
  }
}
add_action( 'template_redirect', 'sharan_form_templates' );

// Title for rewritten pages
function sharan_form_wp_title( $title, $sep) {

  if ( get_query_var('register') == 'event') {
    $event = get_page_by_path(get_query_var('event'), OBJECT, 'events');
    if ($event) {
      $base_title = 'Register for ' . $event->post_title;
    }

  } elseif ( get_query_var( 'register' ) == 'consultation') {
    $base_title = 'Register for a consultation';

  } elseif ( get_query_var( 'subscribe' )) {
    $base_title = 'Subscribe to our newsletter';
  }

  if (isset($base_title)) {
    return $base_title . " $sep " . get_bloginfo( 'name' );
  } else {
    return $title;
  }
}
add_filter( 'wp_title', 'sharan_form_wp_title', 10, 2 );
