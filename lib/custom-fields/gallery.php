<?php

if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'acf_gallery',
    'title' => 'Gallery',
    'fields' => array (
      array (
        'key' => 'field_5380462551da8',
        'label' => 'Picasa usernames',
        'name' => 'picasa_usernames',
        'type' => 'text',
        'instructions' => 'Enter a comma separated list of picasa usernames',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => '',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'options_page',
          'operator' => '==',
          'value' => 'acf-options-gallery',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'normal',
      'layout' => 'no_box',
      'hide_on_screen' => array (
      ),
    ),
    'menu_order' => 0,
  ));
}
