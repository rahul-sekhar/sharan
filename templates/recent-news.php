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
        <h3>
          <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
          </a>
        </h3>
        <p class="date"><?php echo get_the_time(get_option('date_format')); ?></p>
        <?php the_excerpt(); ?>
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