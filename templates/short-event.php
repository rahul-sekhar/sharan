<div class="event short">
  <a href="<?php the_permalink(); ?>">
    <div class="image">
      <?php
      $image = get_field('image');
      if ($image) : ?>
        <img src="<?php echo check_ssl( $image['sizes']['event-small'] ); ?>" alt="" />
      <?php endif; ?>
    </div>

    <div class="info">
      <h3><?php the_title(); ?></h3>
      <p class="date"><?php sharan_event_dates( get_field('from'), get_field('to') ) ?></p>
      <p class="city"><?php echo sharan_get_taxonomy_item('city'); ?></p>
    </div>
  </a>
</div>