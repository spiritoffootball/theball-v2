<?php
/**
 * Template part for embedding a Pledgeball Single Pledge Form in an Event.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*
// Return if ACF is missing.
defined( 'ACF' ) || return;
*/

// Get enabled status from the ACF Field.
$pledge_form_enabled = get_field( 'pledge_form_enabled' );

// Get the Event.
$event = get_queried_object();

// Init attributes.
$attr = '';

// Build "event" attributes.
if ( ! empty( $event->ID ) ) {

	// Add Event ID.
	$attr = ' event="' . $event->ID . '"';

	// Maybe get ISO Country Code.
	$pledge_form_use_country = get_field( 'pledge_form_use_country' );
	if ( ! empty( $pledge_form_use_country ) && defined( 'SOF_PLEDGEBALL_VERSION' ) ) {
		$country_code = sof_pledgeball()->event->countrycode_get_by_event_id( $event->ID );
		if ( ! empty( $country_code ) ) {
			$attr .= ' country="' . $country_code . '"';
		}
	}

}

// The Pledge Form must be enabled and there must be an Event.
if ( ! empty( $pledge_form_enabled ) && ! empty( $attr ) ) : ?>

	<!-- form-pledge-single.php -->
	<section id="pledge" name="pledge" class="content-area insert-area pledge-form clear">
		<div class="pledge-inner">

			<header class="pledge-header">
				<h2 class="pledge-title"><?php esc_html_e( 'Make a Pledge', 'theball-v2' ); ?></h2>
			</header><!-- .pledge-header -->

			<?php echo do_shortcode( '[sof_pledgeball_pledge_form' . $attr . ']' ); ?>

			<footer class="loop-insert-footer pledge-footer">
			</footer><!-- .pledge-footer -->

		</div><!-- .pledge-inner -->
	</section><!-- #pledge -->

<?php endif; ?>
