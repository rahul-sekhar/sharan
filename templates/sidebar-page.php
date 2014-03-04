<aside class="page-sidebar">
  <?php
  if (has_post_thumbnail()) :
    the_post_thumbnail();
  endif;
  ?>

  <form id="subscribe-form">
    <label for="subscribe-email">Subscribe to our newsletter</label>
    <div class="subscribe-email-box">
      <input id="subscribe-email" type="email" placeholder="Enter your email address" />
      <button type="submit"><i class="icon-ok"></i></button>
    </div>
  </form>

  <section class="support">
    <p>Support our work</p>
    <a href="#">Donate</a>

    <p>Get involved</p>
    <a href="#">Volunteer</a>
  </section>

  <section class="social">
    <p>Keep in touch</p>
    <ul>
      <li><a class="icon-facebook" href="#"></a></li>
      <li><a class="icon-twitter" href="#"></a></li>
      <li><a class="icon-youtube" href="#"></a></li>
    </ul>
  </section>
</aside>