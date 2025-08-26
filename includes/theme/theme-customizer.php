<?php
/**
 * The Ball v2 Theme Customizer.
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Adds postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 *
 * @since 1.0.0
 */
function the_ball_v2_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			[
				'selector'        => '.site-title a',
				'render_callback' => 'the_ball_v2_customize_partial_blogname',
			]
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			[
				'selector'        => '.site-description',
				'render_callback' => 'the_ball_v2_customize_partial_blogdescription',
			]
		);
	}
}

add_action( 'customize_register', 'the_ball_v2_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since 1.0.0
 */
function the_ball_v2_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since 1.0.0
 */
function the_ball_v2_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since 1.0.0
 */
function the_ball_v2_customize_preview_js() {

	wp_enqueue_script(
		'the_ball_v2_customizer',
		get_template_directory_uri() . '/js/customizer.js',
		[ 'customize-preview' ],
		THE_BALL_V2_THEME_VERSION,
		true
	);

}

add_action( 'customize_preview_init', 'the_ball_v2_customize_preview_js' );
