<?php

if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'acf_subscriptions',
    'title' => 'Subscriptions',
    'fields' => array (
      array (
        'key' => 'field_sub_53835a5b38d7e',
        'label' => 'Email',
        'name' => 'email',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_sub_53835a4938d7d',
        'label' => 'City',
        'name' => 'city',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_sub_53835a6a38d80',
        'label' => 'Country',
        'name' => 'country',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_sub_53835a6338d7f',
        'label' => 'Mobile',
        'name' => 'mobile',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_sub_53835a7238d81',
        'label' => 'Comments',
        'name' => 'comments',
        'type' => 'textarea',
        'default_value' => '',
        'placeholder' => '',
        'maxlength' => '',
        'rows' => '',
        'formatting' => 'none',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'subscription',
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
