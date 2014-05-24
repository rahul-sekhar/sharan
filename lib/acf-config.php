<?php

if (function_exists('acf_set_options_page_title')) {
  acf_set_options_page_title('Options');
}

if (function_exists('acf_add_options_sub_page')) {
  acf_add_options_sub_page('Home page');
  acf_add_options_sub_page('Slideshow');
  acf_add_options_sub_page('Navigation');
  acf_add_options_sub_page('Default Sidebar Images');
  acf_add_options_sub_page('Events');
  acf_add_options_sub_page('Resources');
  acf_add_options_sub_page('Consultation');
  acf_add_options_sub_page('Registration');
  acf_add_options_sub_page('Gallery');
  acf_add_options_sub_page('Sidebar and Footer Links');
  acf_add_options_sub_page('Email');
}