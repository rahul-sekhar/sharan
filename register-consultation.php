<div class="register inner-container">
  <?php
  if (isset($_POST['submitted'])) :
    get_template_part('templates/registration', 'confirmation-consultation');
  else :
  ?>
    <div class="content register">
      <h2>Registration</h2>

      <?php get_template_part('templates/registration', 'form'); ?>
    </div>
  <?php endif; ?>
</div>