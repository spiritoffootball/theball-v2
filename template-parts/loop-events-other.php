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
$events_args = [
	'post_type' => 'event',
	'post_status' => 'publish',
	'no_found_rows' => true,
	'post__not_in' => [ $event->ID ],
];

// The query.
$events = new WP_Query( $events_args );

if ( $events->have_posts() ) : ?>

	<!-- loop-events-other.php -->
	<section id="blog-meta" class="content-area insert-area clear">
		<div class="blog-meta-inner">

			<div class="blog-meta-list">
				<header class="blog-meta-header">
					<h2 class="blog-meta-title"><?php esc_html_e( 'Other Events', 'the-ball-v2' ); ?></h2>
				</header><!-- .blog-meta-header -->

				<p>
					<?php

					// Init counter for giving items classes.
					$post_loop_counter = new The_Ball_v2_Counter();

					// Start the loop.
					while ( $events->have_posts() ) :

						$events->the_post();

						// Show link.
						?>
						<a href="<?php echo get_permalink(); ?>" class="term-link"><?php echo the_title(); ?></a>
						<?php

					endwhile;

					// Ditch counter.
					$post_loop_counter->remove_filter();
					unset( $post_loop_counter );

					?>

				</p>

			</div><!-- .blog-meta-list -->

			<footer class="loop-insert-footer news-footer">
				<p><a href="/events/" class="archive-link"><?php esc_html_e( 'View All Events', 'the-ball-v2' ); ?></a></p>
			</footer><!-- .news-footer -->

		</div><!-- .blog-meta-inner -->
	</section><!-- #blog-meta -->

	<?php

endif;

// Prevent weirdness.
wp_reset_postdata();
