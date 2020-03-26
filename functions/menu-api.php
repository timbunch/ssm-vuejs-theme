<?php
/*
Plugin Name: SSM WP API Menu
Plugin URI: https://simplysmartmedia.com
Description: This plugin adds json menu endpoints at <code>/wp-json/wp/v2/menus</code>, <code>/wp-json/wp/v2/menus/{menu}</code>, <code>/wp-json/wp/v2/menus/theme-locations/</code> and <code>/wp-json/wp/v2/menus/theme-locations/{location}</code>.
Version: 1.0.0
Author: Tim Bunch
Author URI: https://simplysmartmedia.com
*/

class SSM_WP_API_Menu
{
	public function __construct()
	{
		add_action('rest_api_init', [$this, 'route']);
	}

	function route()
	{
		register_rest_route('wp/v2', '/menus', array(
			'methods' => 'GET',
			'callback' => [$this, 'menus'],
		));
		register_rest_route('wp/v2', '/menus/locations', array(
			'methods' => 'GET',
			'callback' => [$this, 'return_locations'],
		));
		register_rest_route('wp/v2', '/menus/(?P<menu>[a-zA-Z0-9-_]+)', array(
			'methods' => 'GET',
			'callback' => [$this, 'menus'],
		));
		register_rest_route('wp/v2', '/menus/locations/(?P<location>[a-zA-Z0-9-_]+)', array(
			'methods' => 'GET',
			'callback' => [$this, 'return_locations'],
		));
	}

	function menus($request)
	{
		$menu_names = get_terms('nav_menu');
		$menus = [];
		foreach ($menu_names as $menu) {
			$keys = explode(' ', strtolower($menu->name));
			foreach ($keys as $id=>$key) {
				$keys[$id] = $id !== 0 ? ucfirst($key) : $key;
			}
			$index = str_replace([' ', '-'], '_', implode('', $keys));
			$menus[$index] = $this->menu_by_name($menu->name);
		}

		$parameters = $request->get_params();
		if ($parameters && $parameters['menu']) {
			$menu = $parameters['menu'];
			if (empty($menus[$menu])) {
				$response = new WP_REST_Response(['message' => "$menu is not a valid menu name."]);
				$response->set_status(200);
				return $response;
			}
			$menus = $menus[$menu];
		}

		$response = new WP_REST_Response($menus);
		$response->set_status(200);
		return $response;
	}

	function menu_by_name($menu = 'primary-navigation')
	{
		$args = [];
		$menu_items = wp_get_nav_menu_items($menu, $args);
		if (!$menu_items) {
			return false;
		}
		return $this->menu($menu_items);
	}

	function menu($menu)
	{
		$menu_items = $this->filter_menu($menu);

		$new_menu = [];
		// a submenu
		foreach ($menu_items as $id => $m) {
			$m = (object)$m;
			if ($m->parent != 0) {
				continue;
			}
			$m->children = $this->menu_children($menu_items, $m->id);
			$new_menu[] = $m;
		}
		return $new_menu;
	}

	function filter_menu($menu)
	{
		return (object)array_map(
			function ($m) {
				return [
					'id' => (int)$m->ID,
					'attr_title' => $m->attr_title ?: false,
					'classes' => $this->filter_menu_classes($m->classes),
					'description' => $m->description ?: false,
					'target' => $m->target ?: false,
					'parent' => (int)$m->menu_item_parent,
					'rel' => $m->xfn ?: false,
					'title' => $m->title,
					'url' => $m->url,
					'parsedUrl' => parse_url($m->url),
				];
			},
			$menu);
	}

	function filter_menu_classes($classes)
	{
		$classes = implode(' ', $classes);
		return empty($classes) ? false : $classes;
	}

	function menu_children($menu, $id)
	{
		$sub_menu = [];
		foreach ($menu as $m) {
			$m = (object)$m;
			if ($m->parent === 0) {
				continue;
			}
			if ($id === $m->parent) {
				$m->children = $this->menu_children($menu, $m->id);
				$sub_menu[] = $m;
			}
		}
		return $sub_menu && $sub_menu[0]
			? (object)$sub_menu
			: false;
	}

	function return_locations($request, $location = false)
	{
		$menus = $this->menu_locations();

		$parameters = $request->get_params();
		if ($parameters && $parameters['location']) {
			$location = $parameters['location'];
			$menus = !empty($menus[$location])
				? $menus[$location]
				: ['message' => "$location is not a valid menu location."];
		}

		$response = new WP_REST_Response($menus);
		$response->set_status(200);
		return $response;
	}

	function menu_locations()
	{
		$locations = get_nav_menu_locations();

		$menus = [];
		foreach ($locations as $slug => $location) {
			$menu_obj = get_term($location, 'nav_menu');
			if ($menu_obj) {
				$menu = wp_get_nav_menu_items($menu_obj->term_id);
				$menus[$slug] = $this->menu($menu);
			}
		}

		return $menus;
	}
}

new SSM_WP_API_Menu();
