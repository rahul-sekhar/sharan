<?php

require_once locate_template('/lib/advanced-custom-fields/acf.php');
require_once locate_template('/lib/acf-options-page/acf-options-page.php');
require_once locate_template('/lib/acf-repeater/acf-repeater.php');
require_once locate_template('/lib/acf-flexible-content/acf-flexible-content.php');

acf_add_options_sub_page('Navigation');

require_once locate_template('/lib/utils.php');             // Utility functions
require_once locate_template('/lib/init.php');              // Initial theme setup and constants
require_once locate_template('/lib/wrapper.php');           // Theme wrapper class
require_once locate_template('/lib/sidebar.php');           // Sidebar class
require_once locate_template('/lib/config.php');            // Configuration
require_once locate_template('/lib/titles.php');            // Page titles
require_once locate_template('/lib/cleanup.php');           // Cleanup
require_once locate_template('/lib/relative-urls.php');     // Root relative URLs
require_once locate_template('/lib/scripts.php');           // Scripts and stylesheets
require_once locate_template('/lib/hide-admin-panel.php');  // Hide the admin panel