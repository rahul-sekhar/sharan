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
        <?php if (roots_display_sidebar()) : ?>
          <aside class="sidebar" role="complementary">
            <?php include roots_sidebar_path(); ?>
          </aside><!-- /.sidebar -->
        <?php endif; ?>
      </div><!-- /.content -->
    </div><!-- /.wrap -->

    <?php get_template_part('templates/footer'); ?>

  </body>
</html>
