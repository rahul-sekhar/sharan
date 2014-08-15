<?php

function get_recipe_parent_page() {
  $recipe_category = wp_get_post_terms(get_the_ID(), 'recipe_category')[0];
  $top_level_category = get_term_top_most_parent($recipe_category->term_id, 'recipe_category');
  $pages = get_pages(array(
    'number'  => 1,
    'meta_key'    => 'main_category',
    'meta_value'    => $top_level_category->term_id
  ));
  if (!$pages) {
    return false;
  }
  return $pages[0];
}

// Add query var for recipes
function add_recipe_query_var( $vars ){
  $vars[] = "recipe_page";
  return $vars;
}
add_filter( 'query_vars', 'add_recipe_query_var' );

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

// Register taxonomy for recipe categories
function register_recipe_category_taxonomy() {

  $labels = array(
    'name'                       => _x( 'Recipe categories', 'Taxonomy General Name', 'sharan' ),
    'singular_name'              => _x( 'Recipe category', 'Taxonomy Singular Name', 'sharan' ),
    'menu_name'                  => __( 'Categories', 'sharan' ),
    'all_items'                  => __( 'All Categories', 'sharan' ),
    'parent_item'                => __( 'Parent Category', 'sharan' ),
    'parent_item_colon'          => __( 'Parent Category:', 'sharan' ),
    'new_item_name'              => __( 'New Category Name', 'sharan' ),
    'add_new_item'               => __( 'Add New Category', 'sharan' ),
    'edit_item'                  => __( 'Edit Category', 'sharan' ),
    'update_item'                => __( 'Update Category', 'sharan' ),
    'separate_items_with_commas' => __( 'Separate categories with commas', 'sharan' ),
    'search_items'               => __( 'Search Categories', 'sharan' ),
    'add_or_remove_items'        => __( 'Add or remove categories', 'sharan' ),
    'choose_from_most_used'      => __( 'Choose from the most used categories', 'sharan' ),
    'not_found'                  => __( 'Category Not Found', 'sharan' ),
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
  );
  register_taxonomy( 'recipe_category', 'recipes', $args );

}
add_action( 'init', 'register_recipe_category_taxonomy', 0 );