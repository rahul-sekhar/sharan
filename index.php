<div class="inner-container">
  <?php get_template_part('templates/sidebar', 'generic'); ?>

  <?php if (!have_posts()) : ?>
    <div class="content error">
      <h2>Not found</h2>
      <p><?php _e('Sorry, no results were found.', 'roots'); ?></p>
    </div>
  <?php endif; ?>

  <?php while (have_posts()) : the_post(); ?>
    <div class="content">
      <?php get_template_part('templates/content', 'post'); ?>
    </div>
  <?php endwhile; ?>

  <?php if ($wp_query->max_num_pages > 1) : ?>
    <nav class="wp-prev-next">
      <ul>
        <li class="prev-link"><?php previous_posts_link(__('&laquo; Newer entries', "sharan")) ?></li>
        <li class="next-link"><?php next_posts_link(__('Older entries &raquo;', "sharan")) ?></li>
      </ul>
    </nav>
  <?php endif; ?>
</div>
