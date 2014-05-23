<?php
/*
Template Name: Gallery page
*/
?>
<div class="inner-container" id="gallery">
  <?php
  // Turn off error reporting for this plugin, as it uses deprecated methods
  $old_reporting = error_reporting();
  error_reporting($old_reporting & ~E_NOTICE & ~E_DEPRECATED);

  echo do_shortcode('[pwaplusphp]');

  // Restore error reporting
  error_reporting($old_reporting);
  ?>
</div>