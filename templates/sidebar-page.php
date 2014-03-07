<aside class="page-sidebar">
  <?php
  if (has_post_thumbnail()) :
    the_post_thumbnail();
  else :
    $page_nav = sharan_get_page_nav();
    $default_image = $page_nav['default_sidebar_image'];
    if (!$default_image) :
      $default_image = get_field('default_sidebar_image', 'options');
    endif;
  ?>
    <img src="<?php echo $default_image['sizes']['post-thumbnail'] ?>" alt="" />
  <?php
  endif;

  get_template_part('templates/newsletter-box');

  get_template_part('templates/support-box');

  get_template_part('templates/social-box');
  ?>
</aside>