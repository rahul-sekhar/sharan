<?php

require_once locate_template('/lib/advanced-custom-fields/acf.php');
require_once locate_template('/lib/acf-options-page/acf-options-page.php');
require_once locate_template('/lib/acf-repeater/acf-repeater.php');
require_once locate_template('/lib/acf-flexible-content/acf-flexible-content.php');

require_once locate_template('/lib/acf-config.php');

require_once locate_template('/lib/custom-fields/navigation.php');                  // Navigation fields
require_once locate_template('/lib/custom-fields/events.php');                      // Event fields
require_once locate_template('/lib/custom-fields/people.php');                      // People fields
require_once locate_template('/lib/custom-fields/default-sidebar-image.php');       // Default sidebar image option fields
require_once locate_template('/lib/custom-fields/slideshow.php');                   // Slideshow fields

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
require_once locate_template('/lib/tinymce.php');           // Customize the TinyMCE editor
require_once locate_template('/lib/event-type.php');        // Custom post type for events
require_once locate_template('/lib/person-type.php');       // Custom post type for people
require_once locate_template('/lib/date-formatting.php');   // Functions to format dates
require_once locate_template('/lib/taxonomies.php');        // Functions tfor custom taxonomies
require_once locate_template('/lib/event-ajax.php');        // AJAX handlers for events
require_once locate_template('/lib/shortcodes.php');        // Shortcode handlers
require_once locate_template('/lib/move-metaboxes.php');     // Move the default wordpress metaboxes