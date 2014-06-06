<?php
if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'acf_news',
    'title' => 'News',
    'fields' => array (
      array (
        'key' => 'field_53918a718510c',
        'label' => 'Image',
        'name' => 'image',
        'type' => 'image',
        'required' => 1,
        'save_format' => 'object',
        'preview_size' => 'thumbnail',
        'library' => 'all',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'post',
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
