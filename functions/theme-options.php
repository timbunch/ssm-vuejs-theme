<?php
add_action('admin_init', 'ssm_register_theme_options');

function ssm_register_theme_options()
{
	register_setting(
		'ssm_options',
		'ssm_theme_options',
		'ssm_theme_options_validate'
	);

	// Register our settings field group
	add_settings_section(
		'general',
		'General settings',
		'__return_false',
		'theme_options'
	);

	add_settings_field(
		'contact_recipients',
		'Contact recipients',
		'ssm_settings_field_input',
		'theme_options',
		'general',
		['id' => 'contact_recipients']
	);
}

add_action('admin_menu', 'ssm_insert_theme_options_page');

function ssm_insert_theme_options_page()
{
	add_theme_page(
		__('Options'),
		__('Theme Options'),
		'edit_theme_options',
		'theme_options',
		'ssm_theme_options_render_page'
	);
}

function ssm_theme_options_render_page()
{ ?>

    <h1>Options</h1>
	<?php settings_errors(); ?>

    <form method="post" action="options.php">
		<?php
		settings_fields('ssm_options');
		do_settings_sections('theme_options');
		submit_button();
		?>
    </form>
	<?php
}

/**
 * Renders the text input setting field.
 * @param $args
 */
function ssm_settings_field_input($args)
{
	$options = get_option('ssm_theme_options');
	if (isset($args['type'])) {
		$type = $args['type'];
	} else {
		$type = 'text';
	}
	?>
	<input type="<?php echo $type; ?>" name="ssm_theme_options[<?php echo $args['id']; ?>]"
		   id="<?php echo $args['id']; ?>" value="<?php echo esc_attr($options[$args['id']] ?? ''); ?>"/>
	<?php if (isset($args['desc'])) { ?>
	<label class="description" for="<?php echo $args['id']; ?>"><?php _e($args['desc'], 'pcomm'); ?></label>
<?php }
}
