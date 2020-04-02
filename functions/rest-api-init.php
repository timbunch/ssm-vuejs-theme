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

//	register_rest_field('page', 'contentSplit',
//		[
//			'get_callback' => function ($object) {
//				$content = str_replace(['\r', '\n', '\t'], '', apply_filters('the_content', get_the_content($object['id'])) );
//
//				$p = xml_parser_create();
//				xml_parse_into_struct($p, $content, $values, $index);
//				xml_parser_free($p);
//				return $values;
//			},
//			'update_callback' => null,
//			'schema' => null,
//		]
//	);
}
