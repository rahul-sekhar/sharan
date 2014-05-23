<?php

if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'acf_event-registration',
    'title' => 'Event Registration',
    'fields' => array (
      array (
        'key' => 'field_537f8a6a72624',
        'label' => 'Payment Options',
        'name' => 'payment_options',
        'type' => 'repeater',
        'required' => 1,
        'sub_fields' => array (
          array (
            'key' => 'field_537f8ba472625',
            'label' => 'Name',
            'name' => 'name',
            'type' => 'text',
            'required' => 1,
            'column_width' => '',
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'none',
            'maxlength' => '',
          ),
          array (
            'key' => 'field_537f8bbc72626',
            'label' => 'Price',
            'name' => 'price',
            'type' => 'number',
            'required' => 1,
            'column_width' => '',
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'min' => 1,
            'max' => '',
            'step' => '',
          ),
        ),
        'row_min' => 1,
        'row_limit' => '',
        'layout' => 'row',
        'button_label' => 'Add Option',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'events',
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
