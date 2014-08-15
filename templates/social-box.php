<?php
$links = get_field('social_links', 'options');
?>
<div class="social">
  <p>Follow SHARAN</p>
  <ul>
    <?php foreach ($links as $link): ?>
      <li><a class="icon-<?php echo $link['type']; ?>" href="<?php echo $link['url']; ?>"></a></li>
    <?php endforeach; ?>
    <li><a class="icon-rss" href="<?php bloginfo('rss2_url'); ?>"></a></li>
  </ul>
</div>