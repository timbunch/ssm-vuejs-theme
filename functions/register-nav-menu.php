<?php
add_action('after_setup_theme', 'register_ssm_menus');

function register_ssm_menus()
{
	register_nav_menu('primary', __('Primary Menu', 'simplysmartmedia'));
}
