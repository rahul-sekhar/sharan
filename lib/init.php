<?php
/**
 * Roots initial setup and constants
 */
function roots_setup() {
  // Add post thumbnails (http://codex.wordpress.org/Post_Thumbnails)
  add_theme_support('post-thumbnails');
  set_post_thumbnail_size(225, 0, false);
  // add_image_size('category-thumb', 300, 9999); // 300px wide (and unlimited height)
}
add_action('after_setup_theme', 'roots_setup');
