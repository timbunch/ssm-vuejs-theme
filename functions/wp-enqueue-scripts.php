<?php
function ssm_enqueue_scripts()
{
		$src = get_stylesheet_directory_uri().'/app.js';
		wp_enqueue_script( 'ssm-scripts', $src, false, '', true);

		$front_page = get_post_field( 'post_name', get_post(get_site_option('page_on_front')));

		wp_localize_script('ssm-scripts', 'ssmSettings', array(
			'security' => wp_create_nonce('wp_rest'),
			'siteName' => get_site_option('blogname'),
			'siteDescription' => get_site_option('blogdescription'),
			'frontPage' => $front_page
		));
}

add_action( 'wp_enqueue_scripts', 'ssm_enqueue_scripts');
