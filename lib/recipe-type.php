<?php

function register_recipe_custom_type() {

  $labels = array(
    'name'                => _x( 'Recipes', 'Post Type General Name', 'sharan' ),
    'singular_name'       => _x( 'Recipe', 'Post Type Singular Name', 'sharan' ),
    'menu_name'           => __( 'Recipes', 'sharan' ),
    'parent_item_colon'   => __( 'Parent Recipe:', 'sharan' ),
    'all_items'           => __( 'All Recipes', 'sharan' ),
    'view_item'           => __( 'View Recipe', 'sharan' ),
    'add_new_item'        => __( 'Add New Recipe', 'sharan' ),
    'add_new'             => __( 'Add New', 'sharan' ),
    'edit_item'           => __( 'Edit Recipe', 'sharan' ),
    'update_item'         => __( 'Update Recipe', 'sharan' ),
    'search_items'        => __( 'Search Recipe', 'sharan' ),
    'not_found'           => __( 'No recipes found', 'sharan' ),
    'not_found_in_trash'  => __( 'No recipes found in trash', 'sharan' ),
  );
  $args = array(
    'label'               => __( 'recipe', 'sharan' ),
    'description'         => __( 'Recipes', 'sharan' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'thumbnail' ),
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
  register_post_type( 'recipes', $args );
}
add_action( 'init', 'register_recipe_custom_type', 0 );