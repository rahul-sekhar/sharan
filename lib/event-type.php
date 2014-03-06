<?php

function register_event_custom_type() {

  $labels = array(
    'name'                => _x( 'Events', 'Post Type General Name', 'sharan' ),
    'singular_name'       => _x( 'Event', 'Post Type Singular Name', 'sharan' ),
    'menu_name'           => __( 'Events', 'sharan' ),
    'parent_item_colon'   => __( 'Parent Event:', 'sharan' ),
    'all_items'           => __( 'All Events', 'sharan' ),
    'view_item'           => __( 'View Event', 'sharan' ),
    'add_new_item'        => __( 'Add New Event', 'sharan' ),
    'add_new'             => __( 'Add New', 'sharan' ),
    'edit_item'           => __( 'Edit Event', 'sharan' ),
    'update_item'         => __( 'Update Event', 'sharan' ),
    'search_items'        => __( 'Search Event', 'sharan' ),
    'not_found'           => __( 'No events found', 'sharan' ),
    'not_found_in_trash'  => __( 'No events found in trash', 'sharan' ),
  );
  $args = array(
    'label'               => __( 'event', 'sharan' ),
    'description'         => __( 'Events organised by Sharan', 'sharan' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'thumbnail', ),
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
  register_post_type( 'events', $args );
}
add_action( 'init', 'register_event_custom_type', 0 );

// Register taxonomy for event types
function register_event_type_taxonomy() {

  $labels = array(
    'name'                       => _x( 'Event Types', 'Taxonomy General Name', 'sharan' ),
    'singular_name'              => _x( 'Event Type', 'Taxonomy Singular Name', 'sharan' ),
    'menu_name'                  => __( 'Types', 'sharan' ),
    'all_items'                  => __( 'All Types', 'sharan' ),
    'parent_item'                => __( 'Parent Type', 'sharan' ),
    'parent_item_colon'          => __( 'Parent Type:', 'sharan' ),
    'new_item_name'              => __( 'New Type Name', 'sharan' ),
    'add_new_item'               => __( 'Add New Type', 'sharan' ),
    'edit_item'                  => __( 'Edit Type', 'sharan' ),
    'update_item'                => __( 'Update Type', 'sharan' ),
    'separate_items_with_commas' => __( 'Separate types with commas', 'sharan' ),
    'search_items'               => __( 'Search Types', 'sharan' ),
    'add_or_remove_items'        => __( 'Add or remove types', 'sharan' ),
    'choose_from_most_used'      => __( 'Choose from the most used types', 'sharan' ),
    'not_found'                  => __( 'Type Not Found', 'sharan' ),
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
  register_taxonomy( 'event_type', 'events', $args );

}
add_action( 'init', 'register_event_type_taxonomy', 0 );


// Register taxonomy for event tags
function register_event_tag_taxonomy() {

  $labels = array(
    'name'                       => _x( 'Event Tags', 'Taxonomy General Name', 'sharan' ),
    'singular_name'              => _x( 'Event Tag', 'Taxonomy Singular Name', 'sharan' ),
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
  register_taxonomy( 'event_tag', 'events', $args );

}
add_action( 'init', 'register_event_tag_taxonomy', 0 );


// Register taxonomy for cities
function register_city_taxonomy() {

  $labels = array(
    'name'                       => _x( 'Cities', 'Taxonomy General Name', 'sharan' ),
    'singular_name'              => _x( 'City', 'Taxonomy Singular Name', 'sharan' ),
    'menu_name'                  => __( 'City', 'sharan' ),
    'all_items'                  => __( 'All Cities', 'sharan' ),
    'parent_item'                => __( 'Parent City', 'sharan' ),
    'parent_item_colon'          => __( 'Parent City:', 'sharan' ),
    'new_item_name'              => __( 'New City Name', 'sharan' ),
    'add_new_item'               => __( 'Add New City', 'sharan' ),
    'edit_item'                  => __( 'Edit City', 'sharan' ),
    'update_item'                => __( 'Update City', 'sharan' ),
    'separate_items_with_commas' => __( 'Separate cities with commas', 'sharan' ),
    'search_items'               => __( 'Search Cities', 'sharan' ),
    'add_or_remove_items'        => __( 'Add or remove cities', 'sharan' ),
    'choose_from_most_used'      => __( 'Choose from the most used cities', 'sharan' ),
    'not_found'                  => __( 'City Not Found', 'sharan' ),
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
  register_taxonomy( 'city', 'events', $args );

}
add_action( 'init', 'register_city_taxonomy', 0 );