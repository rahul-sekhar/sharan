<?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>

    <?php
      do_action('get_header');
      get_template_part('templates/header');
    ?>

    <div id="wrapper" role="document">
      <main role="main" class="container">
        <?php include roots_template_path(); ?>
      </main>

      <?php get_template_part('templates/home-footer') ?>
    </div><!-- /#wrapper -->

    <?php get_template_part('templates/footer'); ?>

  </body>
</html>
