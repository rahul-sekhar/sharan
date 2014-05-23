<?php
get_template_part('templates/content', 'page');

$args = array(
  'posts_per_page' => -1,
  'post_type' => 'events',
  'orderby' => 'meta_value_num',
  'order' => 'ASC',
  'meta_query' => array(
    array(
      'key' => 'people',
      'value' => '"' . get_the_ID() . '"',
      'compare' => 'LIKE'
    )
  )
);
$events = new WP_Query($args);

if ($events->have_posts()) : ?>
  <section class="events">
  <h3>Upcoming events</h3>

    <ul class="events">
      <?php while($events->have_posts()) : $events->the_post(); ?>
        <li>
          <?php get_template_part('templates/short', 'event'); ?>
        </li>
      <?php endwhile; ?>
    </ul>
  </section>
<?php
endif;
wp_reset_postdata();
?>