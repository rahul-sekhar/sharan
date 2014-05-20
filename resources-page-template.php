<?php
/*
Template Name: Resources page
*/
?>
<?php while (have_posts()) : the_post(); ?>
  <div class="page-container">
    <?php get_template_part('templates/navigation', 'page'); ?>

    <?php get_template_part('templates/sidebar', 'page'); ?>

    <div class="page content">
      <?php get_template_part('templates/content', 'page'); ?>

      <?php
      if ( have_rows('categories') ) :
      ?>
        <div class="dropdown-container">

        <?php while ( have_rows('categories') ) : the_row(); ?>
          <h5 class="dropdown-title"><?php the_sub_field('name'); ?></h5>

          <?php if ( have_rows('books') ) : ?>
            <h6>Books</h6>
            <ul class="books">
              <?php while ( have_rows('books') ) : the_row() ?>
                <li>
                  <?php
                  $image = get_sub_field('image');
                  if ($image) : ?>
                    <img src="<?php echo $image['sizes']['book']; ?>" alt="" />
                  <?php endif; ?>

                  <p class="name"><?php the_sub_field('name') ?></p>
                  <p class="author"><?php the_sub_field('author') ?></p>
                  <p class="buy"><a href="<?php the_sub_field('buy-link'); ?>">Buy</a></p>
                  <div class="description">
                    <?php the_sub_field('description'); ?>
                  </div>
                </li>
              <?php endwhile; ?>
            </ul>
          <?php
          endif;

          if ( have_rows('links') ) : ?>
            <h6>Links</h6>
            <ul class="links">
              <?php while ( have_rows('links') ) : the_row() ?>
                <li>
                  <p class="name"><?php the_sub_field('name') ?></p>
                  <p class="link"><a href="<?php the_sub_field('link'); ?>">Link</a></p>
                  <div class="description">
                    <?php the_sub_field('description'); ?>
                  </div>
                </li>
              <?php endwhile; ?>
            </ul>
          <?php
          endif;
        endwhile; ?>

        </div>
      <?php
      endif;
      ?>
    </div><!-- /.page-content -->
  </div>
<?php endwhile; ?>
