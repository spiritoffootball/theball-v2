<?php
/**
 * Template part for embedding a display of Hosts on an Event page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Get current Event object.
$host = get_queried_object();

// Get the Event Post IDs from the ACF Field.
$event_ids = get_field( 'hosted_events', $host->ID );

// Skip if there aren't any.
if ( ! empty( $event_ids ) ) :

	// Define query args.
	$loop_include_args = [
		'post_type'        => 'event',
		'post_status'      => 'publish',
		'no_found_rows'    => true,
		'suppress_filters' => false,
		'showpastevents'   => true,
		'group_events_by'  => 'series',
		'post__in'         => $event_ids,
		'posts_per_page'   => -1,
	];

	// Newest Events first.
	add_filter( 'posts_orderby', 'the_ball_v2_events_sort_desc', 20, 2 );

	// The query.
	$loop_include = new WP_Query( $loop_include_args );

	// Clear sort order filter.
	remove_filter( 'posts_orderby', 'the_ball_v2_events_sort_desc', 20 );

	if ( $loop_include->have_posts() ) : ?>

		<!-- loop-event-acf-hosted-by.php -->
		<section id="events-past" class="loop-include loop-include-grid loop-include-three content-area clear">
			<div class="loop-include-inner">

				<header class="loop-include-header">
					<h2 class="loop-include-title"><?php esc_html_e( 'Hosted Events', 'theball-v2' ); ?></h2>
				</header><!-- .loop-include-header -->

				<div class="loop-include-posts">
					<?php

					// Start the loop.
					while ( $loop_include->have_posts() ) :

						$loop_include->the_post();

						// Get mini template.
						get_template_part( 'template-parts/content-event-mini' );

					endwhile;

					?>
				</div><!-- .loop-include-posts -->

				<footer class="loop-include-footer">
					<?php /* the_posts_navigation(); */ ?>
				</footer><!-- .loop-include-footer -->

			</div><!-- .loop-include-inner -->
		</section><!-- .loop-include -->

		<?php

	endif;

	// Prevent weirdness.
	wp_reset_postdata();
	unset( $loop_include_args, $loop_include );

endif;
