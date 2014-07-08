<div class="dropdown-container recipe">
  <div class="dropdown-title">
    <h4><?php the_title(); ?></h4>
    <?php if (has_post_thumbnail()) : ?>
      <div class="image-container"><?php the_post_thumbnail(); ?></div>
    <?php endif; ?>
  </div>
  <?php if (has_post_thumbnail()) : ?>
      <div class="image-container"><?php the_post_thumbnail(); ?></div>
    <?php endif; ?>
  <?php the_content(); ?>
</div>