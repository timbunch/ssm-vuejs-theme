<?php
add_action('rest_api_init', 'ssm_add_rest_fields');

function ssm_add_rest_fields()
{
	register_rest_field('page', 'featuredImage',
		[
			'get_callback' => function ($object) {
				return get_the_featured_image($object['id']);
			},
			'update_callback' => null,
			'schema' => null,
		]
	);
}
