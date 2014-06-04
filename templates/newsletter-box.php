<form id="subscribe-form" method="get" action="/subscribe">
  <label for="subscribe-email">Join our mailing list</label>
  <div class="subscribe-email-box">
    <input id="subscribe-email" type="email" name="email" placeholder="Enter your email address" />
    <button type="submit"><i class="icon-right-open-big"></i></button>
  </div>

  <a href="<?php the_field('newsletter_link', 'options'); ?>" class="archive">Newsletter archive</a>
</form>