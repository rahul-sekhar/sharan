<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/event-list'); ?>

  <div class="event content">
    <?php get_template_part('templates/content', 'event'); ?>
  </div><!-- /.event-content -->
<?php endwhile; ?>
