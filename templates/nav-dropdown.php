<?php if (get_sub_field('sections')): ?>
  <div class="dropdown">
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