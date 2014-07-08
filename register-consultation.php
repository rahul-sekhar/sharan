<div class="register form inner-container">
  <?php
  if (isset($_POST['submitted'])) :
    if (isset($_POST['method']) && $_POST['method'] == 'manual') :
      get_template_part('templates/registration', 'manual-payment');
    else :
      get_template_part('templates/registration', 'gateway-payment');
    endif;
  elseif(isset($_POST['options_submitted'])) :
    get_template_part('templates/registration', 'contact');
  else :
    get_template_part('templates/registration', 'options');
  endif;
  ?>
</div>