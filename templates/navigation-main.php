<?php
$nav = sharan_get_navigation();
if ($nav) :
?>
  <nav id="main-nav" role="navigation">
    <ul>
      <?php foreach ($nav as $nav_item) : ?>
        <li<?php if ($nav_item['sections']) echo ' class="has-dropdown"'; ?>>
          <a href="<?php echo $nav_item['url'] ?: '#'; ?>">
            <?php echo $nav_item['name']; ?>
          </a>

          <?php include(locate_template('templates/navigation-dropdown.php')); ?>
        </li>
      <?php endforeach; ?>
    </ul>
  </nav>
  <a href="#" id="nav-pull"></a>
<?php endif; ?>