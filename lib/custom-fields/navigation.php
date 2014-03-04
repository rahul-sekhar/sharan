<?php

// Field groups for navigation

if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'acf_navigation',
    'title' => 'Navigation',
    'fields' => array (
      array (
        'key' => 'field_5313776479881',
        'label' => 'Main Navigation',
        'name' => 'main_nav',
        'type' => 'repeater',
        'sub_fields' => array (
          array (
            'key' => 'field_53140b139dcf0',
            'label' => 'Name',
            'name' => 'name',
            'type' => 'text',
            'required' => 1,
            'column_width' => '',
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'html',
            'maxlength' => '',
          ),
          array (
            'key' => 'field_5314087579882',
            'label' => 'Sections',
            'name' => 'sections',
            'type' => 'repeater',
            'column_width' => '',
            'sub_fields' => array (
              array (
                'key' => 'field_53140b4a184cb',
                'label' => 'Name',
                'name' => 'name',
                'type' => 'text',
                'column_width' => '',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
              ),
              array (
                'key' => 'field_5314090379883',
                'label' => 'Links',
                'name' => 'links',
                'type' => 'flexible_content',
                'column_width' => '',
                'layouts' => array (
                  array (
                    'label' => 'Page Link',
                    'name' => 'page_link',
                    'display' => 'row',
                    'min' => '',
                    'max' => '',
                    'sub_fields' => array (
                      array (
                        'key' => 'field_53140bac937cd',
                        'label' => 'Name',
                        'name' => 'name',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                      ),
                      array (
                        'key' => 'field_53140a5b20ac1',
                        'label' => 'Page',
                        'name' => 'url',
                        'type' => 'page_link',
                        'column_width' => '',
                        'post_type' => array (
                          0 => 'page',
                        ),
                        'allow_null' => 0,
                        'multiple' => 0,
                      ),
                    ),
                  ),
                  array (
                    'label' => 'External Link',
                    'name' => 'external_link',
                    'display' => 'row',
                    'min' => '',
                    'max' => '',
                    'sub_fields' => array (
                      array (
                        'key' => 'field_53140bbd937ce',
                        'label' => 'Name',
                        'name' => 'name',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                      ),
                      array (
                        'key' => 'field_53140a7120ac2',
                        'label' => 'URL',
                        'name' => 'url',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => 'http://',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                      ),
                    ),
                  ),
                ),
                'button_label' => 'Add Link',
                'min' => '',
                'max' => '',
              ),
            ),
            'row_min' => 1,
            'row_limit' => '',
            'layout' => 'row',
            'button_label' => 'Add Section',
          ),
        ),
        'row_min' => 1,
        'row_limit' => '',
        'layout' => 'row',
        'button_label' => 'Add Menu Item',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'options_page',
          'operator' => '==',
          'value' => 'acf-options-navigation',
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
