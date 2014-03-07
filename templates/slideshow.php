<?php
$slides = get_field('slides', 'options');
if ($slides) :
?>
  <div id="slideshow">
    <ul class="slides">
      <?php foreach($slides as $slide) : ?>
        <li>
          <img src="<?php echo $slide['image']['url'] ?>" alt="" />

          <div class="text">
            <?php if ($slide['text']) : ?>
              <p class="caption"><?php echo $slide['text']; ?></p>
            <?php endif; ?>

            <a class="button" href="<?php echo $slide['link_url']; ?>"><?php echo $slide['link_text']; ?></a>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php endif; ?>