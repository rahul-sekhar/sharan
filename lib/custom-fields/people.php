<?php

if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'acf_people',
    'title' => 'People',
    'fields' => array (
      array (
        'key' => 'field_5318b006033b5',
        'label' => 'Image',
        'name' => 'image',
        'type' => 'image',
        'required' => 1,
        'save_format' => 'object',
        'preview_size' => 'person',
        'library' => 'all',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'people',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'acf_after_title',
      'layout' => 'no_box',
      'hide_on_screen' => array (
      ),
    ),
    'menu_order' => 0,
  ));
}
