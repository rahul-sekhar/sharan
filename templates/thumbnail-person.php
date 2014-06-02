<div class="image<?php if (!has_post_thumbnail()) echo ' empty'?>">
  <?php
  if (has_post_thumbnail()) :
    $image_src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'person' )[0];
    ?>
    <img src="<?php echo check_ssl( $image_src ); ?>" alt="" />
  <?php endif; ?>
</div>