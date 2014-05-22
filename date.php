<div class="news inner-container with-side-nav">
  <?php get_template_part('templates/navigation', 'news'); ?>

  <?php get_template_part('templates/sidebar', 'news'); ?>

  <div class="content">
    <h2>News &ndash; <?php the_time('F Y'); ?></h2>
  </div>

  <?php while (have_posts()) : the_post(); ?>
    <div class="post content">
      <?php get_template_part('templates/content', 'post'); ?>
    </div><!-- /.post-content -->
  <?php endwhile; ?>

  <nav class="wp-prev-next">
    <ul>
      <li class="prev-link"><?php previous_posts_link(__('&laquo; Newer entries', "sharan")) ?></li>
      <li class="next-link"><?php next_posts_link(__('Older entries &raquo;', "sharan")) ?></li>
    </ul>
  </nav>
</div>