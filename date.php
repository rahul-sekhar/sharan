<div class="news inner-container with-side-nav">
  <?php get_template_part('templates/side-nav', 'news'); ?>

  <?php get_template_part('templates/sidebar', 'news'); ?>

  <div class="content">
    <h2>News (<?php the_time('F Y'); ?>)</h2>

  <?php while (have_posts()) : the_post(); ?>
    <div class="post short">
      <?php get_template_part('templates/short', 'post'); ?>
    </div>
  <?php endwhile; ?>
  </div>

  <?php get_template_part('templates/navigation', 'page'); ?>
</div>