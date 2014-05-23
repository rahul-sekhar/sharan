<?php
if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'acf_people',
    'title' => 'People',
    'fields' => array (
      array (
        'key' => 'field_537f17b36a9b5',
        'label' => 'Short description',
        'name' => 'short_description',
        'type' => 'textarea',
        'default_value' => '',
        'placeholder' => '',
        'maxlength' => '',
        'rows' => '',
        'formatting' => 'br',
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
      'position' => 'normal',
      'layout' => 'no_box',
      'hide_on_screen' => array (
      ),
    ),
    'menu_order' => 0,
  ));
}
