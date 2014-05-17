<div class="blog-container">
  <?php get_template_part('templates/navigation', 'blog'); ?>

  <?php get_template_part('templates/sidebar', 'blog'); ?>

  <?php while (have_posts()) : the_post(); ?>
      <div class="post content excerpt">
        <?php get_template_part('templates/excerpt', 'post'); ?>
      </div><!-- /.post-content -->
    </div>
  <?php endwhile; ?>
</div>