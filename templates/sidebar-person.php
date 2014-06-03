<aside class="person sidebar">
  <?php
  if (has_post_thumbnail()) :
    $image_id = get_post_thumbnail_id();
    $thumb_src = wp_get_attachment_image_src( $image_id, 'post-thumbnail' )[0];
    $image_src = wp_get_attachment_image_src( $image_id, 'full' )[0];
  else :
    $image = get_field('people_default_sidebar_image', 'options');
    if (!$image) :
      $image = get_field('default_sidebar_image', 'options');
    endif;
    $thumb_src = $image['sizes']['post-thumbnail'];
    $image_src = $image['url'];
  endif;
  ?>
  <a href="<?php echo $image_src; ?>" target="_blank">
    <img src="<?php echo check_ssl( $thumb_src ); ?>" alt="" />
  </a>
  <?php
  get_template_part('templates/newsletter-box');

  get_template_part('templates/support-box');

  get_template_part('templates/social-box');
  ?>
</aside>