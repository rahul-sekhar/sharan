<?php

// Outputs a filtered list of events
function sharan_event_list($show_no_results = true, $tag_ids = null) {
  $city_id = isset($_GET['city_id']) ? $_GET['city_id'] : null;
  $type_id = isset($_GET['type_id']) ? $_GET['type_id'] : null;

  $tax_query = array();
  if ($city_id) {
    array_push($tax_query, array(
      'taxonomy' => 'city',
      'terms' => $city_id
    ));
  }
  if ($type_id) {
    array_push($tax_query, array(
      'taxonomy' => 'event_type',
      'terms' => $type_id
    ));
  }
  if ($tag_ids) {
    array_push($tax_query, array(
      'taxonomy' => 'event_tag',
      'terms' => $tag_ids
    ));
  }

  // Calculate the cut off date for events
  $wait_days = get_field('event_wait_days', 'options');
  if (!$wait_days) {
    $wait_days = 0;
  } else {
    $wait_days = -1 * $wait_days;
  }
  $cut_off_date = strtotime("$wait_days days");

  $args = array(
    'posts_per_page' => -1,
    'post_type' => 'events',
    'tax_query' => $tax_query,
    'meta_key' => 'from',
    'orderby' => 'meta_value_num',
    'order' => 'ASC',
    'meta_query' => array(
      array(
        'key' => 'to',
        'value' => date('Ymd', $cut_off_date),
        'compare' => '>=',
        'type' => 'DATE'
      )
    )
  );
  $events = new WP_Query($args);

  if ($events->have_posts()) :
  ?>
  <ul class="events">
    <?php while($events->have_posts()) : $events->the_post(); ?>
      <li>
        <?php get_template_part('templates/short', 'event'); ?>
      </li>
    <?php endwhile; ?>
  </ul>
  <?php elseif ($show_no_results) : ?>
    <p class="no-results">No events found</p>
  <?php
  endif;
  wp_reset_postdata();
}

function sharan_filter_events() {
  global $wpdb, $post;

  sharan_event_list();

  die(); // this is required to return a proper result
}

add_action( 'wp_ajax_nopriv_filter_events', 'sharan_filter_events' );
add_action( 'wp_ajax_filter_events', 'sharan_filter_events' );
