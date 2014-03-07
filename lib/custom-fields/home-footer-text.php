<?php

if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'acf_home-footer-text',
    'title' => 'Home Footer Text',
    'fields' => array (
      array (
        'key' => 'field_5319748819bf3',
        'label' => 'Footer Text',
        'name' => 'footer_text',
        'type' => 'textarea',
        'instructions' => 'This text will appear in the footer of the home page',
        'default_value' => '',
        'placeholder' => '',
        'maxlength' => '',
        'formatting' => 'html',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'options_page',
          'operator' => '==',
          'value' => 'acf-options-home-page',
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
    'menu_order' => 1,
  ));
}
