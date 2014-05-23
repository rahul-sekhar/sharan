<?php while (have_posts()) : the_post(); ?>
  <div class="people inner-container with-side-nav">
    <?php get_template_part('templates/side-nav', 'people'); ?>

    <?php get_template_part('templates/sidebar', 'people'); ?>

    <div class="page content">
      <?php get_template_part('templates/content', 'person'); ?>
    </div>
  </div>
<?php endwhile; ?>
