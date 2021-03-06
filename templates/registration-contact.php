<?php
$options = get_registration_options();
$price_option = isset($_POST['price_option']) ? (int)$_POST['price_option'] : 0;

get_template_part('templates/sidebar', 'registration');
?>

<div class="content register">
  <h2>Check out</h2>

  <form id="registration-form" method="POST" action="">
    <div class="chosen">
      <table class="options">
        <thead>
          <tr>
            <td class="name"><?php echo get_registration_name(); ?></td>
            <td class="price">Pay now</td>
          </tr>
        </thead>

        <?php $option = $options[$price_option] ?>
        <tbody>
          <tr>
            <td class="option">
              <label><?php echo $option['name']; ?></label>
              <p class="description">
                <?php echo $option['description']; ?>
              </p>
            </td>
            <td class="price">
              Rs. <?php echo $option['price']; ?>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <input type="hidden" name="price_option" value="<?php echo $price_option; ?>" />

    <div class="contact">
      <div class="field">
        <input id="registration-name" name="name" placeholder="Name" required />
      </div>

      <div class="field">
        <input id="registration-email" name="email" type="email" placeholder="Email" required />
      </div>

      <div class="field">
        <input id="registration-phone" name="phone" placeholder="Phone number" required />
      </div>

      <div class="field">
        <textarea id="registration-address" name="address" placeholder="Address" required></textarea>
      </div>

      <div class="field">
        <textarea id="registration-comments" name="comments" placeholder="Comments"></textarea>
      </div>
    </div>

    <table class="method">
      <tbody>
        <tr>
          <td class="option">
            <label>
              <input type="radio" name="method" value="gateway" checked="checked"
              />Pay online
            </label>
            <p class="description">
              Pay by credit card, debit card or net banking.
            </p>
          </td>
        </tr>

        <tr>
          <td class="option">
            <label>
              <input type="radio" name="method" value="manual"
              />Pay offline
            </label>
            <p class="description">
              Deposit cash or a cheque directly to our account by depositing in your local ICICI bank.
              The cheque must be in favour of SHARAN.
              Our bank details are: Acc no 000401139883, ICICI Nariman Point Branch, Mumbai.
            </p>
          </td>
        </tr>
      </tbody>
    </table>

    <div class="buttons checkout">
      <input type="hidden" name="submitted" value="true" />
      <input class="submit button" type="submit" value="Checkout" />
    </div>
  </form>
</div>