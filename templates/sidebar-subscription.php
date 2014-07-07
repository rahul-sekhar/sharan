<?php if (get_field('subscription_faq', 'options')) : ?>
  <aside class="subscription form sidebar">
    <?php
    the_field('subscription_faq', 'options');
    ?>
  </aside>
<?php endif; ?>