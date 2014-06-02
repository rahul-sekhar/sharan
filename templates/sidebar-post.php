<aside class="post sidebar">
  <?php
  if (has_post_thumbnail()) :
    the_post_thumbnail();
  else :
    $posts_page_id = get_option( 'page_for_posts');
    if (has_post_thumbnail($posts_page_id)) :
      echo get_the_post_thumbnail($posts_page_id);
    else :
      $default_image = get_field('default_sidebar_image', 'options');
    ?>
      <img src="<?php echo check_ssl( $default_image['sizes']['post-thumbnail'] ); ?>" alt="" />
    <?php
    endif;
  endif;

  get_template_part('templates/newsletter-box');

  get_template_part('templates/support-box');

  get_template_part('templates/social-box');
  ?>
</aside>