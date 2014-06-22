<?php
if ($nav_item['sections']):
  ?>
  <div class="dropdown">
    <div class="feature-container">
      <?php if ($nav_item['navigation_feature_type'] == 'Image'):
        $image = $nav_item['feature_image'];
        if ($image): ?>
          <a href="<?php echo $nav_item['feature_link_url']; ?>">
            <div class="image">
              <img src="<?php echo check_ssl( $image['sizes']['nav-feature'] ); ?>" alt="" />
            </div>

            <?php if ($nav_item['caption']): ?>
              <p class="caption"><?php echo $nav_item['caption']; ?></p>
            <?php endif; ?>
          </a>
        <?php else: ?>
          <div class="placeholder"></div>
         <?php endif; ?>
      <?php endif; ?>
    </div>

    <?php foreach ($nav_item['sections'] as $section) : ?>
      <ul>
        <li class="name"><?php echo $section['name']; ?></li>

        <?php
        if ($section['links']):
          foreach($section['links'] as $link) :
          ?>
            <li>
              <a href="<?php echo $link['url']; ?>"><?php echo $link['name']; ?></a>
            </li>
          <?php
          endforeach;
        endif;
        ?>
      </ul>
    <?php endforeach; ?>
  </div>
<?php endif; ?>