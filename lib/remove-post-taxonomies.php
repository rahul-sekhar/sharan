<?php

// Removes the default taxonomies
function sharan_unregister_taxonomies(){
    register_taxonomy('post_tag', array());
    register_taxonomy('category', array());
}
add_action('init', 'sharan_unregister_taxonomies');