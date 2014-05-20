<?php

if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'acf_books',
    'title' => 'Books',
    'fields' => array (
      array (
        'key' => 'field_537b523c6428c',
        'label' => 'Cover',
        'name' => 'cover',
        'type' => 'image',
        'required' => 1,
        'save_format' => 'object',
        'preview_size' => 'thumbnail',
        'library' => 'all',
      ),
      array (
        'key' => 'field_537b52546428d',
        'label' => 'Author',
        'name' => 'author',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_537b52676428e',
        'label' => 'Buy Link',
        'name' => 'buy_link',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_537b84468c9d0',
        'label' => 'Description',
        'name' => 'description',
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
          'value' => 'books',
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
  register_field_group(array (
    'id' => 'acf_links',
    'title' => 'Links',
    'fields' => array (
      array (
        'key' => 'field_537b52cfa5d1b',
        'label' => 'Link To',
        'name' => 'link',
        'type' => 'text',
        'required' => 1,
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_537b846fb9ea9',
        'label' => 'Description',
        'name' => 'description',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'links',
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

  register_field_group(array (
    'id' => 'acf_resource-tags',
    'title' => 'Resource tags',
    'fields' => array (
      array (
        'key' => 'field_537b5518718fc',
        'label' => 'Tags',
        'name' => 'tags',
        'type' => 'taxonomy',
        'required' => 1,
        'taxonomy' => 'resource_tag',
        'field_type' => 'checkbox',
        'allow_null' => 0,
        'load_save_terms' => 0,
        'return_format' => 'id',
        'multiple' => 0,
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'books',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'links',
          'order_no' => 0,
          'group_no' => 1,
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
