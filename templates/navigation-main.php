<?php if (have_rows('main_nav', 'options')) : ?>
  <nav id="main-nav" role="navigation">
    <ul>
      <?php while (have_rows('main_nav', 'options')) : the_row(); ?>
        <li<?php if (get_sub_field('sections')) echo ' class="has-dropdown"'; ?>>
          <a href="<?php echo get_sub_field('url') ?: '#'; ?>">
            <?php the_sub_field('name'); ?>
          </a>

          <?php get_template_part('templates/navigation', 'dropdown'); ?>
        </li>
      <?php endwhile; ?>
    </ul>
  </nav>
<?php endif; ?>