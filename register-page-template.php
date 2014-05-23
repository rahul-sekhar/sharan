<?php
/*
Template Name: Register page
*/
?>
<div class="inner-container">
  <?php
  $post = get_page_by_path(get_query_var('event'), OBJECT, 'events');
  $from_date = get_field('from', $post->ID);
  $registrations_closed = ($from_date < date('Ymd'));

  if ($post) : setup_postdata($post);
    if (!$registrations_closed) :
      get_template_part('templates/sidebar', 'registration');
    endif;
    ?>
    <div class="content register">
      <h2>Register for <?php the_title(); ?></h2>

      <?php
      if ($registrations_closed) :
        get_template_part('templates/registration', 'closed');
      else :
        get_template_part('templates/registration', 'form');
      endif;
      ?>
    </div>
  <?php else :
    get_template_part('templates/404');
  endif;
  wp_reset_postdata();
  ?>
</div>