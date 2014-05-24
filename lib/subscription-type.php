<?php

function register_subscription_custom_type() {

  $labels = array(
    'name'                => _x( 'Newsletter subscriptions', 'Post Type General Name', 'sharan' ),
    'singular_name'       => _x( 'Newsletter subscription', 'Post Type Singular Name', 'sharan' ),
    'menu_name'           => __( 'Newsletter subscriptions', 'sharan' ),
    'parent_item_colon'   => __( 'Parent Newsletter subscription:', 'sharan' ),
    'all_items'           => __( 'All Newsletter subscriptions', 'sharan' ),
    'view_item'           => __( 'View Newsletter subscription', 'sharan' ),
    'add_new_item'        => __( 'Add New Newsletter subscription', 'sharan' ),
    'add_new'             => __( 'Add New', 'sharan' ),
    'edit_item'           => __( 'Edit Newsletter subscription', 'sharan' ),
    'update_item'         => __( 'Update Newsletter subscription', 'sharan' ),
    'search_items'        => __( 'Search Newsletter subscription', 'sharan' ),
    'not_found'           => __( 'No subscriptions found', 'sharan' ),
    'not_found_in_trash'  => __( 'No subscriptions found in trash', 'sharan' ),
  );
  $args = array(
    'label'               => __( 'newsletter subscription', 'sharan' ),
    'description'         => __( 'Newsletter subscriptions', 'sharan' ),
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
  register_post_type( 'subscription', $args );
}
add_action( 'init', 'register_subscription_custom_type', 0 );