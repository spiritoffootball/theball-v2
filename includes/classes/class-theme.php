<?php
/**
 * The Ball v2 Theme Class.
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * The Ball v2 Theme Class.
 *
 * A class that encapsulates this theme's functionality.
 *
 * @since 1.0.1
 */
class The_Ball_v2_Theme {

	/**
	 * Suppress loop link flag.
	 *
	 * @since 1.0.2
	 * @access public
	 * @var bool $suppress_link True of loop links are suppressed, false otherwise.
	 */
	public $suppress_link = false;

	/**
	 * Initialises this object.
	 *
	 * @since 1.0.1
	 */
	public function __construct() {

		// Include files.
		$this->include_files();

		// Set up objects and references.
		$this->setup_objects();

		// Register hooks.
		$this->register_hooks();

		/**
		 * Broadcast that this instance is loaded.
		 *
		 * @since 1.0.1
		 */
		do_action( 'the_ball_v2/theme/loaded' );

	}

	/**
	 * Include files.
	 *
	 * @since 1.0.1
	 */
	public function include_files() {

		// Only do this once.
		static $done;
		if ( isset( $done ) && $done === true ) {
			return;
		}

		/*
		// Include global scope Theme Functions.
		include get_template_directory() . '/includes/functions-theme.php';
		include get_template_directory() . '/includes/functions-geomashup.php';
		*/

		// We're done.
		$done = true;

	}

	/**
	 * Set up this plugin's objects.
	 *
	 * @since 1.0.1
	 */
	public function setup_objects() {

		// Only do this once.
		static $done;
		if ( isset( $done ) && $done === true ) {
			return;
		}

		// We're done.
		$done = true;

	}

	/**
	 * Register WordPress hooks.
	 *
	 * @since 1.0.1
	 */
	public function register_hooks() {

	}

	/**
	 * Disable loop template(s) from showing "View Entity" links.
	 *
	 * @since 1.0.2
	 */
	public function loop_link_disable() {
		$this->suppress_link = true;
	}

	/**
	 * Enable loop template(s) to show "View Entity" links.
	 *
	 * @since 1.0.2
	 */
	public function loop_link_enable() {
		$this->suppress_link = false;
	}

	/**
	 * Check if loop template(s) should show "View Entity" links.
	 *
	 * @since 1.0.2
	 *
	 * @return bool $suppress_link True of loop links are suppressed, false otherwise.
	 */
	public function loop_shows_link() {
		return ! $this->suppress_link;
	}

}
