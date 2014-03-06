<h2><?php the_title(); ?></h2>

<div class="info">
  <p class="dates"><?php sharan_event_dates( get_field('from'), get_field('to') ) ?></p>
  <p class="location">
    <?php
    if (get_field('location')) :
      echo get_field('location') . ', ';
    endif;
    echo sharan_get_taxonomy_item('city')
    ?>
  </p>
</div>

<div class="pre-content">
  <?php if (has_post_thumbnail()) : ?>
    <div class="image">
      <?php the_post_thumbnail('event-medium'); ?>
    </div>
  <?php endif; ?>

  <div class="register">
    <a href="#" class="button">Register</a>
  </div>
</div>

<div class="inner-content">
  <?php the_content(); ?>
</div>