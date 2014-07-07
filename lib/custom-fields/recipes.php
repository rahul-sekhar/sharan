<?php

if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'acf_recipe-page',
    'title' => 'Recipe page',
    'fields' => array (
      array (
        'key' => 'field_53ba7905283d7',
        'label' => 'Main category',
        'name' => 'main_category',
        'type' => 'taxonomy',
        'required' => 1,
        'taxonomy' => 'recipe_category',
        'field_type' => 'select',
        'allow_null' => 0,
        'load_save_terms' => 0,
        'return_format' => 'object',
        'multiple' => 0,
      ),
      array (
        'key' => 'field_53ba794c283d8',
        'label' => 'Sub-categories',
        'name' => 'categories',
        'type' => 'repeater',
        'sub_fields' => array (
          array (
            'key' => 'field_53ba7a2c283d9',
            'label' => 'Sub-category',
            'name' => 'object',
            'type' => 'taxonomy',
            'required' => 1,
            'column_width' => '',
            'taxonomy' => 'recipe_category',
            'field_type' => 'select',
            'allow_null' => 0,
            'load_save_terms' => 0,
            'return_format' => 'object',
            'multiple' => 0,
          ),
        ),
        'row_min' => '',
        'row_limit' => '',
        'layout' => 'table',
        'button_label' => 'Add Category',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'page_template',
          'operator' => '==',
          'value' => 'recipe-page-template.php',
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
    'id' => 'acf_recipes',
    'title' => 'Recipes',
    'fields' => array (
      array (
        'key' => 'field_53ba74ca13d2e',
        'label' => 'Category',
        'name' => 'category',
        'type' => 'taxonomy',
        'required' => 1,
        'taxonomy' => 'recipe_category',
        'field_type' => 'select',
        'allow_null' => 0,
        'load_save_terms' => 1,
        'return_format' => 'id',
        'multiple' => 0,
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'recipes',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'acf_after_title',
      'layout' => 'no_box',
      'hide_on_screen' => array (
      ),
    ),
    'menu_order' => 0,
  ));
}
