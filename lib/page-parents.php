<?php

function sharan_get_breadcrumbs() {
  $ancestors = new PageAncestors(get_the_ID());

  return $ancestors->get();
}

// Class to obtain a pages ancestors
class PageAncestors {
  private $page_id = null;

  function __construct($page_id) {
    $this->page_id = $page_id;
  }

  function get() {
    $ancestors = array_merge($this->nav_parents(), $this->parents());
    return $ancestors;
  }

  private function nav_parents() {
    $root_page_id = $this->parent_ids()[0];
    $root_page_url = get_permalink($root_page_id);

    $nav = get_field('main_nav', 'options');
    // Loop through nav items
    foreach ($nav as $nav_item) :

      // Loop through sections
      if ($nav_item['sections']) : foreach ($nav_item['sections'] as $section) :

        // Loop through section links
        if ($section['links']) : foreach ($section['links'] as $link) :
          // Compare link url against page root URL
          if ($link['url'] == $root_page_url) :
            return [
              array('name' => $nav_item['name'], 'url' => null),
              array('name' => $section['name'], 'url' => null)
            ];
          endif;

        endforeach; endif; // End section link loop

      endforeach; endif; // End section loop

    endforeach; // End nav item loop

    // Standby
    return [];
  }

  private function parent_ids() {
    // Get parent pages
    $parents = array_reverse(get_post_ancestors($this->page_id));

    // Add the current page
    array_push($parents, $this->page_id);

    return $parents;
  }

  private function parents() {
    // Format the page array
    return array_map(array($this, 'page_info_from_id'), $this->parent_ids());
  }

  private function page_info_from_id($page_id) {
    return array(
      'name' => get_the_title($page_id),
      'url' => null
    );
  }
}