<div class="register form inner-container">
  <?php
  $post = get_page_by_path(get_query_var('event'), OBJECT, 'events');
  $registrations_allowed = registrations_allowed($post);
  $registrations_closed = registrations_closed($post);

  if ($registrations_allowed && $post) : setup_postdata($post);
    if ($registrations_closed) :
      get_template_part('templates/registration', 'closed');
    else :
      if (isset($_POST['submitted'])) :
        get_template_part('templates/registration', 'confirmation');
      elseif(isset($_POST['options_submitted'])) :
        get_template_part('templates/registration', 'contact');
      else :
        get_template_part('templates/registration', 'options');
      endif;
    endif;
  else :
    get_template_part('templates/404');
  endif;
  wp_reset_postdata();
  ?>
</div>