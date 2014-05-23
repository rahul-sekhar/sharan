<?php

function get_people_page() {
  $people_pages = get_pages(array(
    'meta_key' => '_wp_page_template',
    'meta_value' => 'people-page-template.php'
  ));
  return $people_pages ? $people_pages[0] : null;
}