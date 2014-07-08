<?php
$charging_object = sharan_get_charging_object();
if ($charging_object) : ?>
  <div class="content register">
    <p>Processing your payment request. Please do not press stop, refresh or the back button</p>

    <form method="POST" action="<?php echo $charging_object["url"]?>" id="payment-form">
        <?php
        foreach($charging_object["params"] as $key => $value) :
            echo "<input type='hidden' name='{$key}' value='$value'>";
        endforeach;
        ?>
    </form>
  </div>

  <script>
    document.getElementById("payment-form").submit();
  </script>

<?php else : ?>

  <div class="content register">
    <p>Registration failed. Please try again later and contact us if the problem persists.</p>
  </div>

<?php endif; ?>