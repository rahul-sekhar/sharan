<form id="registration-form" method="POST" action="">
  <div class="options">
    <?php if (get_query_var('register') == 'consultation') : ?>
      <p class="name">Consultation</p>
    <?php else : ?>
      <p class="name"><?php the_title() ?></p>
    <?php endif; ?>
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