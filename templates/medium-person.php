<div class="person medium">
  <a href="<?php the_permalink() ?>">
    <?php get_template_part('templates/thumbnail', 'person') ?>
  </a>

  <div class="info">
    <a href="<?php the_permalink() ?>">
      <p class="name"><?php the_title(); ?></p>
    </a>
    <p class="short-description"><?php the_field('short_description'); ?></p>
  </div>
</div>