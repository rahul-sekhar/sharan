<?php
/*
Template Name: Resources page
*/
?>
<div class="page-container" id="resources">
  <?php get_template_part('templates/sidebar', 'page'); ?>

  <div class="page content">
    <?php get_template_part('templates/content', 'page'); ?>

    <?php
    $args = array(
      'posts_per_page' => -1,
      'post_type' => 'links',
    );
    $links = new WP_Query($args);

    if ($links->have_posts()) :
    ?>
    <ul class="links">
      <?php while($links->have_posts()) : $links->the_post(); ?>
        <li>
          <p class="name"><?php the_field('name') ?></p>
          <p class="link"><a href="<?php the_field('link') ?>">Link</a></p>
          <div class="description"><?php the_field('description') ?></div>
        </li>
      <?php endwhile; ?>
    </ul>
    <?php
    endif;
    wp_reset_postdata();
    ?>

    <?php
    $args = array(
      'posts_per_page' => -1,
      'post_type' => 'books',
    );
    $books = new WP_Query($args);

    if ($books->have_posts()) :
    ?>
    <ul class="books">
      <?php while($books->have_posts()) : $books->the_post(); ?>
        <li>
          <?php $image = get_field('cover'); ?>
          <img src="<?php echo $image['sizes']['book']; ?>" alt="" />
        </li>
      <?php endwhile; ?>
    </ul>
    <?php
    endif;
    wp_reset_postdata();
    ?>
  </div><!-- /.page-content -->
</div>
