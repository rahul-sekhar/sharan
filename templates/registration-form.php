<form id="registration-form" method="POST" action="">
  <div class="options">
    <?php get_template_part('templates/registration', 'options') ?>
  </div>

  <div class="contact">
    <?php get_template_part('templates/registration', 'contact') ?>
  </div>

  <div class="buttons">
    <a class="cancel" href="<?php echo the_permalink(); ?>">Cancel</a>

    <input type="hidden" name="submitted" value="true" />
    <input class="submit" type="submit" value="Register" />
  </div>
</form>