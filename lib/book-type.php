<?php

function register_book_custom_type() {

  $labels = array(
    'name'                => _x( 'Books', 'Post Type General Name', 'sharan' ),
    'singular_name'       => _x( 'Book', 'Post Type Singular Name', 'sharan' ),
    'menu_name'           => __( 'Books', 'sharan' ),
    'parent_item_colon'   => __( 'Parent Book:', 'sharan' ),
    'all_items'           => __( 'All Books', 'sharan' ),
    'view_item'           => __( 'View Book', 'sharan' ),
    'add_new_item'        => __( 'Add New Book', 'sharan' ),
    'add_new'             => __( 'Add New', 'sharan' ),
    'edit_item'           => __( 'Edit Book', 'sharan' ),
    'update_item'         => __( 'Update Book', 'sharan' ),
    'search_items'        => __( 'Search Book', 'sharan' ),
    'not_found'           => __( 'No books found', 'sharan' ),
    'not_found_in_trash'  => __( 'No books found in trash', 'sharan' ),
  );
  $args = array(
    'label'               => __( 'book', 'sharan' ),
    'description'         => __( 'Books appear on the resources page', 'sharan' ),
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
    'taxonomies'          => array('resource_tag')
  );
  register_post_type( 'books', $args );
}
add_action( 'init', 'register_book_custom_type', 0 );
