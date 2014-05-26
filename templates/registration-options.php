<?php $options = get_field('payment_options'); ?>
<ul>
<?php foreach($options as $index => $option) : ?>
  <li>
    <label>
      <input type="radio" name="payment_option" value="<?php echo $index ?>" <?php if ($index == 0) echo 'checked="checked" '; ?>/>
      <?php echo $option['name'] ?><span class="price">Rs. <?php echo $option['price'] ?></span>
    </label>
  </li>
<?php endforeach; ?>
</ul>