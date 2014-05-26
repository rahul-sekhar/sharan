<aside class="sidebar">
  <?php
  $default_image = get_field('default_sidebar_image', 'options');
  ?>
    <img src="<?php echo $default_image['sizes']['post-thumbnail'] ?>" alt="" />
  <?php

  get_template_part('templates/newsletter-box');

  get_template_part('templates/support-box');

  get_template_part('templates/social-box');
  ?>
</aside>