<aside class="person sidebar">
  <?php
  $default_image = get_field('people_default_sidebar_image', 'options');
  if (!$default_image) :
    $default_image = get_field('default_sidebar_image', 'options');
  endif;
  ?>
    <img src="<?php echo $default_image['sizes']['post-thumbnail'] ?>" alt="" />
  <?php
  get_template_part('templates/newsletter-box');

  get_template_part('templates/support-box');

  get_template_part('templates/social-box');
  ?>
</aside>