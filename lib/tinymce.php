<?php

add_filter('mce_buttons', 'sharan_mce_buttons');
function sharan_mce_buttons( $buttons ) {
  return array(
    'bold',
    'italic',
    'formatselect',
    'link',
    'unlink',
    'fullscreen',
    'wp_adv'
  );
}

add_filter('mce_buttons_2', 'sharan_mce_buttons_2');
function sharan_mce_buttons_2( $buttons ) {
  return array(
    'bullist',
    'numlist',
    'blockquote',
    'outdent',
    'indent',
    'pastetext',
    'pasteword',
    'removeformat',
    'charmap',
    'undo',
    'redo'
  );
}

add_filter('tiny_mce_before_init', 'sharan_mce_formats' );
function sharan_mce_formats($init) {
  $init['theme_advanced_blockformats'] = 'p,h3';
  return $init;
}
