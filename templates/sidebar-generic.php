<aside class="sidebar">
  <?php
  $image = get_field('default_sidebar_image', 'options');
  $thumb_src = $image['sizes']['post-thumbnail'];
  $image_src = $image['url'];
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