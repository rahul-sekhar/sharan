<?php while (have_posts()) : the_post(); ?>
  <?php
  $parent_page = get_recipe_parent_page();
  ?>

  <div class="recipe inner-container<?php if ($parent_page) echo ' with-side-nav'; ?>">
    <?php
    if ($parent_page) :
      get_template_part('templates/side-nav', 'recipe');
    endif;
    ?>

    <?php get_template_part('templates/sidebar', 'recipe'); ?>

    <div class="recipe content">
      <div class="bar">
        <?php if( $parent_page ) : ?>
          <a href="<?php echo get_permalink($parent_page->ID) . '#' . get_slug(); ?>" class="back">Back to <?php echo get_the_title($parent_page->ID); ?></a>
        <?php endif; ?>
        <a href="javascript:window.print()" class="icon-print print"></a>
      </div>

      <?php get_template_part('templates/content', 'recipe-single'); ?>

      <div class="bar bottom">
        <?php if( $parent_page ) : ?>
          <a href="<?php echo get_permalink($parent_page->ID) . '#' . get_slug(); ?>" class="back">Back to <?php echo get_the_title($parent_page->ID); ?></a>
        <?php endif; ?>
      </div>
    </div><!-- /.post-content -->
  </div>
<?php endwhile; ?>
