<form id="registration-form" method="POST" action="">
  <div class="options">
    <p class="name"><?php the_title() ?></p>
    <?php get_template_part('templates/registration', 'options') ?>
  </div>

  <div class="contact">
    <?php get_template_part('templates/registration', 'contact') ?>
  </div>

  <div class="buttons">
    <input type="hidden" name="submitted" value="true" />
    <input class="submit button" type="submit" value="Register" />
  </div>
</form>