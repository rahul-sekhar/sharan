<div class="register form inner-container">
  <?php
  if (isset($_POST['submitted'])) :
    get_template_part('templates/registration', 'confirmation');
  elseif(isset($_POST['options_submitted'])) :
    get_template_part('templates/registration', 'contact');
  else :
    get_template_part('templates/registration', 'options');
  endif;
  ?>
</div>