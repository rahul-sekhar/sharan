<?php
/*
Template Name: Recipe page
*/
?>
<?php while (have_posts()) : the_post(); ?>
  <div class="page inner-container<?php if (sharan_get_page_nav()) echo ' with-side-nav'; ?>" id="recipes">
    <?php
    if (sharan_get_page_nav()) :
      get_template_part('templates/side-nav', 'page');
    endif;
    ?>

    <?php get_template_part('templates/sidebar', 'page'); ?>

    <div class="page content">
      <?php get_template_part('templates/content', 'recipes'); ?>
    </div><!-- /.page-content -->
  </div>
<?php endwhile; ?>
