<?php
if (get_sub_field('sections')):
  ?>
  <div class="dropdown">
    <div class="feature-container">
      <?php if (get_sub_field('navigation_feature_type') == 'Image'):
        $image = get_sub_field('feature_image');
        if ($image): ?>
          <a href="<?php the_sub_field('feature_link_url'); ?>">
            <div class="image">
              <img src="<?php echo check_ssl( $image['sizes']['nav-feature'] ); ?>" alt="" />
            </div>

            <?php if (get_sub_field('caption')): ?>
              <p class="caption"><?php the_sub_field('caption'); ?></p>
            <?php endif; ?>
          </a>
        <?php else: ?>
          <div class="placeholder"></div>
         <?php endif; ?>
      <?php endif; ?>
    </div>

    <?php while (has_sub_field('sections')): ?>
      <ul>
        <li class="name"><?php the_sub_field('name'); ?></li>

        <?php
        if (get_sub_field('links')):
          while (has_sub_field('links')):
          ?>
            <li>
              <a href="<?php the_sub_field('url'); ?>"><?php the_sub_field('name'); ?></a>
            </li>
          <?php
          endwhile;
        endif;
        ?>
      </ul>
    <?php endwhile; ?>
  </div>
<?php endif; ?>