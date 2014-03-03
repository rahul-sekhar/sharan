<nav class="breadcrumbs">
  <ol>
    <?php foreach(sharan_get_breadcrumbs() as $breadcrumb) : ?>
      <li>
      <?php if ($breadcrumb['url']) : ?>
        <a href="<?php echo $breadcrumb['url']; ?>">
        <?php endif; ?>

        <?php echo $breadcrumb['name']; ?>

        <?php if ($breadcrumb['url']) : ?>
        </a>
      <?php endif; ?>
    <?php endforeach; ?>
  </ol>
</nav>