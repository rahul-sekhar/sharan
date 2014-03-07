<section id="home-footer">
  <div class="container">
    <div class="info">
      <p><?php the_field('footer_text', 'options'); ?></p>
    </div>

    <?php
    get_template_part('templates/support-box');
    ?>

    <div class="lower">
      <?php
      get_template_part('templates/social-box');

      get_template_part('templates/newsletter-box');
      ?>
    </div>
  </div>
</section>