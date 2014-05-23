<?php
$post = get_people_page();
if ($post) : setup_postdata($post);
  get_template_part('templates/side-nav', 'page');
  wp_reset_postdata();
endif;
?>