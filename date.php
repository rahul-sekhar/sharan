<div class="news inner-container with-side-nav">
  <?php get_template_part('templates/side-nav', 'news'); ?>

  <?php get_template_part('templates/sidebar', 'news'); ?>

  <div class="content">
    <h2>News &ndash; <?php the_time('F Y'); ?></h2>
  </div>

  <?php while (have_posts()) : the_post(); ?>
    <div class="post content">
      <?php get_template_part('templates/content', 'post'); ?>
    </div><!-- /.post-content -->
  <?php endwhile; ?>

  <?php get_template_part('templates/navigation', 'page'); ?>
</div>