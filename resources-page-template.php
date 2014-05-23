<?php
/*
Template Name: Resources page
*/
?>
<div class="inner-container" id="resources">
  <?php get_template_part('templates/sidebar', 'page'); ?>

  <div class="content resources">
    <h2>Resources</h2>

    <div class="resource-filters">
      <ul>
        <?php
        $default_tag_id = get_field('default_resource_tag', 'options');
        foreach (get_terms('resource_tag') as $tag) :
          ?><li<?php if ($default_tag_id == $tag->term_id) echo ' class="selected"' ?>>
          <a href="#" data-id="<?php echo $tag->term_id; ?>"><?php echo $tag->name; ?></a>
        </li><?php endforeach; ?>
      </ul>
    </div>

    <?php
    // Books
    $args = array(
      'posts_per_page' => -1,
      'post_type' => 'books',
      'orderby' => 'title',
      'order' => 'ASC'
    );
    $books = new WP_Query($args);

    if ($books->have_posts()) :
    ?>
    <ul class="books">
      <?php while($books->have_posts()) : $books->the_post(); ?><li class="resource <?php the_resource_tag_classes() ?>">
          <?php $image = get_field('cover'); ?>
          <img src="<?php echo $image['sizes']['book']; ?>" alt="" />

          <div class="info">
            <p class="name"><?php the_title(); ?></p>
            <p class="author"><?php the_field('author'); ?></p>
          </div>

          <div class="description">
            <p class="name"><?php the_title(); ?></p>
            <p class="author"><?php the_field('author'); ?></p>
            <p><?php the_field('description'); ?></p>
            <?php if(get_field('buy_link')) : ?>
              <a class="buy button" href="<?php the_field('buy_link'); ?>" target="_blank">Buy book</a>
            <?php endif; ?>
          </div>
        </li><?php endwhile; ?>
    </ul>
    <?php
    endif;
    wp_reset_postdata();
    ?>

    <?php
    // Links
    $args = array(
      'posts_per_page' => -1,
      'post_type' => 'links',
      'orderby' => 'title',
      'order' => 'ASC'
    );
    $links = new WP_Query($args);

    if ($links->have_posts()) :
    ?>
    <ul class="links">
      <?php while($links->have_posts()) : $links->the_post(); ?>
        <li class="resource <?php the_resource_tag_classes() ?>">
          <p class="name"><a href="<?php the_field('link') ?>"><?php the_title(); ?></a></p>
          <div class="description"><?php the_field('description') ?></div>
        </li>
      <?php endwhile; ?>
    </ul>
    <?php
    endif;
    wp_reset_postdata();
    ?>
  </div><!-- /.page-content -->
</div>
