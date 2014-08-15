<?php set_query_var('recipe_page_id', get_the_ID()); ?>

<h2><?php the_title(); ?></h2>

<?php the_content(); ?>

<?php
if (get_field('main_category')) :
  $args = array(
    'posts_per_page' => -1,
    'post_type' => 'recipes',
    'tax_query' => array(
      array(
        'taxonomy' => 'recipe_category',
        'terms' => get_field('main_category')->term_id,
        'include_children' => false
      )
    ),
    'orderby' => 'title',
    'post_status' => 'publish',
  );
  $recipes = new WP_Query($args);

  if ($recipes->have_posts()) :
  ?>
  <div class="category">
    <ul class="recipes">
    <?php while($recipes->have_posts()) : $recipes->the_post(); ?>
      <li><?php get_template_part('templates/short', 'recipe'); ?></li>
    <?php endwhile; ?>
    </ul>
  </div>
  <?php
  endif;
  wp_reset_postdata();
endif;
?>

<?php if (get_field('categories')) : foreach(get_field('categories') as $category) : ?>
  <?php
  $args = array(
    'posts_per_page' => -1,
    'post_type' => 'recipes',
    'tax_query' => array(
      array(
        'taxonomy' => 'recipe_category',
        'terms' => $category['object']->term_id,
        'include_children' => false
      )
    ),
    'orderby' => 'title',
    'order' => 'ASC',
    'post_status' => 'publish',
  );
  $recipes = new WP_Query($args);

  if ($recipes->have_posts()) :
  ?>
  <div class="category">
    <h3><?php echo $category['object']->name ?></h3>
    <ul class="recipes">
    <?php while($recipes->have_posts()) : $recipes->the_post(); ?>
      <li><?php get_template_part('templates/short', 'recipe'); ?></li>
    <?php endwhile; ?>
    </ul>
  </div>
  <?php
  endif;
  wp_reset_postdata();
  ?>
<?php endforeach; endif; ?>