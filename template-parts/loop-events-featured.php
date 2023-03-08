<?php
/**
 * Template part for embedding a display of featured Events.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

global $sof_featured_events;
$sof_featured_events = false;

// Define query args.
$featured_events_args = [
	'post_type' => 'event',
	'post_status' => 'publish',
	'no_found_rows' => true,
	'tax_query' => [
		[
			'taxonomy' => 'event-type',
			'field'    => 'slug',
			'terms'    => 'featured',
		],
	],
];

// The query.
$featured_events = new WP_Query( $featured_events_args );

if ( $featured_events->have_posts() ) :

	$sof_featured_events = true;

	?>

	<!-- loop-events-featured.php -->
	<section id="events" class="content-area insert-area events-featured clear">
		<div class="events-inner clear">

			<header class="events-header">
				<!--<h2 class="events-title"><?php esc_html_e( 'Featured', 'the-ball-v2' ); ?></h2>-->
			</header><!-- .events-header -->

			<?php

			// Init counter for giving items classes.
			$post_loop_counter = new The_Ball_v2_Counter();

			// Start the loop.
			while ( $featured_events->have_posts() ) :

				$featured_events->the_post();

				// Get mini template.
				get_template_part( 'template-parts/content-event-featured' );

			endwhile;

			// Ditch counter.
			$post_loop_counter->remove_filter();
			unset( $post_loop_counter );

			?>

			<footer class="loop-insert-footer events-footer">
			</footer><!-- .events-footer -->

		</div><!-- .events-inner -->
	</section><!-- #events -->

	<?php

	// Prevent weirdness.
	wp_reset_postdata();

endif;
