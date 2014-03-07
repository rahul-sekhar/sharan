<?php

if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'acf_slideshow',
    'title' => 'Slideshow',
    'fields' => array (
      array (
        'key' => 'field_5318a32f66709',
        'label' => 'Slides',
        'name' => 'slides',
        'type' => 'repeater',
        'sub_fields' => array (
          array (
            'key' => 'field_5318a3416670a',
            'label' => 'Image',
            'name' => 'image',
            'type' => 'image',
            'instructions' => 'Please make sure the image is at least 1100x500 pixels in size',
            'required' => 1,
            'column_width' => '',
            'save_format' => 'object',
            'preview_size' => 'thumbnail',
            'library' => 'all',
          ),
          array (
            'key' => 'field_5318a3596670b',
            'label' => 'Text',
            'name' => 'text',
            'type' => 'text',
            'column_width' => '',
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'none',
            'maxlength' => '',
          ),
          array (
            'key' => 'field_5318a3666670c',
            'label' => 'Link Text',
            'name' => 'link_text',
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
            'key' => 'field_5318a37d6670d',
            'label' => 'Link URL',
            'name' => 'link_url',
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
        ),
        'row_min' => 1,
        'row_limit' => '',
        'layout' => 'row',
        'button_label' => 'Add a Slide',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'options_page',
          'operator' => '==',
          'value' => 'acf-options-slideshow',
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