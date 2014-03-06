<div class="event-list">
  <h2>Upcoming Events</h2>

  <div class="filters">
    <a href="#" class="city">Search by City</a>
    <a href="#" class="type">Type of Event</a>
  </div>

  <ul class="events">
    <?php
    $events = get_posts('post_type=events');
    foreach ($events as $post) : setup_postdata($post);
    ?>
      <li>
        <?php get_template_part('templates/short', 'event'); ?>
      </li>
    <?php
    endforeach;
    wp_reset_postdata();
    ?>
  </ul>
</div>