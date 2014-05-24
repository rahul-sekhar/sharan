<a href="<?php echo $post->url ?>">
  <div class="thumb">
    <img src="<?php echo $post->thumbnail; ?>" />
  </div>
  <p class="title"><?php echo $post->title ?></p>
  <p class="date"><?php echo date(get_option('date_format'), $post->date); ?></p>
  <p class="num-photos"><?php echo $post->num_photos ?> photo<?php if ($post->num_photos > 1) echo 's' ?></p>
</a>