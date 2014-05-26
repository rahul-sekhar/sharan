<?php

require_once locate_template('/lib/advanced-custom-fields/acf.php');
require_once locate_template('/lib/acf-options-page/acf-options-page.php');
require_once locate_template('/lib/acf-repeater/acf-repeater.php');
require_once locate_template('/lib/acf-flexible-content/acf-flexible-content.php');

require_once locate_template('/lib/acf-config.php');

require_once locate_template('/lib/custom-fields/navigation.php');
require_once locate_template('/lib/custom-fields/events.php');
require_once locate_template('/lib/custom-fields/people.php');
require_once locate_template('/lib/custom-fields/default-sidebar-image.php');
require_once locate_template('/lib/custom-fields/slideshow.php');
require_once locate_template('/lib/custom-fields/home-footer-text.php');
require_once locate_template('/lib/custom-fields/sidebar-footer-links.php');
require_once locate_template('/lib/custom-fields/event-removal.php');
require_once locate_template('/lib/custom-fields/resources.php');
require_once locate_template('/lib/custom-fields/page-placeholder-message.php');
require_once locate_template('/lib/custom-fields/default-resource-tag.php');
require_once locate_template('/lib/custom-fields/event-registration.php');
require_once locate_template('/lib/custom-fields/registration-options.php');
require_once locate_template('/lib/custom-fields/gallery.php');
require_once locate_template('/lib/custom-fields/email.php');
require_once locate_template('/lib/custom-fields/registrations.php');

require_once locate_template('/lib/utils.php');                   // Utility functions
require_once locate_template('/lib/init.php');                    // Initial theme setup and constants
require_once locate_template('/lib/wrapper.php');                 // Theme wrapper class
require_once locate_template('/lib/config.php');                  // Configuration
require_once locate_template('/lib/titles.php');                  // Page titles
require_once locate_template('/lib/cleanup.php');                 // Cleanup
require_once locate_template('/lib/relative-urls.php');           // Root relative URLs
require_once locate_template('/lib/scripts.php');                 // Scripts and stylesheets

require_once locate_template('/lib/cache.php');                   // Create cache folder
require_once locate_template('/lib/gallery.php');                 // Gallery class to pull from Picasa

require_once locate_template('/lib/remove-comments.php');         // Remove comments
require_once locate_template('/lib/remove-post-taxonomies.php');  // Remove category and tags from posts
require_once locate_template('/lib/hide-admin-panel.php');        // Hide the admin panel
require_once locate_template('/lib/page-parents.php');            // Getting the parent nav items for a page
require_once locate_template('/lib/tinymce.php');                 // Customize the TinyMCE editor
require_once locate_template('/lib/event-type.php');              // Custom post type for events
require_once locate_template('/lib/person-type.php');             // Custom post type for people
require_once locate_template('/lib/date-formatting.php');         // Functions to format dates
require_once locate_template('/lib/taxonomies.php');              // Functions tfor custom taxonomies
require_once locate_template('/lib/event-ajax.php');              // AJAX handlers for events
require_once locate_template('/lib/shortcodes.php');              // Shortcode handlers
require_once locate_template('/lib/move-metaboxes.php');          // Move the default wordpress metaboxes
require_once locate_template('/lib/resource-tags.php');           // Resource tags
require_once locate_template('/lib/book-type.php');               // Custom post type for books
require_once locate_template('/lib/link-type.php');               // Custom post type for links
require_once locate_template('/lib/people-page.php');             // Function to retrieve the people page
require_once locate_template('/lib/email-general.php');           // Helper functions for emailing
require_once locate_template('/lib/email-subscription.php');      // Handlers for subscription
require_once locate_template('/lib/event-registration-rewrites.php');  // URL rewrites for event registration
require_once locate_template('/lib/event-registration.php');      // Handlers for event registration
require_once locate_template('/lib/subscription-type.php');       // Post type for newsletter subscriptions
require_once locate_template('/lib/registration-type.php');       // Post type for registrations
require_once locate_template('/lib/mail-wrapper.php');            // Wrapper for development mail debugging