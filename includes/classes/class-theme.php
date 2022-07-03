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

		// Include global scope Theme Functions.
		//include get_template_directory() . '/includes/functions-theme.php';
		//include get_template_directory() . '/includes/functions-geomashup.php';

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

}
