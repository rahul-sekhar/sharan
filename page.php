<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/breadcrumbs', 'page'); ?>

  <?php get_template_part('templates/navigation', 'page'); ?>

  <?php get_template_part('templates/content', 'page'); ?>

  <?php get_template_part('templates/sidebar', 'page'); ?>
<?php endwhile; ?>
