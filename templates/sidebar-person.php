<aside class="person sidebar">
  <?php
  if (has_post_thumbnail()) :
    $image_src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'post-thumbnail' )[0];
  else :
    $default_image = get_field('people_default_sidebar_image', 'options');
    if (!$default_image) :
      $default_image = get_field('default_sidebar_image', 'options');
    endif;

    $image_src = $default_image['sizes']['post-thumbnail'];
  endif;
  ?>
  <img src="<?php echo check_ssl( $image_src ); ?>" alt="" />

  <?php
  get_template_part('templates/newsletter-box');

  get_template_part('templates/support-box');

  get_template_part('templates/social-box');
  ?>
</aside>