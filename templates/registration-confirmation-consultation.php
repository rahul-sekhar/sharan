<?php
if (register_consultation()) : ?>
  <div class="content register">
    <p>Thank you for registering. We have sent you a confirmation email.
    You will be redirected back to the <a href="/consultation">consultation page</a> in a few seconds.</p>
  </div>

  <script>
    setTimeout(function () {
       window.location.href = "/consultation";
    }, 5000);
  </script>

<?php else : ?>

  <div class="content register">
    <p>Registration failed. Please try again later and contact us if the problem persists.</p>
  </div>

<?php endif; ?>