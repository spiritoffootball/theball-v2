<?php
/**
 * Template part for embedding a display of Events other than the displayed Event.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Get current Event object.
$event = get_queried_object();

// Define query args.
$loop_include_args = [
	'post_type'        => 'event',
	'post_status'      => 'publish',
	'no_found_rows'    => true,
	'suppress_filters' => false,
	'post__not_in'     => [ $event->ID ],
];

// Newest Events first.
add_filter( 'posts_orderby', 'the_ball_v2_events_sort_desc', 20, 2 );

// The query.
$loop_include = new WP_Query( $loop_include_args );

// Clear sort order filter.
remove_filter( 'posts_orderby', 'the_ball_v2_events_sort_desc', 20 );

if ( $loop_include->have_posts() ) : ?>

	<!-- loop-events-other.php -->
	<section id="events-other" class="loop-include loop-include-three content-area clear">
		<div class="loop-include-inner">

			<header class="loop-include-header">
				<h2 class="loop-include-title"><?php esc_html_e( 'Other Events', 'theball-v2' ); ?></h2>
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
				<?php if ( the_ball_v2_theme()->loop_shows_link() ) : ?>
					<p><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'events' ) ) ); ?>" class="archive-link"><?php esc_html_e( 'View All Events', 'theball-v2' ); ?></a></p>
				<?php endif; ?>
			</footer><!-- .individuals-footer -->

		</div><!-- .loop-include-inner -->
	</section><!-- .loop-include -->

	<?php

endif;

// Prevent weirdness.
wp_reset_postdata();
unset( $loop_include_args, $loop_include );
