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

  <?php if ($wp_query->max_num_pages > 1) :
    get_template_part('templates/navigation', 'page');
  endif; ?>
</div>
