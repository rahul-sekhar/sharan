<?php while (have_posts()) : the_post(); ?>
  <div class="page inner-container<?php if (sharan_get_page_nav()) echo ' with-side-nav'; ?>">
    <?php get_template_part('templates/side-nav', 'page'); ?>

    <?php get_template_part('templates/sidebar', 'page'); ?>

    <div class="page content">
      <?php get_template_part('templates/content', 'page'); ?>
    </div><!-- /.page-content -->
  </div>
<?php endwhile; ?>
