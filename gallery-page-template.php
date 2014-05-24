<?php
/*
Template Name: Gallery page
*/
?>
<?php while (have_posts()) : the_post(); ?>
  <div class="inner-container" id="gallery">

    <div class="content gallery">
      <h2><?php the_title(); ?></h2>

      <?php
      $page = get_query_var('page');
      $usernames = get_field('picasa_usernames', 'options');
      $gallery = new SharanAlbums($usernames);
      ?>
      <ul class="albums">
        <?php foreach($gallery->album_page($page) as $post) : ?>
          <li>
            <?php get_template_part('templates/gallery', 'album'); ?>
          </li>
        <?php endforeach;
        wp_reset_postdata($post);
        ?>
      </ul>
      <div class="pagination">
        <p>Page</p>
        <ul>
          <?php for($i=1; $i<=$gallery->num_pages(); $i++) : ?>
            <li>
              <?php if ($i == $page) : ?>
                <span class="current"><?php echo $i ?></a>
              <?php else : ?>
                <a href="<?php the_permaLink(); ?>/<?php echo $i ?>"><?php echo $i ?></a>
              <?php endif; ?>
            </li>
          <?php endfor; ?>
        </ul>
      </div>
    </div>
  </div>
<?php endwhile; ?>