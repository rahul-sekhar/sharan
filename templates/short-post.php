<h3>
  <a href="<?php the_permalink(); ?>">
    <?php the_title(); ?>
  </a>
</h3>
<p class="date"><?php echo get_the_time(get_option('date_format')); ?></p>
<?php the_excerpt(); ?>