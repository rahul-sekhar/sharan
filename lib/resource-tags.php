<?php
// Tags for resources and links
function register_resource_tag_taxonomy() {

  $labels = array(
    'name'                       => _x( 'Resource Tags', 'Taxonomy General Name', 'sharan' ),
    'singular_name'              => _x( 'Resource Tag', 'Taxonomy Singular Name', 'sharan' ),
    'menu_name'                  => __( 'Tags', 'sharan' ),
    'all_items'                  => __( 'All Tags', 'sharan' ),
    'parent_item'                => __( 'Parent Tag', 'sharan' ),
    'parent_item_colon'          => __( 'Parent Tag:', 'sharan' ),
    'new_item_name'              => __( 'New Tag Name', 'sharan' ),
    'add_new_item'               => __( 'Add New Tag', 'sharan' ),
    'edit_item'                  => __( 'Edit Tag', 'sharan' ),
    'update_item'                => __( 'Update Tag', 'sharan' ),
    'separate_items_with_commas' => __( 'Separate tags with commas', 'sharan' ),
    'search_items'               => __( 'Search Tags', 'sharan' ),
    'add_or_remove_items'        => __( 'Add or remove tags', 'sharan' ),
    'choose_from_most_used'      => __( 'Choose from the most used tags', 'sharan' ),
    'not_found'                  => __( 'Tag Not Found', 'sharan' ),
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => false,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
  );
  register_taxonomy( 'resource_tag', null, $args );

}
add_action( 'init', 'register_resource_tag_taxonomy', 0 );