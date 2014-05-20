<?php
/**
 * Roots initial setup and constants
 */
function roots_setup() {
  // Add post thumbnails (http://codex.wordpress.org/Post_Thumbnails)
  add_theme_support('post-thumbnails');
  set_post_thumbnail_size(225, 0, false);
  add_image_size('event-small', 115, 90, true);
  add_image_size('event-medium', 210, 150, true);
  add_image_size('person', 120, 120, true);
  add_image_size('slideshow', 1100, 600, true);
  add_image_size('nav-feature', 196, 132, true);
  add_image_size('book', 130, 0, true);
}
add_action('after_setup_theme', 'roots_setup');

// Flush rewrite rules after switching themes
function bones_flush_rewrite_rules() {
  flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'bones_flush_rewrite_rules' );