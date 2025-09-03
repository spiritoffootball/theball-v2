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

// Define query args.
$loop_include_args = [
	'post_type'     => 'event',
	'post_status'   => 'publish',
	'no_found_rows' => true,
	// phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
	'tax_query'     => [
		[
			'taxonomy' => 'event-type',
			'field'    => 'slug',
			'terms'    => 'featured',
		],
	],
];

// The query.
$loop_include = new WP_Query( $loop_include_args );

if ( $loop_include->have_posts() ) : ?>

	<?php the_ball_v2_theme()->featured_events_set(); ?>

	<!-- loop-events-featured.php -->
	<section id="events-featured" class="loop-include loop-include-one content-area clear">
		<div class="loop-include-inner">

			<header class="loop-include-header">
				<h2 class="loop-include-title"><?php esc_html_e( 'Featured Events', 'the-ball-v2' ); ?></h2>
			</header><!-- .loop-include-header -->

			<div class="loop-include-posts">
				<?php

				// Start the loop.
				while ( $loop_include->have_posts() ) :

					$loop_include->the_post();

					// Get mini template.
					get_template_part( 'template-parts/content-event-featured' );

				endwhile;

				?>
			</div><!-- .loop-include-posts -->

		</div><!-- .loop-include-inner -->
	</section><!-- .loop-include -->

	<?php

endif;

// Prevent weirdness.
wp_reset_postdata();
unset( $loop_include_args, $loop_include );
