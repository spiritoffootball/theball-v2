<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.com/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Jetpack setup function.
 *
 * @since 1.0.0
 *
 * @see https://jetpack.com/support/infinite-scroll/
 * @see https://jetpack.com/support/responsive-videos/
 * @see https://jetpack.com/support/content-options/
 */
function the_ball_v2_jetpack_setup() {

	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', [
		'container' => 'main',
		'render'    => 'the_ball_v2_infinite_scroll_render',
		'footer'    => 'page',
	] );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );

	// Add theme support for Content Options.
	add_theme_support( 'jetpack-content-options', [
		'post-details' => [
			'stylesheet' => 'theball-v2-style',
			'date'       => '.posted-on',
			'categories' => '.cat-links',
			'tags'       => '.tags-links',
			'author'     => '.byline',
			'comment'    => '.comments-link',
		],
		'featured-images' => [
			'archive' => true,
			'post'    => true,
			'page'    => true,
		],
	] );

}

add_action( 'after_setup_theme', 'the_ball_v2_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 *
 * @since 1.0.0
 */
function the_ball_v2_infinite_scroll_render() {

	while ( have_posts() ) {
		the_post();
		if ( is_search() ) :
			get_template_part( 'template-parts/content', 'search' );
		else :
			get_template_part( 'template-parts/content', get_post_type() );
		endif;
	}

}
