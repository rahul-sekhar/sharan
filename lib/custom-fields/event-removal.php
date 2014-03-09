<?php

if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'acf_event-removal-fields',
    'title' => 'Event removal fields',
    'fields' => array (
      array (
        'key' => 'field_531bf81c6e10f',
        'label' => 'Number of days to wait before removing events',
        'name' => 'event_wait_days',
        'type' => 'number',
        'default_value' => 0,
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'min' => '',
        'max' => '',
        'step' => '',
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