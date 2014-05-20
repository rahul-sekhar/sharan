<?php

function register_link_custom_type() {

  $labels = array(
    'name'                => _x( 'Links', 'Post Type General Name', 'sharan' ),
    'singular_name'       => _x( 'Link', 'Post Type Singular Name', 'sharan' ),
    'menu_name'           => __( 'Links', 'sharan' ),
    'parent_item_colon'   => __( 'Parent Link:', 'sharan' ),
    'all_items'           => __( 'All Links', 'sharan' ),
    'view_item'           => __( 'View Link', 'sharan' ),
    'add_new_item'        => __( 'Add New Link', 'sharan' ),
    'add_new'             => __( 'Add New', 'sharan' ),
    'edit_item'           => __( 'Edit Link', 'sharan' ),
    'update_item'         => __( 'Update Link', 'sharan' ),
    'search_items'        => __( 'Search Link', 'sharan' ),
    'not_found'           => __( 'No links found', 'sharan' ),
    'not_found_in_trash'  => __( 'No links found in trash', 'sharan' ),
  );
  $args = array(
    'label'               => __( 'link', 'sharan' ),
    'description'         => __( 'Links appear on the resources page', 'sharan' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor' ),
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
    'taxonomies'          => array('resource_tag')
  );
  register_post_type( 'links', $args );
}
add_action( 'init', 'register_link_custom_type', 0 );
