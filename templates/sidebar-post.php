<aside class="post sidebar">
  <?php
  if (get_field('image')) :
    $image = get_field('image');
    $image_src = $image['sizes']['post-thumbnail'];
  else :
    $posts_page_id = get_option( 'page_for_posts');
    if (has_post_thumbnail($posts_page_id)) :
      $image_src = wp_get_attachment_image_src( get_post_thumbnail_id( $posts_page_id ), 'post-thumbnail' )[0];
    else :
      $default_image = get_field('default_sidebar_image', 'options');
      $image_src = $default_image['sizes']['post-thumbnail'];
    endif;
  endif;
  ?>
  <img src="<?php echo check_ssl( $image_src ); ?>" alt="" />
  <?php
  get_template_part('templates/newsletter-box');

  get_template_part('templates/support-box');

  get_template_part('templates/social-box');
  ?>
</aside>