<?php

define('CACHE_DIRECTORY', get_template_directory() . '/cache/');

if (!file_exists(CACHE_DIRECTORY)) {
    mkdir(CACHE_DIRECTORY, 0775, true);
}