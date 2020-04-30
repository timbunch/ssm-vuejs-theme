<?php
define ('MIX_MANIFEST', (array)json_decode(file_get_contents(get_stylesheet_directory() . "/mix-manifest.json")));

require 'functions/content-filter.php';
require 'functions/disable-admin-bar.php';
require 'functions/featured-image.php';
# require 'functions/ga.php';
require 'functions/menu-api.php';
require 'functions/meta-description.php';
require 'functions/meta-title.php';
require 'functions/register-home-page-hero-cpt.php';
require 'functions/register-nav-menu.php';
require 'functions/rest-api-init.php';
require 'functions/wp-enqueue-scripts.php';
require 'functions/wp-enqueue-styles.php';
require 'functions/wp-head.php';

add_theme_support( 'post-thumbnails' );
