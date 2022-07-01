<?php
/**
 * Counter Class.
 *
 * Adds classes to the posts shown in the "loop-" templates.
 *
 * @since 1.0.0
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * The Ball v2 Counter Class.
 *
 * Adds classes to the posts shown in the "loop-" templates.
 *
 * @since 1.0.0
 */
class The_Ball_v2_Counter {

	/**
	 * Counter.
	 *
	 * @since 1.0.0
	 * @access public
	 * @var int $num The item counter.
	 */
	public $num = 0;

	/**
	 * Mode.
	 *
	 * We sometimes want to distiguish between different contexts. For example,
	 * we may want to base certain display decisions on the current item count,
	 * but if the mode is set appropriately, we might override this behaviour.
	 *
	 * @since 1.0.0
	 * @access public
	 * @var int $mode The mode of this class - either 'basic' or 'header'.
	 */
	public $mode = 'basic';

	/**
	 * Title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @var int $title The title of the "parent" object being counted.
	 */
	public $title = '';

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 *
	 * @param str $mode Puts this class into different modes depending on context.
	 * @param str $title The title of the "parent" object being counted.
	 */
	public function __construct( $mode = 'basic', $title = '' ) {

		// Store params.
		$this->mode = $mode;
		$this->title = $title;

		// Return the mode via a filter.
		add_filter( 'the_ball_v2_counter_mode', [ $this, 'get_mode' ] );

		// Return the title via a filter.
		add_filter( 'the_ball_v2_counter_title', [ $this, 'get_title' ] );

		// Filter the post class.
		add_filter( 'post_class', [ $this, 'post_class' ] );

	}

	/**
	 * Get current value of the counter.
	 *
	 * @since 1.0.0
	 *
	 * @return int $num The current value of the counter.
	 */
	public function get_current() {

		// Return counter.
		return $this->num;

	}

	/**
	 * Get current mode.
	 *
	 * @since 1.0.0
	 *
	 * @param str $mode The default mode of this object.
	 * @return str $mode The mode of this object.
	 */
	public function get_mode( $mode ) {

		// Return mode.
		return $this->mode;

	}

	/**
	 * Get current title.
	 *
	 * @since 1.0.0
	 *
	 * @param str $title The default title.
	 * @return str $title The overridden title.
	 */
	public function get_title( $title ) {

		// Return title.
		return $this->title;

	}

	/**
	 * Remove filter.
	 *
	 * @since 1.0.0
	 */
	public function remove_filter() {

		// Remove filter.
		remove_filter( 'post_class', [ $this, 'post_class' ] );

	}

	/**
	 * Adds classes to the posts shown in the "loop-" templates.
	 *
	 * @since 1.0.0
	 *
	 * @param array $classes The existing post classes.
	 * @return array $classes The modified post classes.
	 */
	public function post_class( $classes ) {

		// Increment counter.
		$this->num++;

		// We need odds and evens.
		if ( $this->num & 1 ) {
			$classes[] = 'odd';
		} else {
			$classes[] = 'even';
		}

		// Every second plus one.
		if ( 0 === ( ( $this->num - 1 ) % 2 ) ) {
			$classes[] = 'even-plus-one';
		}

		// Every third.
		if ( 0 === ( $this->num % 3 ) ) {
			$classes[] = 'third';
		}

		// Every third plus one.
		if ( $this->num > 3 && ( 0 === ( ( $this->num - 1 ) % 3 ) ) ) {
			$classes[] = 'third-plus-one';
		}

		// All that are greater than third.
		if ( $this->num > 3 ) {
			$classes[] = 'more-than-third';
		}

		// Every fourth.
		if ( 0 === ( $this->num % 4 ) ) {
			$classes[] = 'fourth';
		}

		// --<
		return $classes;

	}

}
