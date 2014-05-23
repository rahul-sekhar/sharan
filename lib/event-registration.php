<?php

// Add rewrite rule and query args
function sharan_event_registration_query_vars( $vars ){
  $vars[] = "event";
  return $vars;
}
add_filter( 'query_vars', 'sharan_event_registration_query_vars' );

function sharan_event_registration_rewrite_rules($rules) {
  $newRules = array(
    'events/([^/]*)/register/?$' => 'index.php?pagename=register&event=$matches[1]',
    'consultation/register/?$' => 'index.php?pagename=consultation-register'
  );
  $rules = $newRules + $rules;
  return $rules;
}
add_filter('rewrite_rules_array', 'sharan_event_registration_rewrite_rules');