<?php

if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'acf_default-resource-tag',
    'title' => 'Default resource tag',
    'fields' => array (
      array (
        'key' => 'field_537f5f6812d69',
        'label' => 'Resource tag to be selected by default',
        'name' => 'default_resource_tag',
        'type' => 'taxonomy',
        'taxonomy' => 'resource_tag',
        'field_type' => 'select',
        'allow_null' => 0,
        'load_save_terms' => 0,
        'return_format' => 'id',
        'multiple' => 0,
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'options_page',
          'operator' => '==',
          'value' => 'acf-options-resources',
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
