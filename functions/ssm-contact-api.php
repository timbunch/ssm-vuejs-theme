<?php

class SSM_WP_API_Contact
{
	public function __construct()
	{
		add_action('rest_api_init', [$this, 'route']);
	}

	function route()
	{
		register_rest_route('wp/v2', '/contact', array(
			'methods' => WP_REST_Server::EDITABLE,
			'callback' => [$this, 'set'],
			'permission_callback' => function () {
				return true;
			},
		));
	}

	function set($request)
	{
		$parameters = $request->get_params();

		foreach ($parameters as $id => $parameter) {
			$parameters[$id] = sanitize_text_field($parameter);
		}

		if (empty($parameters['security'])) {
			return new WP_REST_Response(['message' => 'No token provided'], 400);
		}

		wp_verify_nonce($parameters['security'], 'wp_rest');

		$headers = ['Content-Type: text/html; charset=UTF-8', 'From: ' . $parameters['name'] . ' <' . $parameters['email'] . '>'];
		$options = get_option('ssm_theme_options');
		$to = $options['contact_recipients'];
		if (!$to) {
			return false;
		}

		$response = wp_mail($to, $parameters['subject'], $parameters['message'], $headers);
		return new WP_REST_Response(['message' => 'Thank you', 'response' => $response], 200);
	}
}
