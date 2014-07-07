<?php if (get_field('registration_faq', 'options')) : ?>
  <aside class="registration form sidebar">
    <?php
    the_field('registration_faq', 'options');
    ?>
  </aside>
<?php endif; ?>