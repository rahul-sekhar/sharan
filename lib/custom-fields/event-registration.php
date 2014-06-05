<?php

if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'acf_event-registration',
    'title' => 'Event Registration',
    'fields' => array (
      array (
        'key' => 'field_5384318406dff',
        'label' => 'Early bird',
        'name' => 'early_bird',
        'type' => 'true_false',
        'message' => '',
        'default_value' => 0,
      ),
      array (
        'key' => 'field_5384319806e00',
        'label' => 'Early bird end date',
        'name' => 'early_bird_end_date',
        'type' => 'date_picker',
        'instructions' => 'The early bird period will include the picked date',
        'required' => 1,
        'conditional_logic' => array (
          'status' => 1,
          'rules' => array (
            array (
              'field' => 'field_5384318406dff',
              'operator' => '==',
              'value' => '1',
            ),
          ),
          'allorany' => 'all',
        ),
        'date_format' => 'yymmdd',
        'display_format' => 'dd/mm/yy',
        'first_day' => 1,
      ),
      array (
        'key' => 'field_537f8a6a72624',
        'label' => 'Price Options',
        'name' => 'price_options',
        'type' => 'repeater',
        'instructions' => 'If left blank, the register button will not be displayed',
        'required' => 0,
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
            'key' => 'field_e_5390649a0b8de',
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
          array (
            'key' => 'field_538431c106e02',
            'label' => 'Early bird price',
            'name' => 'early_bird_price',
            'type' => 'number',
            'conditional_logic' => array (
              'status' => 1,
              'rules' => array (
                array (
                  'field' => 'field_5384318406dff',
                  'operator' => '==',
                  'value' => '1',
                ),
              ),
              'allorany' => 'all',
            ),
            'column_width' => '',
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'min' => '',
            'max' => '',
            'step' => '',
          ),
        ),
        'row_min' => 0,
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
