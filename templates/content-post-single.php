<header>
  <h2><?php the_title(); ?></h2>
  <p class="date"><?php echo get_the_time(get_option('date_format')); ?></p>
</header>

<?php the_content(); ?>