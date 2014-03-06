<?php

// Field groups for events

if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'acf_event-fields-2',
    'title' => 'Event Fields',
    'fields' => array (
      array (
        'key' => 'field_531848d58b03d',
        'label' => 'From',
        'name' => 'from',
        'type' => 'date_picker',
        'required' => 1,
        'date_format' => 'yymmdd',
        'display_format' => 'dd/mm/yy',
        'first_day' => 1,
      ),
      array (
        'key' => 'field_531848ef8b03e',
        'label' => 'To',
        'name' => 'to',
        'type' => 'date_picker',
        'required' => 1,
        'date_format' => 'yymmdd',
        'display_format' => 'dd/mm/yy',
        'first_day' => 1,
      ),
      array (
        'key' => 'field_5318490468875',
        'label' => 'Location',
        'name' => 'location',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_5318491368876',
        'label' => 'City',
        'name' => 'city',
        'type' => 'taxonomy',
        'required' => 1,
        'taxonomy' => 'city',
        'field_type' => 'select',
        'allow_null' => 0,
        'load_save_terms' => 1,
        'return_format' => 'id',
        'multiple' => 0,
      ),
      array (
        'key' => 'field_5318492968877',
        'label' => 'Type',
        'name' => 'type',
        'type' => 'taxonomy',
        'required' => 1,
        'taxonomy' => 'event_type',
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
          'value' => 'events',
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
  register_field_group(array (
    'id' => 'acf_event-tags-2',
    'title' => 'Event Tags',
    'fields' => array (
      array (
        'key' => 'field_5318494dbe108',
        'label' => 'Event Tag',
        'name' => 'event_tag',
        'type' => 'taxonomy',
        'taxonomy' => 'event_tag',
        'field_type' => 'select',
        'allow_null' => 1,
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
          'value' => 'events',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'side',
      'layout' => 'default',
      'hide_on_screen' => array (
      ),
    ),
    'menu_order' => 0,
  ));
  register_field_group(array (
    'id' => 'acf_more-event-fields-2',
    'title' => 'More Event Fields',
    'fields' => array (
      array (
        'key' => 'field_5318498e96cea',
        'label' => 'People',
        'name' => 'people',
        'type' => 'relationship',
        'return_format' => 'object',
        'post_type' => array (
          0 => 'people',
        ),
        'taxonomy' => array (
          0 => 'all',
        ),
        'filters' => array (
          0 => 'search',
        ),
        'result_elements' => array (
          0 => 'featured_image',
          1 => 'post_title',
        ),
        'max' => '',
      ),
      array (
        'key' => 'field_531849b096ceb',
        'label' => 'Links',
        'name' => 'links',
        'type' => 'flexible_content',
        'layouts' => array (
          array (
            'label' => 'Link',
            'name' => 'link',
            'display' => 'row',
            'min' => '',
            'max' => '',
            'sub_fields' => array (
              array (
                'key' => 'field_531849c396cec',
                'label' => 'Name',
                'name' => 'name',
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
                'key' => 'field_531849ce96ced',
                'label' => 'URL',
                'name' => 'url',
                'type' => 'text',
                'column_width' => '',
                'default_value' => 'http://',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
              ),
            ),
          ),
          array (
            'label' => 'File',
            'name' => 'file',
            'display' => 'row',
            'min' => '',
            'max' => '',
            'sub_fields' => array (
              array (
                'key' => 'field_531849e696cef',
                'label' => 'Name',
                'name' => 'name',
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
                'key' => 'field_531849fb96cf0',
                'label' => 'File',
                'name' => 'file',
                'type' => 'file',
                'column_width' => '',
                'save_format' => 'url',
                'library' => 'all',
              ),
            ),
          ),
        ),
        'button_label' => 'Add Link',
        'min' => '',
        'max' => '',
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
