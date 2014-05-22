<?php while (have_posts()) : the_post(); ?>
  <div class="page inner-container with-side-nav">
    <?php get_template_part('templates/navigation', 'page'); ?>

    <?php get_template_part('templates/sidebar', 'page'); ?>

    <div class="page content">
      <?php get_template_part('templates/content', 'page'); ?>
    </div><!-- /.page-content -->
  </div>
<?php endwhile; ?>
