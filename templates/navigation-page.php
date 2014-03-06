<nav class="page-nav">
  <?php $page_nav = sharan_get_page_nav() ?>
  <?php if ($page_nav) : ?>
    <h3><?php echo $page_nav['name']; ?></h3>

    <?php if ($page_nav['sections']) : $first = true  ?>
      <?php foreach ($page_nav['sections'] as $section) : ?>
        <?php
        if ($first) :
          $first = false;
        ?>
          <ul>
        <?php elseif ($section['name']) : ?>
          </ul>
          <ul>
        <?php endif; ?>

        <?php if ($section['name']) : ?>
          <li class="title"><?php echo $section['name']; ?></li>
        <?php endif; ?>

        <?php if ($section['links']) : foreach ($section['links'] as $link) : ?>
          <li>
            <a href="<?php echo $link['url']; ?>"><?php echo $link['name']; ?></a>
          </li>
        <?php endforeach; endif; ?>
      <?php endforeach; ?>
      </ul>
    <?php endif; ?>

  <?php endif; ?>
</nav>