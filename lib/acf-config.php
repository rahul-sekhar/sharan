<?php

if (function_exists('acf_set_options_page_title')) {
  acf_set_options_page_title('Options');
}

if (function_exists('acf_add_options_sub_page')) {
  acf_add_options_sub_page('General');
  acf_add_options_sub_page('Home page');
  acf_add_options_sub_page('Slideshow');
  acf_add_options_sub_page('Navigation');
  acf_add_options_sub_page('Sidebar and Footer Links');
}