<div id="events" class="single">
  <?php get_template_part('templates/event-list'); ?>

  <?php while (have_posts()) : the_post(); ?>
    <div class="event content">
      <a href="#" class="close"></a>
      <?php get_template_part('templates/content', 'event'); ?>
    </div><!-- /.event-content -->
  <?php endwhile; ?>
</div>
