<h2><?php the_title(); ?></h2>

<section class="info">
  <p class="dates"><?php sharan_event_dates( get_field('from'), get_field('to') ) ?></p>
  <p class="location">
    <?php
    if (get_field('location')) :
      echo get_field('location') . ', ';
    endif;
    echo sharan_get_taxonomy_item('city')
    ?>
  </p>
</section>

<section class="pre-content">
  <?php if (has_post_thumbnail()) : ?>
    <div class="image">
      <?php the_post_thumbnail('event-medium'); ?>
    </div>
  <?php endif; ?>

  <div class="register">
    <a href="#" class="button">Register</a>
  </div>
</section>

<section class="inner-content">
  <?php the_content(); ?>
</section>

<?php
$people = get_field('people');
if ($people) :
?>
<section class="people">
  <h3>Resource People</h3>
  <ul>
  <?php foreach($people as $person) : ?>
    <li>
      <div class="image"><?php echo get_the_post_thumbnail($person->ID, 'person'); ?></div>
      <p class="name"><?php echo $person->post_title; ?></p>
    </li>
  <?php endforeach; ?>
  </ul>
</section>
<?php endif; ?>

<?php if (get_field('links')) : ?>
<section class="links">
  <h3>Links</h3>
  <ul>
    <?php while (has_sub_field('links')) : ?>
      <li>
        <a href="<?php the_sub_field('url'); ?>"><?php the_sub_field('name'); ?></a>
      </li>
    <?php endwhile; ?>
  </ul>
</section>
<?php endif; ?>