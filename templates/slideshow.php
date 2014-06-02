<?php
$slides = get_field('slides', 'options');
if ($slides) :
?>
  <div id="slideshow-wrapper">
    <div id="slideshow">
      <ul class="slides">
        <?php foreach($slides as $slide) : ?>
          <li class="slide">
            <img src="<?php echo check_ssl( $slide['image']['sizes']['slideshow'] ); ?>" alt="" />

            <div class="text">
              <?php if ($slide['text']) : ?>
                <div class="caption">
                  <p><?php echo $slide['text']; ?></p>
                </div>
              <?php endif; ?>

              <a class="button" href="<?php echo $slide['link_url']; ?>"><?php echo $slide['link_text']; ?></a>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
<?php endif; ?>