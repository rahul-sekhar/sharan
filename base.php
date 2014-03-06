<?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>

    <?php
      do_action('get_header');
      get_template_part('templates/header');
    ?>

    <div id="wrapper" role="document">
      <div class="container">
        <main role="main">
          <?php include roots_template_path(); ?>
        </main>
      </div><!-- /.container -->
    </div><!-- /#wrapper -->

    <?php get_template_part('templates/footer'); ?>

  </body>
</html>
