<div class="confirmation inner-container">
  <?php
  $response = sharan_get_charging_response();
  if ($response['success']) : ?>
    <div class="content confirmation">
      <h2>Payment successful</h2>

      <p>
        Your payment for Rs. <?php echo $response['amount'] ?> was successful.
        Your transaction ID is <?php echo $response['transaction_id'] ?>.
        You will receive a confirmation mail shortly.
      </p>

      <p><a href="<?php echo $response['return_url'] ?>">Return</a>
    </div>

    <script>
      document.getElementById("payment-form").submit();
    </script>

  <?php else : ?>

    <div class="content confirmation">
      <h2>Payment failed</h2>

      <?php if ($response['message']) : ?>
        <p><?php echo $response['message']; ?></p>
      <?php endif; ?>

      <p>Please try again later and contact us if the problem persists.</p>

      <p><a href="<?php echo $response['return_url'] ?>">Return</a>
    </div>

  <?php endif; ?>
</div>