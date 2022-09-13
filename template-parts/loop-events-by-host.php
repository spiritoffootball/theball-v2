<?php
/**
 * Template part for embedding a display of Events that an Organisation has hosted.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Define query args.
$events_args = [
	'connected_type' => 'events_to_organisations',
	'connected_items' => get_queried_object(),
	'nopaging' => true,
	'no_found_rows' => true,
	'posts_per_page' => -1,
];

// The query.
$events = new WP_Query( $events_args );

if ( $events->have_posts() ) : ?>

	<!-- loop-events-by-host.php -->
	<section id="events" class="content-area insert-area events-by-host clear">
		<div class="events-inner">

			<header class="events-by-host-header">
				<h2 class="events-title"><?php esc_html_e( 'Hosted Events', 'the-ball-v2' ); ?></h2>
			</header><!-- .events-header -->

			<?php

			// Init counter for giving items classes.
			$post_loop_counter = new The_Ball_v2_Counter();

			// Start the loop.
			while ( $events->have_posts() ) :

				$events->the_post();

				// Get mini template.
				get_template_part( 'template-parts/content-event-mini' );

			endwhile;

			// Ditch counter.
			$post_loop_counter->remove_filter();
			unset( $post_loop_counter );

			?>

		</div><!-- .events-inner -->
	</section><!-- #events -->

	<?php

endif;

// Prevent weirdness.
wp_reset_postdata();
