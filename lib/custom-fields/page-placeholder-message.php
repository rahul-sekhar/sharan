<?php

if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'acf_placeholder-messages',
    'title' => 'Placeholder messages',
    'fields' => array (
      array (
        'key' => 'field_537d9de77baa4',
        'label' => 'Warning',
        'name' => '',
        'type' => 'message',
        'message' => '<strong>Do not delete this page, it is a placeholder</strong>',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'page_template',
          'operator' => '==',
          'value' => 'resources-page-template.php',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
      array (
        array (
          'param' => 'page_template',
          'operator' => '==',
          'value' => 'news-page-template.php',
          'order_no' => 0,
          'group_no' => 1,
        ),
      ),
      array (
        array (
          'param' => 'page_template',
          'operator' => '==',
          'value' => 'front-page-template.php',
          'order_no' => 0,
          'group_no' => 2,
        ),
      ),
      array (
        array (
          'param' => 'page_template',
          'operator' => '==',
          'value' => 'events-page-template.php',
          'order_no' => 0,
          'group_no' => 3,
        ),
      ),
      array (
        array (
          'param' => 'page_template',
          'operator' => '==',
          'value' => 'people-page-template.php',
          'order_no' => 0,
          'group_no' => 4,
        ),
      ),
      array (
        array (
          'param' => 'page_template',
          'operator' => '==',
          'value' => 'register-page-template.php',
          'order_no' => 0,
          'group_no' => 5,
        ),
      ),
      array (
        array (
          'param' => 'page_template',
          'operator' => '==',
          'value' => 'gallery-page-template.php',
          'order_no' => 0,
          'group_no' => 6,
        ),
      ),
    ),
    'options' => array (
      'position' => 'acf_after_title',
      'layout' => 'no_box',
      'hide_on_screen' => array (
        0 => 'the_content',
      ),
    ),
    'menu_order' => 0,
  ));
}