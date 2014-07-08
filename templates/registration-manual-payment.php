<?php
$response = sharan_manual_payment();
if ($response['success']) : ?>
  <div class="content register">
    <h2>Registration successful</h2>
    <p>Thanks for registering. Your transaction ID is <?php echo $response['transaction_id']; ?>. You will receive an email with further instructions.</p>

    <?php if (isset($response['return_url'])) : ?>
      <p><a href="<?php echo $response['return_url'] ?>">Return</a>
    <?php endif; ?>
  </div>

<?php else : ?>

  <div class="content register">
    <p>Registration failed. Please try again, and contact us if the problem persists.</p>

    <?php if (isset($response['return_url'])) : ?>
      <p><a href="<?php echo $response['return_url'] ?>">Return</a>
    <?php endif; ?>
  </div>

<?php endif; ?>