<?php
$links = get_field('social_links', 'options');
if ($links): ?>
<div class="social">
  <p>Keep in touch</p>
  <ul>
    <?php foreach ($links as $link): ?>
      <li><a class="icon-<?php echo $link['type']; ?>" href="<?php echo $link['url']; ?>"></a></li>
    <?php endforeach; ?>
  </ul>
</div>
<?php endif; ?>