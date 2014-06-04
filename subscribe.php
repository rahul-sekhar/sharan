<div class="subscribe form inner-container">
  <?php
  if (isset($_POST['submitted'])) :
    get_template_part('templates/subscription', 'confirmation');
  else :
    get_template_part('templates/sidebar', 'subscription');
    ?>
    <div class="content subscribe">
      <h2>Subscribe</h2>

      <?php get_template_part('templates/subscription', 'form'); ?>
    </div>
  <?php endif; ?>
</div>