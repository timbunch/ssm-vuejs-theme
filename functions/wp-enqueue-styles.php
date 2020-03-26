<?php

function ssm_enqueue_styles()
{
	$src = get_stylesheet_directory_uri() . '/dist/app.css';
	wp_enqueue_style('tab-styles', $src, false, '');
}

add_action('wp_enqueue_scripts', 'ssm_enqueue_styles', 10);
