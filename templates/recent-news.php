<div class="recent-news">
  <h2>News</h2>

  <?php
  $args = array(
    'posts_per_page' => 4,
  );
  $posts = new WP_Query($args);
  if ($posts->have_posts()) :
  ?>
    <ul class="post">
    <?php while($posts->have_posts()) : $posts->the_post(); ?>
      <li>
        <?php get_template_part('templates/short', 'post'); ?>
      </li>
    <?php endwhile; ?>
    </ul>
  <?php
  endif;

  $news_page_id = get_option( 'page_for_posts' );
  $news_url = get_permalink($news_page_id);
  ?>
  <a class="view-all" href="<?php echo $news_url ?>">View all news</a>
</div>