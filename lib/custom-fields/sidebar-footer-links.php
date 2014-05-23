<?php

if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'acf_social-links',
    'title' => 'Social Links',
    'fields' => array (
      array (
        'key' => 'field_537f650170158',
        'label' => 'Donate Link',
        'name' => 'donate_link',
        'type' => 'page_link',
        'required' => 1,
        'post_type' => array (
          0 => 'page',
        ),
        'allow_null' => 0,
        'multiple' => 0,
      ),
      array (
        'key' => 'field_537f651970159',
        'label' => 'Contact Link',
        'name' => 'contact_link',
        'type' => 'page_link',
        'required' => 1,
        'post_type' => array (
          0 => 'page',
        ),
        'allow_null' => 0,
        'multiple' => 0,
      ),
      array (
        'key' => 'field_531be78f7a228',
        'label' => 'Social Links',
        'name' => 'social_links',
        'type' => 'repeater',
        'sub_fields' => array (
          array (
            'key' => 'field_531be7a77a229',
            'label' => 'Type',
            'name' => 'type',
            'type' => 'select',
            'required' => 1,
            'column_width' => '',
            'choices' => array (
              'facebook' => 'Facebook',
              'gplus' => 'Google Plus',
              'twitter' => 'Twitter',
              'youtube' => 'Youtube',
              'tumblr' => 'Tumblr',
            ),
            'default_value' => '',
            'allow_null' => 0,
            'multiple' => 0,
          ),
          array (
            'key' => 'field_531be7f47a22a',
            'label' => 'URL',
            'name' => 'url',
            'type' => 'text',
            'required' => 1,
            'column_width' => '',
            'default_value' => '',
            'placeholder' => 'http://',
            'prepend' => '',
            'append' => '',
            'formatting' => 'none',
            'maxlength' => '',
          ),
        ),
        'row_min' => '',
        'row_limit' => '',
        'layout' => 'table',
        'button_label' => 'Add Link',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'options_page',
          'operator' => '==',
          'value' => 'acf-options-sidebar-and-footer-links',
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
