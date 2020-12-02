<?php
/**
 * Add required and recommended plugins.
 *
 * @package Eightydays Lite
 */

add_action( 'tgmpa_register', 'eightydays_lite_register_required_plugins' );

/**
 * Register required plugins
 *
 * @since  1.0
 */
function eightydays_lite_register_required_plugins() {
	$plugins = eightydays_lite_required_plugins();

	$config = array(
		'id'          => 'eightydays-lite',
		'has_notices' => false,
	);

	tgmpa( $plugins, $config );
}

/**
 * List of required plugins
 */
function eightydays_lite_required_plugins() {
	return array(
		array(
			'name' => esc_html__( 'Jetpack', 'eightydays-lite' ),
			'slug' => 'jetpack',
		),
		array(
			'name' => esc_html__( 'Slim SEO', 'eightydays-lite' ),
			'slug' => 'slim-seo',
		)
	);
}
