<?php
/*
Template Name: Gallery page
*/
?>
<?php while (have_posts()) : the_post(); ?>
  <div class="inner-container" id="gallery">
    <div class="content gallery">
      <h2><?php the_title(); ?></h2>

      <div class="pwa-inner">
        <?php
        // Turn off error reporting for this plugin, as it uses deprecated methods
        $old_reporting = error_reporting();
        error_reporting($old_reporting & ~E_NOTICE & ~E_DEPRECATED);

        echo do_shortcode('[pwaplusphp]');

        // Restore error reporting
        error_reporting($old_reporting);
        ?>
      </div>
    </div>
  </div>
<?php endwhile; ?>