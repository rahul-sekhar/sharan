<header id="banner" role="banner">
  <div class="container">
    <h1>
      <a href="<?php echo home_url('/') ?>"><?php bloginfo('name'); ?></a>
    </h1>

    <nav id="main-nav" role="navigation">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav nav-pills'));
        endif;
      ?>
    </nav>
  </div>
</header>
