<?php

function register_registration_custom_type() {

  $labels = array(
    'name'                => _x( 'Registrations', 'Post Type General Name', 'sharan' ),
    'singular_name'       => _x( 'Registration', 'Post Type Singular Name', 'sharan' ),
    'menu_name'           => __( 'Registrations', 'sharan' ),
    'parent_item_colon'   => __( 'Parent registration:', 'sharan' ),
    'all_items'           => __( 'All registrations', 'sharan' ),
    'view_item'           => __( 'View registration', 'sharan' ),
    'add_new_item'        => __( 'Add New registration', 'sharan' ),
    'add_new'             => __( 'Add New', 'sharan' ),
    'edit_item'           => __( 'Edit registration', 'sharan' ),
    'update_item'         => __( 'Update registration', 'sharan' ),
    'search_items'        => __( 'Search registration', 'sharan' ),
    'not_found'           => __( 'No registrations found', 'sharan' ),
    'not_found_in_trash'  => __( 'No registrations found in trash', 'sharan' ),
  );
  $args = array(
    'label'               => __( 'Registration', 'sharan' ),
    'description'         => __( 'Registrations', 'sharan' ),
    'labels'              => $labels,
    'supports'            => array( 'title' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => false,
    'menu_position'       => 20,
    'menu_icon'           => '',
    'can_export'          => true,
    'has_archive'         => false,
    'exclude_from_search' => true,
    'publicly_queryable'  => false,
    'capability_type'     => 'page',
    'query_var'           => false,
    'rewrite'             => false,
  );
  register_post_type( 'registration', $args );
}
add_action( 'init', 'register_registration_custom_type', 0 );