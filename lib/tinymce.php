<?php

add_filter('mce_buttons', 'sharan_mce_buttons');
function sharan_mce_buttons( $buttons ) {
  return array(
    'bold',
    'italic',
    'formatselect',
    'styleselect',
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
  $init['theme_advanced_blockformats'] = 'p,h3, h4';

  // Add the dropdown styles
  $style_formats = array(
    array(
      'title' => 'Dropdown Title',
      'block' => 'h5',
      'classes' => 'dropdown-title',
    ),
    array(
      'title' => 'Dropdown Container',
      'block' => 'div',
      'classes' => 'dropdown-container',
      'wrapper' => true,
    ),
  );
  $init['style_formats'] = json_encode( $style_formats );

  return $init;
}

add_action('after_setup_theme', 'sharan_mce_styles');
function sharan_mce_styles() {
  add_editor_style('assets/css/editor.css');
  add_editor_style('//cloud.typography.com/6778852/633984/css/fonts.css');
}