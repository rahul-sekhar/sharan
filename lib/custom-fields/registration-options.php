<?php

if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'acf_registration-faq',
    'title' => 'Registration FAQ',
    'fields' => array (
      array (
        'key' => 'field_537f938ce0d8f',
        'label' => 'Registration FAQ',
        'name' => 'registration_faq',
        'type' => 'wysiwyg',
        'default_value' => '',
        'toolbar' => 'full',
        'media_upload' => 'no',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'options_page',
          'operator' => '==',
          'value' => 'acf-options-registration',
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
