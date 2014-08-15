<?php
/**
 * Enqueue scripts and stylesheets
 *
 * Enqueue stylesheets in the following order:
 * 1. /theme/assets/css/main.min.css
 *
 * Enqueue scripts in the following order:
 * 1. jquery-1.11.0.min.js via Google CDN
 * 2. /theme/assets/js/vendor/modernizr-2.7.0.min.js
 * 3. /theme/assets/js/main.min.js (in footer)
 */
function roots_scripts() {
  $version = wp_get_theme()->Version;

  wp_enqueue_style('roots_main', get_template_directory_uri() . '/assets/css/style.css', false, $version);
  wp_enqueue_style('print', get_template_directory_uri() . '/assets/css/print.css', false, $version, 'print');

  // jQuery is loaded using the same method from HTML5 Boilerplate:
  // Grab Google CDN's latest jQuery with a protocol relative URL; fallback to local if offline
  // It's kept in the header instead of footer to avoid conflicts with plugins.
  if (!is_admin() && current_theme_supports('jquery-cdn')) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', array(), null, false);
    add_filter('script_loader_src', 'roots_jquery_local_fallback', 10, 2);
  }

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  wp_register_script('modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr-2.7.0.min.js', array(), null, false);
  wp_register_script('responsiveslides', get_template_directory_uri() . '/assets/js/vendor/responsiveslides.min.js', array('jquery'), null, false);
  wp_register_script('dropdowns', get_template_directory_uri() . '/assets/js/dropdowns.js', array(), $version, false);
  wp_register_script('eventFilters', get_template_directory_uri() . '/assets/js/eventFilters.js', array(), $version, false);
  wp_register_script('eventsPage', get_template_directory_uri() . '/assets/js/eventsPage.js', array(), $version, false);
  wp_register_script('slideshow', get_template_directory_uri() . '/assets/js/slideshow.js', array('responsiveslides'), $version, false);
  wp_register_script('resources', get_template_directory_uri() . '/assets/js/resources.js', array(), $version, false);
  wp_register_script('newsArchives', get_template_directory_uri() . '/assets/js/newsArchives.js', array(), $version, false);
  wp_register_script('extLinks', get_template_directory_uri() . '/assets/js/extLinks.js', array(), $version, false);
  wp_register_script('formValidation', get_template_directory_uri() . '/assets/js/formValidation.js', array(), $version, false);
  wp_register_script('navPull', get_template_directory_uri() . '/assets/js/navPull.js', array(), $version, false);
  wp_register_script('search', get_template_directory_uri() . '/assets/js/search.js', array(), $version, false);
  wp_register_script('credit', get_template_directory_uri() . '/assets/js/credit.js', array(), $version, false);

  wp_enqueue_script('modernizr');
  wp_enqueue_script('jquery');
  wp_enqueue_script('responsiveslides');
  wp_enqueue_script('dropdowns');
  wp_enqueue_script('eventFilters');
  wp_enqueue_script('eventsPage');
  wp_enqueue_script('slideshow');
  wp_enqueue_script('resources');
  wp_enqueue_script('newsArchives');
  wp_enqueue_script('extLinks');
  wp_enqueue_script('formValidation');
  wp_enqueue_script('navPull');
  wp_enqueue_script('search');
  wp_enqueue_script('credit');
}
add_action('wp_enqueue_scripts', 'roots_scripts', 100);

// http://wordpress.stackexchange.com/a/12450
function roots_jquery_local_fallback($src, $handle = null) {
  static $add_jquery_fallback = false;

  if ($add_jquery_fallback) {
    echo '<script>window.jQuery || document.write(\'<script src="' . get_template_directory_uri() . '/assets/js/vendor/jquery-1.11.0.min.js"><\/script>\')</script>' . "\n";
    $add_jquery_fallback = false;
  }

  if ($handle === 'jquery') {
    $add_jquery_fallback = true;
  }

  return $src;
}
add_action('wp_head', 'roots_jquery_local_fallback');

function roots_google_analytics() { ?>
<script>
  (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
  function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
  e=o.createElement(i);r=o.getElementsByTagName(i)[0];
  e.src='//www.google-analytics.com/analytics.js';
  r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
  ga('create','<?php echo GOOGLE_ANALYTICS_ID; ?>');ga('send','pageview');
</script>

<?php }
if (GOOGLE_ANALYTICS_ID && !current_user_can('manage_options')) {
  add_action('wp_footer', 'roots_google_analytics', 20);
}
