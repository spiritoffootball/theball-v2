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
	 * @var bool
	 */
	public $suppress_link = false;

	/**
	 * Has Featured Events flag.
	 *
	 * @since 1.2.4
	 * @access public
	 * @var bool
	 */
	public $featured_events = false;

	/**
	 * Initialises this object.
	 *
	 * @since 1.0.1
	 */
	public function __construct() {

		// Only do this once.
		static $done;
		if ( isset( $done ) && true === $done ) {
			return;
		}

		// Bootstrap object.
		$this->include_files();
		$this->setup_objects();
		$this->register_hooks();

		/**
		 * Broadcast that this instance is loaded.
		 *
		 * @since 1.0.1
		 */
		do_action( 'the_ball_v2/theme/loaded' );

		// We're done.
		$done = true;

	}

	/**
	 * Include files.
	 *
	 * @since 1.0.1
	 */
	private function include_files() {

		/*
		// Include global scope Theme Functions.
		require get_template_directory() . '/includes/functions-theme.php';
		require get_template_directory() . '/includes/functions-geomashup.php';
		*/

	}

	/**
	 * Set up this plugin's objects.
	 *
	 * @since 1.0.1
	 */
	private function setup_objects() {

	}

	/**
	 * Register WordPress hooks.
	 *
	 * @since 1.0.1
	 */
	private function register_hooks() {

		// Set up this theme's defaults.
		add_action( 'after_setup_theme', [ $this, 'theme_setup' ] );

		// Remove the archive title prefix.
		add_filter( 'get_the_archive_title_prefix', [ $this, 'archive_title_prefix' ] );

	}

	/**
	 * Augment the Base Theme's setup function.
	 *
	 * @since 1.0.0
	 */
	public function theme_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 */
		load_theme_textdomain(
			'the-ball-v2',
			get_template_directory() . '/languages'
		);

	}

	/**
	 * Removes the archive title prefix.
	 *
	 * @since 1.2.3
	 *
	 * @param string $prefix Archive title prefix.
	 * @return string $prefix The modified archive title prefix.
	 */
	public function archive_title_prefix( $prefix ) {
		return '';
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

	/**
	 * Sets a "Has Featured Events" flag.
	 *
	 * @since 1.2.4
	 */
	public function featured_events_set() {
		$this->featured_events = true;
	}

	/**
	 * Enable loop template(s) to show "View Entity" links.
	 *
	 * @since 1.2.4
	 */
	public function featured_events_get() {
		return $this->featured_events;
	}

}
