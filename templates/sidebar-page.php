<aside class="page sidebar">
  <?php
  if (has_post_thumbnail()) :
    the_post_thumbnail();
  else :
    $page_nav = sharan_get_page_nav();
    if ($page_nav && $page_nav['default_sidebar_image']) :
      $default_image = $page_nav['default_sidebar_image'];
    else :
      $default_image = get_field('default_sidebar_image', 'options');
    endif;
  ?>
    <img src="<?php echo check_ssl( $default_image['sizes']['post-thumbnail'] ); ?>" alt="" />
  <?php
  endif;

  get_template_part('templates/newsletter-box');

  get_template_part('templates/support-box');

  get_template_part('templates/social-box');
  ?>
</aside>