<?php

function ssm_enqueue_styles()
{
	$src = get_stylesheet_directory_uri() . '/dist/app.css';
	wp_enqueue_style('theme-styles', $src, false, '');
	$src = "https://fonts.googleapis.com/css?family=Material+Icons";
	wp_enqueue_style('material-icons', $src, false, '');
}

add_action('wp_enqueue_scripts', 'ssm_enqueue_styles', 10);
