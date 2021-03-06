<?php

// This was used to automate the conversion of recipes from pages to individual objects
// It is now removed, as it would be insecure, but the code remains for reference

// add_action( 'wp_ajax_nopriv_process_recipes', 'sharan_process_recipes' );
// add_action( 'wp_ajax_process_recipes', 'sharan_process_recipes' );

// function sharan_process_recipes() {
//   global $wpdb, $post;

//   $data = $_POST['data'];
//   $page_title = $_POST['title'];

//   $page = get_page_by_title($page_title, OBJECT, 'page');
//   $page_id = wp_update_post(array(
//     'ID' => $page->ID,
//     'post_type' => 'page',
//     'page_template' => 'recipe-page-template.php'
//   ));

//   $category_name = $page_title;
//   $category = get_term_by( 'name', $category_name, 'recipe_category' );
//   if (!$category) :
//     wp_insert_term( $category_name, 'recipe_category' );
//     $category = get_term_by( 'name', $category_name, 'recipe_category' );
//     echo "Created category: $category_name\n";
//   endif;

//   update_field('field_53ba7905283d7', $category->term_id, $page->ID);

//   $subcategories = [];

//   echo "Parsing data for " . sizeof($data) . " recipes";

//   foreach($data as $recipe) {
//     $subcategory_name = $recipe['subcategory'];
//     if ($subcategory_name) {

//       $subcategory = get_term_by( 'name', $subcategory_name, 'recipe_category' );
//       if (!$subcategory) :
//         wp_insert_term( $subcategory_name, 'recipe_category', array('parent' => $category->term_id) );
//         $subcategory = get_term_by( 'name', $subcategory_name, 'recipe_category' );
//         echo "Created subcategory: $subcategory_name\n";
//       endif;

//       if(!in_array($subcategory->term_id, $subcategories)) {
//         $subcategories[] = $subcategory->term_id;
//       }

//     } else {
//       $subcategory = $category;
//     }


//     $title = $recipe['title'];
//     $post = get_page_by_title($title, OBJECT, 'recipes');
//     if ($post) :
//       echo "Recipe alrady exists: $title\n";
//     else :
//       $post =  array(
//         'post_title' => $title,
//         'post_content' => $recipe['content'],
//         'post_type' => 'recipes',
//         'post_status' => 'publish'
//       );
//       $post_id = wp_insert_post($post);
//       wp_set_post_terms($post_id, (string)$subcategory->term_id, 'recipe_category');
//       echo "Created recipe: $title\n";
//     endif;
//   }

//   // Update subcategories
//   $subcategories = array_map(function ($item) { return array('object' => $item); }, $subcategories);
//   update_field('field_53ba794c283d8', $subcategories, $page->ID);

//   wp_update_post(array(
//       'ID' => $page->ID,
//       'post_content' => ''
//     ));

//   die(); // this is required to return a proper result
// }
