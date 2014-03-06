<?php

function register_person_custom_type() {

  $labels = array(
    'name'                => _x( 'People', 'Post Type General Name', 'sharan' ),
    'singular_name'       => _x( 'Person', 'Post Type Singular Name', 'sharan' ),
    'menu_name'           => __( 'People', 'sharan' ),
    'parent_item_colon'   => __( 'Parent Person:', 'sharan' ),
    'all_items'           => __( 'All People', 'sharan' ),
    'view_item'           => __( 'View Person', 'sharan' ),
    'add_new_item'        => __( 'Add New Person', 'sharan' ),
    'add_new'             => __( 'Add New', 'sharan' ),
    'edit_item'           => __( 'Edit Person', 'sharan' ),
    'update_item'         => __( 'Update Person', 'sharan' ),
    'search_items'        => __( 'Search Person', 'sharan' ),
    'not_found'           => __( 'No people found', 'sharan' ),
    'not_found_in_trash'  => __( 'No people found in trash', 'sharan' ),
  );
  $args = array(
    'label'               => __( 'person', 'sharan' ),
    'description'         => __( 'People', 'sharan' ),
    'labels'              => $labels,
    'supports'            => array( 'title' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 20,
    'menu_icon'           => '',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
  );
  register_post_type( 'people', $args );
}
add_action( 'init', 'register_person_custom_type', 0 );