<?php
$email = get_query_var('email');
?>
<form id="subscription-form" method="POST" action="">
  <div class="contact">
    <div class="field">
      <input name="name" placeholder="Name" required />
    </div>

    <div class="field">
      <input name="email" type="email" placeholder="Email" value="<?php echo $email; ?>" required />
    </div>

    <div class="field">
      <input name="city" placeholder="City" required />
    </div>

    <div class="field">
      <input name="country" placeholder="Country" required />
    </div>

    <div class="field">
      <input name="mobile" placeholder="Mobile number" />
    </div>

    <div class="field">
      <textarea name="comments" placeholder="Comments"></textarea>
    </div>
  </div>

  <div class="buttons">
    <input type="hidden" name="submitted" value="true" />
    <input class="submit button" type="submit" value="Subscribe" />
  </div>
</form>