<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Enable unfiltered_html capability for Editors.
 *
 * @since 1.0.0
 *
 * @param  array  $caps    The user's capabilities.
 * @param  string $cap     Capability name.
 * @param  int    $user_id The user ID.
 * @return array  $caps    The user's capabilities, with 'unfiltered_html' potentially added.
 */
function the_ball_v2_add_unfiltered_html_capability_to_editors( $caps, $cap, $user_id ) {

	if ( 'unfiltered_html' === $cap && user_can( $user_id, 'editor' ) ) {
		$caps = [ 'unfiltered_html' ];
	}

	return $caps;

}

// Add capabilities filter.
add_filter( 'map_meta_cap', 'the_ball_v2_add_unfiltered_html_capability_to_editors', 1, 3 );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since 1.0.0
 *
 * @param array $classes Classes for the body element.
 * @return array $classes The modified array of body classes.
 */
function the_ball_v2_body_classes( $classes ) {

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;

}

// Add body class filter.
add_filter( 'body_class', 'the_ball_v2_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 *
 * @since 1.0.0
 */
function the_ball_v2_pingback_header() {

	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}

}

// Add pingback url.
add_action( 'wp_head', 'the_ball_v2_pingback_header' );

/**
 * Removes post-thumbnail classes when on search archive.
 *
 * @since 1.0.0
 *
 * @param array $classes The existing post classes.
 * @return array $classes The modified post classes.
 */
function the_ball_v2_post_class( $classes ) {

	// Bail if not search.
	if ( ! is_search() ) {
		return $classes;
	}

	// Find key for class name.
	$key = array_search( 'has-post-thumbnail', $classes, true );

	// Delete it if it's found.
	if ( false !== $key ) {
		unset( $classes[ $key ] );
	}

	// --<
	return $classes;

}

// Add post class filter.
add_filter( 'post_class', 'the_ball_v2_post_class' );

/**
 * Utility to define length of excerpt.
 *
 * @since 1.0.0
 *
 * @return int $length The length of the excerpt in words.
 */
function the_ball_v2_excerpt_length() {

	// --<
	return 40;

}

// Add excerpt length filter.
add_filter( 'excerpt_length', 'the_ball_v2_excerpt_length' );

/**
 * Adds a custom "Read more" to excerpts.
 *
 * @since 1.0.0
 *
 * @param string $more The existing more string (defaults to ellipsis).
 * @return string $more The modified more string.
 */
function the_ball_v2_excerpt_more( $more ) {

	// Override with custom text.
	return '... ' . sprintf(
		'<a class="read-more" href="%1$s">[%2$s]</a>',
		esc_url( get_permalink( get_the_ID() ) ),
		esc_html__( 'Read more', 'theball-v2' )
	);

}

// Add excerpt filter.
add_filter( 'excerpt_more', 'the_ball_v2_excerpt_more' );

/**
 * Add search form to site header.
 *
 * @since 1.0.0
 */
function the_ball_v2_add_search_box() {

	// Show a trigger.
	echo '<a href="#the-ball-v2-search" class="the-ball-v2-search-trigger">' . esc_html__( 'Search', 'theball-v2' ) . '</a>';

	// Show wrapped search form.
	echo '<div role="dialog" aria-labelledby="dialogTitle" aria-describedby="dialogDescription" id="the-ball-v2-search">' .
		'<h2>' . esc_html__( 'Search this website', 'theball-v2' ) . '</h2>' .
		get_search_form( false ) .
	'</div>';

}

// Add action for adding search form to site header.
add_action( 'the_ball_v2_before_nav', 'the_ball_v2_add_search_box', 20 );

/**
 * Do not show content in GeoMashup map popups.
 *
 * @since 1.0.0
 */
function the_ball_v2_wpcv_eo_maps_info_window_content() {
	return false;
}

/*
// Add filter for content in GeoMashup map popups.
add_filter( 'wpcv_eo_maps/info_window/content', 'the_ball_v2_wpcv_eo_maps_info_window_content' );
*/

/**
 * Override Pledgeball scroll element.
 *
 * @since 1.0.0
 *
 * @param array $vars The Javascript variables passed to the script.
 * @return array $vars The modified Javascript variables passed to the script.
 */
function the_ball_v2_pledgeball_scroll_element( $vars ) {

	// Assign container.
	$vars['settings']['scrollto'] = '#pledge';

	// --<
	return $vars;

}

// Add filter for Pledgeball scroll element.
add_filter( 'sof_pledgeball/form/pledge_submit/scripts/vars', 'the_ball_v2_pledgeball_scroll_element' );

/**
 * Pre-render inserts to generate page menu.
 *
 * @since 1.0.0
 */
function the_ball_v2_page_submenu() {

	// Get current Event object.
	$event = get_queried_object();

	// Bail if we don't get one.
	if ( empty( $event ) ) {
		return;
	}

	// Init menu with link to Event content.
	$menu = [
		'<li><a href="#event-content">' . esc_html__( 'About this Event', 'theball-v2' ) . '</a></li>',
	];

	// Get the Ball Host Post IDs from the ACF Field.
	$ball_host_ids = get_field( 'ball_hosts' );

	// Add menu item if there are some.
	if ( ! empty( $ball_host_ids ) ) {
		$menu[] = '<li><a href="#event-hosts">' . esc_html__( 'Hosts', 'theball-v2' ) . '</a></li>';
	}

	// Get enabled status from the ACF Field.
	$pledge_form_enabled = get_field( 'pledge_form_enabled' );
	if ( ! empty( $pledge_form_enabled ) ) {
		$menu[] = '<li><a href="#pledge">' . esc_html__( 'Make a Pledge', 'theball-v2' ) . '</a></li>';
	}

	/*
	// Define query args.
	$args = [
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => 3,
		'no_found_rows' => true,
		'tax_query' => [
			[
				'taxonomy' => 'event_posts',
				'field' => 'slug',
				'terms' => $event->post_name,
			],
		],
	];

	// The query.
	$news = new WP_Query( $args );
	if ( $news->have_posts() ) :
		$menu[] = '<li><a href="#news">' . __( 'News', 'theball-v2' ) . '</a></li>';
	endif;

	// Prevent weirdness.
	wp_reset_postdata();
	*/

	// Show menu.
	echo '<div class="the-ball-v2-page-menu">' . "\n";
	echo '<ul>' . "\n";
	echo implode( '', $menu ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo '</ul>' . "\n";
	echo '</div>' . "\n";

	// Add jQuery Scroll-To plugin.
	wp_enqueue_script(
		'the_ball_v2_scrollto',
		get_template_directory_uri() . '/assets/js/jquery.scrollTo.min.js',
		[ 'jquery' ],
		THE_BALL_V2_THEME_VERSION, // Version.
		true // In footer.
	);

}

// Add action for page menu.
add_action( 'the_ball_v2_page_submenu', 'the_ball_v2_page_submenu' );
