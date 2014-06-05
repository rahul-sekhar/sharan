<?php
$options = get_registration_options();

get_template_part('templates/sidebar', 'registration');
?>

<div class="content register">
  <h2>Choose an option</h2>

  <form id="registration-form" method="POST" action="">
    <table class="options">
      <thead>
        <tr>
          <td class="name"><?php echo get_registration_name(); ?></td>
          <td class="price">Pay now</td>
        </tr>
      </thead>
      <tbody>
      <?php foreach($options as $index => $option) : ?>
        <tr>
          <td class="option">
            <label>
              <input type="radio" name="price_option" value="<?php echo $index ?>" <?php if ($index == 0) echo 'checked="checked" '; ?>
              /><?php echo $option['name']; ?>
            </label>
            <p class="description">
              <?php echo $option['description']; ?>
            </p>
          </td>
          <td class="price">
            Rs. <?php echo $option['price']; ?>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>

    <div class="buttons">
      <input type="hidden" name="options_submitted" value="true" />
      <input class="submit button" type="submit" value="Proceed" />
    </div>
  </form>
</div>


