<?php if (have_rows('main_nav', 'options')) : ?>
  <nav id="main-nav" role="navigation">
    <ul>
      <?php while (have_rows('main_nav', 'options')) : the_row(); ?>
        <li>
          <a href="#"><?php the_sub_field('name'); ?></a>

          <?php get_template_part('templates/nav-dropdown'); ?>
        </li>
      <?php endwhile; ?>
    </ul>
  </nav>
<?php endif; ?>