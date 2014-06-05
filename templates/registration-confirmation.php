<?php
if (sharan_register()) : ?>
  <div class="content register">
    <p>Thank you for registering. We have sent you a confirmation email.
    You will be redirected back to the <a href="<?php echo registration_return_path(); ?>">event page</a> in a few seconds.</p>
  </div>

  <script>
    setTimeout(function () {
       window.location.href = "<?php echo registration_return_path(); ?>";
    }, 3000);
  </script>

<?php else : ?>

  <div class="content register">
    <p>Registration failed. Please try again later and contact us if the problem persists.</p>
  </div>

<?php endif; ?>