<?php

function sharan_get_page_nav() {
  $ancestors = new PageAncestors(get_the_ID());

  return $ancestors->page_nav();
}

// Class to obtain a pages ancestors
class PageAncestors {
  private $page_id = null;

  function __construct($page_id) {
    $this->page_id = $page_id;
  }

  function page_nav() {
    $nav_parent_items = $this->nav_parent_items();

    if ($nav_parent_items) {
      return $nav_parent_items[0];
    } else {
      return [];
    }
  }

  function breadcrumbs() {
    $breadcrumbs = array_merge($this->nav_parents(), $this->parents());
    return $breadcrumbs;
  }

  private function nav_parents() {
    $nav_parent_items = $this->nav_parent_items();

    $nav_convert = function ($nav_item) {
      return array('name' => $nav_item['name'], 'url' => null);
    };

    $nav_parents = array_map($nav_convert, $nav_parent_items);

    return $nav_parents;
  }

  private function nav_parent_items() {
    $root_page_id = $this->parent_ids()[0];
    $root_page_url = get_permalink($root_page_id);

    $nav = sharan_get_navigation();
    // Loop through nav items
    if ($nav) : foreach ($nav as $nav_item) :

      // Loop through sections
      if ($nav_item['sections']) : foreach ($nav_item['sections'] as $section) :

        // Loop through section links
        if ($section['links']) : foreach ($section['links'] as $link) :
          // Compare link url against page root URL
          if ($link['url'] == $root_page_url) :
            return [$nav_item, $section];
          endif;

        endforeach; endif; // End section link loop

      endforeach; endif; // End section loop

    endforeach; endif; // End nav item loop

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
    if ($page_id == $this->page_id) {
      return array(
        'name' => get_the_title($page_id),
        'url' => ''
      );
    }

    return array(
      'name' => get_the_title($page_id),
      'url' => get_permalink($page_id)
    );
  }
}