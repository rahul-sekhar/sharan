<?php

// Save navigation fields in a single database column
function sharan_save_navigation($post_id) {
  if ($post_id == 'options' && array_keys($_POST['fields'])[0] == 'field_531869b392ddd') {
    $nav = json_encode(get_field('field_531869b392ddd', 'options'));
    update_option('main_navigation', $nav);
  }
}
add_action('acf/save_post', 'sharan_save_navigation', 20);

// Get the navigation fields as an array
function sharan_get_navigation() {

  $nav = get_option('main_navigation');
  if ($nav) {
    return json_decode($nav, true);
  }

  return get_field('field_531869b392ddd', 'options');
}


// Field groups for navigation

if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'acf_navigation-2',
    'title' => 'Navigation',
    'fields' => array (
      array (
        'key' => 'field_531869b392ddd',
        'label' => 'Main Navigation',
        'name' => 'main_nav',
        'type' => 'repeater',
        'sub_fields' => array (
          array (
            'key' => 'field_531869c592dde',
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
            'key' => 'field_53186abcd2856',
            'label' => 'Default Sidebar Image',
            'name' => 'default_sidebar_image',
            'type' => 'image',
            'instructions' => 'This will be displayed for pages in this section without an image',
            'column_width' => '',
            'save_format' => 'object',
            'preview_size' => 'post-thumbnail',
            'library' => 'all',
          ),
          array (
            'key' => 'field_5319780641147',
            'label' => 'URL',
            'name' => 'url',
            'type' => 'text',
            'instructions' => 'This is what the main navigation link will link to',
            'column_width' => '',
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'none',
            'maxlength' => '',
          ),
          array (
            'key' => 'field_5319783d41148',
            'label' => 'Navigation feature type',
            'name' => 'navigation_feature_type',
            'type' => 'radio',
            'instructions' => 'The navigation feature is displayed on the dropdown menu',
            'column_width' => '',
            'choices' => array (
              'Image' => 'Image',
              'Video' => 'Video',
            ),
            'other_choice' => 0,
            'save_other_choice' => 0,
            'default_value' => 'Image',
            'layout' => 'vertical',
          ),
          array (
            'key' => 'field_531978a541149',
            'label' => 'Feature image',
            'name' => 'feature_image',
            'type' => 'image',
            'conditional_logic' => array (
              'status' => 1,
              'rules' => array (
                array (
                  'field' => 'field_5319783d41148',
                  'operator' => '==',
                  'value' => 'Image',
                ),
              ),
              'allorany' => 'all',
            ),
            'column_width' => '',
            'save_format' => 'object',
            'preview_size' => 'thumbnail',
            'library' => 'all',
          ),
          array (
            'key' => 'field_53197bb811f99',
            'label' => 'Feature Link URL',
            'name' => 'feature_link_url',
            'type' => 'text',
            'conditional_logic' => array (
              'status' => 1,
              'rules' => array (
                array (
                  'field' => 'field_5319783d41148',
                  'operator' => '==',
                  'value' => 'Image',
                ),
              ),
              'allorany' => 'all',
            ),
            'column_width' => '',
            'default_value' => '',
            'placeholder' => 'http://',
            'prepend' => '',
            'append' => '',
            'formatting' => 'none',
            'maxlength' => '',
          ),
          array (
            'key' => 'field_531978be4114a',
            'label' => 'Caption',
            'name' => 'caption',
            'type' => 'text',
            'conditional_logic' => array (
              'status' => 1,
              'rules' => array (
                array (
                  'field' => 'field_5319783d41148',
                  'operator' => '==',
                  'value' => 'Image',
                ),
              ),
              'allorany' => 'all',
            ),
            'column_width' => '',
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'html',
            'maxlength' => '',
          ),
          array (
            'key' => 'field_531978f64114b',
            'label' => 'Video URL',
            'name' => 'video_url',
            'type' => 'text',
            'instructions' => 'Enter the address of the video to be embedded',
            'conditional_logic' => array (
              'status' => 1,
              'rules' => array (
                array (
                  'field' => 'field_5319783d41148',
                  'operator' => '==',
                  'value' => 'Video',
                ),
              ),
              'allorany' => 'all',
            ),
            'column_width' => '',
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'none',
            'maxlength' => '',
          ),
          array (
            'key' => 'field_531869ea92ddf',
            'label' => 'Sections',
            'name' => 'sections',
            'type' => 'repeater',
            'column_width' => '',
            'sub_fields' => array (
              array (
                'key' => 'field_53186a0992de0',
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
                'key' => 'field_53186a1792de1',
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
                        'key' => 'field_53186a3d92de2',
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
                        'key' => 'field_53186a5292de3',
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
                        'key' => 'field_53186a8392de5',
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
                        'key' => 'field_53186a9592de6',
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
                ),
                'button_label' => 'Add Link',
                'min' => '',
                'max' => '',
              ),
            ),
            'row_min' => '',
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
