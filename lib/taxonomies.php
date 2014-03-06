<?php

// Remove the taxonomy metaboxes
function remove_event_taxonomy_metaboxes() {
  remove_meta_box( 'tagsdiv-city', 'events', 'side' );
  remove_meta_box( 'tagsdiv-event_tag', 'events', 'side' );
  remove_meta_box( 'tagsdiv-event_type', 'events', 'side' );
}
add_action( 'admin_menu' , 'remove_event_taxonomy_metaboxes' );

// Function to get a single taxonomy term
function sharan_get_taxonomy_item($taxonomy_slug, $post_id = null) {
  if (!$post_id) {
    $post_id = get_the_ID();
  }

  $items = wp_get_post_terms($post_id, $taxonomy_slug, array('fields' => 'names'));

  if ($items) {
    return $items[0];
  }
}