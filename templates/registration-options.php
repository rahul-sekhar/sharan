<?php
if (get_query_var('register') == 'consultation') :
  $options = get_field('consultation_price_options', 'options');
else :
  $options = get_field('price_options');
endif;
?>
<table>
<?php foreach($options as $index => $option) : ?>
  <tr>
    <td class="option">
      <label>
        <input type="radio" name="price_option" value="<?php echo $index ?>" <?php if ($index == 0) echo 'checked="checked" '; ?>/>
        <?php echo $option['name'] ?>
      </label>
    </td>
    <td class="price">
      Rs. <?php echo $option['price'] ?>
    </td>
  </tr>
<?php endforeach; ?>
</table>