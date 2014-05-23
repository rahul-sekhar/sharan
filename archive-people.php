<div class="people inner-container with-side-nav">
  <?php get_template_part('templates/side-nav', 'people'); ?>

  <?php get_template_part('templates/sidebar', 'people'); ?>

  <div class="people content">
    <?php
    $people_page = get_people_page();
    if ($people_page) : ?>
      <h2><?php echo $people_page->post_title; ?></h2>
    <?php
    endif;

    $args = array(
      'posts_per_page' => -1,
      'post_type' => 'people',
      'orderby' => 'menu_order'
    );
    $people = new WP_Query($args);

    if ($people->have_posts()) :
    ?>
    <ul class="people">
      <?php while($people->have_posts()) : $people->the_post(); ?>
        <li>
          <?php get_template_part('templates/medium', 'person'); ?>
        </li>
      <?php endwhile; ?>
    </ul>
    <?php
    endif;
    wp_reset_postdata();
    ?>
  </div>
</div>