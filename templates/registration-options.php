<?php
$options = get_field('payment_options');
if (count($options) == 1) :
?>
  <p><?php echo $options[0]['name'] ?>&mdash;Rs. <?php echo $options[0]['price'] ?></p>
<?php else : ?>
  <ul>
  <?php foreach($options as $index => $option) : ?>
    <li>
      <label>
        <input type="radio" name="payment_option" value="<?php echo $index ?>" <?php if ($index == 0) echo 'checked="checked" '; ?>/>
        <?php echo $option['name'] ?>&mdash;Rs. <?php echo $option['price'] ?>
      </label>
    </li>
  <?php endforeach; ?>
  </ul>
<?php endif; ?>