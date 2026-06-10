<?php
/**
 * The Ball v2 GeoMashup Functions.
 *
 * @since 1.2.6
 *
 * @package The_Ball_v2_2026
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Get a link to the map if the current post has a location set.
 *
 * @since 1.2.6
 *
 * @return string $map_link The link to the map.
 */
function the_ball_v2_geomashup_map_link_get() {

	// Init.
	$map_link = '';

	// Bail if we do not have the plugin.
	if ( ! class_exists( 'GeoMashup' ) ) {
		return $map_link;
	}

	// Do we have the plugin and some coordinates?
	if ( GeoMashup::current_location( null, 'post' ) ) {
		$map_link = ' <a href="#geomashup-map">' . esc_html__( 'Jump to map', 'theball-v2' ) . '</a>';
	}

	// --<
	return $map_link;

}

/**
 * Show the map for a post.
 *
 * @since 1.2.6
 */
function the_ball_v2_geomashup_map_get() {

	// Bail if we do not have the plugin.
	if ( ! class_exists( 'GeoMashup' ) ) {
		return;
	}

	// Do we have some coordinates?
	if ( GeoMashup::current_location( null, 'post' ) ) {
		?>
		<div id="geomashup-map">
			<?php echo GeoMashup::map(); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>
		</div>
		<?php
	}

}
