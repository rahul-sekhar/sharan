<?php
$links = get_field('footer_links', 'options');
if ($links): ?>
<ul>
  <?php foreach ($links as $link): ?>
    <li><a href="<?php echo $link['link']; ?>"><?php echo $link['name'] ?></a></li>
  <?php endforeach; ?>
</ul>
<?php endif; ?>