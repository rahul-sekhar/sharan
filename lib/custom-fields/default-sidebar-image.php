<?php

// Field groups for the default sidebar image option

if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'acf_default-sidebar-image',
    'title' => 'Default Sidebar Image',
    'fields' => array (
      array (
        'key' => 'field_53186361dc997',
        'label' => 'Default Sidebar Image',
        'name' => 'default_sidebar_image',
        'type' => 'image',
        'save_format' => 'object',
        'preview_size' => 'post-thumbnail',
        'library' => 'all',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'options_page',
          'operator' => '==',
          'value' => 'acf-options-general',
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
