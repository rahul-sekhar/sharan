<?php while (have_posts()) : the_post(); ?>
  <div class="post inner-container with-side-nav">
    <?php get_template_part('templates/navigation', 'news'); ?>

    <?php get_template_part('templates/sidebar', 'post'); ?>

    <div class="post content">
      <?php get_template_part('templates/content', 'post-single'); ?>
    </div><!-- /.post-content -->
  </div>
<?php endwhile; ?>
