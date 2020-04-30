<?php
add_action('init', 'register_ssm_home_page_hero');

function register_ssm_home_page_hero()
{
	$args = array(
		'public' => true,
		'label' => 'Home Page Hero',
		'show_in_rest' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'has_archive' => false,
		'supports' => ['title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments']
	);
	register_post_type('ssm-home-page-hero', $args);
}
