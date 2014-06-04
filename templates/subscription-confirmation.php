<?php
if (sharan_subscribe()) : ?>
  <div class="content subscribe">
    <p>Thank you for subscribing. We have sent you a confirmation email.
    You will be redirected back to the <a href="/">home page</a> in a few seconds.</p>
  </div>

  <script>
    setTimeout(function () {
       window.location.href = "/";
    }, 3000);
  </script>

<?php else : ?>

  <div class="content subscribe">
    <p>Subscription failed. Please try again later and contact us if the problem persists.</p>
  </div>

<?php endif; ?>