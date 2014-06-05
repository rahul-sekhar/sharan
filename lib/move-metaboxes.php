<?php

add_action('do_meta_boxes', 'sharan_move_meta_boxes');
function sharan_move_meta_boxes(){
  sharan_move_image_meta_box('page');
  sharan_move_image_meta_box('people');
}

function sharan_move_image_meta_box($post_type) {
  remove_meta_box( 'postimagediv', $post_type, 'side' );
  add_meta_box('postimagediv', __('Image'), 'post_thumbnail_meta_box', $post_type, 'normal', 'high');
}