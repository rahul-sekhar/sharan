<?php

if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'acf_consultation-registration',
    'title' => 'Consultation Registration',
    'fields' => array (
      array (
        'key' => 'field_538431b506e01',
        'label' => 'Price Options',
        'name' => 'consultation_price_options',
        'type' => 'repeater',
        'required' => 1,
        'sub_fields' => array (
          array (
            'key' => 'field_538426e7614f0',
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
            'key' => 'field_5390649a0b8de',
            'label' => 'Description',
            'name' => 'description',
            'type' => 'textarea',
            'default_value' => '',
            'placeholder' => '',
            'maxlength' => '',
            'rows' => '',
            'formatting' => 'br',
          ),
          array (
            'key' => 'field_538426ea614f1',
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
          'param' => 'options_page',
          'operator' => '==',
          'value' => 'acf-options-consultation',
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
