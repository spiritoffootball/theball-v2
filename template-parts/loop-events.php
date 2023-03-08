<?php
/**
 * Template part for embedding a display of Events.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Define query args.
$events_args = [
	'post_type' => 'event',
	'post_status' => 'publish',
	'no_found_rows' => true,
	'event_end_after' => 'now',
	'posts_per_page' => -1,
];

// The query.
$events = new WP_Query( $events_args );

if ( $events->have_posts() ) : ?>

	<!-- loop-events.php -->
	<section id="events" class="content-area insert-area clear">
		<div class="events-inner">

			<header class="events-header">
				<h2 class="events-title"><?php esc_html_e( 'Ongoing Events', 'the-ball-v2' ); ?></h2>
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

			<footer class="loop-insert-footer events-footer">
				<?php if ( the_ball_v2_theme()->loop_shows_link() ) : ?>
					<p><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'events' ) ) ); ?>" class="archive-link"><?php esc_html_e( 'View All Events', 'the-ball-v2' ); ?></a></p>
				<?php endif; ?>
			</footer><!-- .events-footer -->

		</div><!-- .events-inner -->
	</section><!-- #events -->

	<?php

	// Prevent weirdness.
	wp_reset_postdata();

endif;
