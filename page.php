<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/breadcrumbs', 'page'); ?>

  <?php get_template_part('templates/navigation', 'page'); ?>

  <?php get_template_part('templates/sidebar', 'page'); ?>

  <div class="page content">
    <?php get_template_part('templates/content', 'page'); ?>
  </div><!-- /.page-content -->
<?php endwhile; ?>
