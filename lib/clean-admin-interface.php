<?php

// Change posts to news
function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'News';
    $submenu['edit.php'][5][0] = 'News';
    $submenu['edit.php'][10][0] = 'Add News Item';
    // $submenu['edit.php'][16][0] = 'News Tags';
    // echo '';
}
add_action( 'admin_menu', 'change_post_menu_label' );

function change_post_labels() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'News';
    $labels->singular_name = 'News Item';
    $labels->menu_name = 'News';
    $labels->parent_item_colon = 'Parent News Item:';
    $labels->all_items = 'All News Items';
    $labels->add_new = 'Add News Item';
    $labels->add_new_item = 'Add News Item';
    $labels->edit_item = 'Edit News Item';
    $labels->new_item = 'News Item';
    $labels->view_item = 'View News Item';
    $labels->search_items = 'Search News';
    $labels->not_found = 'No News Items found';
    $labels->not_found_in_trash = 'No News Items found in Trash';
}
add_action( 'init', 'change_post_labels' );