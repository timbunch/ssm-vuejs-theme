<?php
add_theme_support( 'post-thumbnails' );

// an image for the header of any page with a gallery
function featured_image($post)
{
	$featured_image = false;
	if (has_post_thumbnail()) {
		$post_thumbnail_id = get_post_thumbnail_id($post->ID);
		$featured_image = wp_get_attachment_url($post_thumbnail_id);
	}
	return $featured_image;
}

function get_the_featured_image($post_id)
{
	$featured_image = false;
	$post_thumbnail_id = get_post_thumbnail_id($post_id);
	if ($post_thumbnail_id) {
		$featured_image = wp_get_attachment_url($post_thumbnail_id);
	}
	return $featured_image;
}
