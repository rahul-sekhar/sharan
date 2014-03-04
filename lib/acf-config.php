<?php

// Change the options page name to Navigation
if (function_exists('acf_set_options_page_title')) {
  acf_set_options_page_title('Navigation');
}

// Add a subpage for options called Navigation
if (function_exists('acf_add_options_sub_page')) {
  acf_add_options_sub_page('Navigation');
}