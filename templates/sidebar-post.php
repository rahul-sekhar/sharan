<aside class="post sidebar">
  <?php
  if (get_field('image')) :
    $image = get_field('image');
    $thumb_src = $image['sizes']['post-thumbnail'];
    $image_src = $image['url'];
  else :
    $posts_page_id = get_option( 'page_for_posts');
    if (has_post_thumbnail($posts_page_id)) :
      $image_id = get_post_thumbnail_id( $posts_page_id );
      $thumb_src = wp_get_attachment_image_src( $image_id, 'post-thumbnail' )[0];
      $image_src = wp_get_attachment_image_src( $image_id, 'full' )[0];
    else :
      $image = get_field('default_sidebar_image', 'options');
      $thumb_src = $image['sizes']['post-thumbnail'];
      $image_src = $image['url'];
    endif;
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