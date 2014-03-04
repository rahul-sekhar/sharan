<?php

require_once locate_template('/lib/advanced-custom-fields/acf.php');
require_once locate_template('/lib/acf-options-page/acf-options-page.php');
require_once locate_template('/lib/acf-repeater/acf-repeater.php');
require_once locate_template('/lib/acf-flexible-content/acf-flexible-content.php');

require_once locate_template('/lib/acf-config.php');

require_once locate_template('/lib/custom-fields/navigation.php'); // Navigation fields

require_once locate_template('/lib/utils.php');             // Utility functions
require_once locate_template('/lib/init.php');              // Initial theme setup and constants
require_once locate_template('/lib/wrapper.php');           // Theme wrapper class
require_once locate_template('/lib/config.php');            // Configuration
require_once locate_template('/lib/titles.php');            // Page titles
require_once locate_template('/lib/cleanup.php');           // Cleanup
require_once locate_template('/lib/relative-urls.php');     // Root relative URLs
require_once locate_template('/lib/scripts.php');           // Scripts and stylesheets
require_once locate_template('/lib/hide-admin-panel.php');  // Hide the admin panel
require_once locate_template('/lib/page-parents.php');      // Getting the parent nav items for a page