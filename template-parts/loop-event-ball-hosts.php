<?php
/**
 * Template part for embedding a display of Ball Hosts on an Event page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Get current Event object.
$event = get_queried_object();

// Get the Ball Host Post IDs from the ACF Field.
$ball_host_ids = get_field( 'ball_hosts', $event->ID );

// Skip if there aren't any.
if ( ! empty( $ball_host_ids ) ) :

	// Define query args.
	$loop_include_args = [
		'post_type'     => 'host',
		'post_status'   => 'publish',
		'post__in'      => $ball_host_ids,
		'orderby'       => 'post__in',
		'nopaging'      => true,
		'no_found_rows' => true,
	];

	// The query.
	$loop_include = new WP_Query( $loop_include_args );

	if ( $loop_include->have_posts() ) : ?>

		<!-- loop-event-ball-hosts.php -->
		<section id="event-hosts" class="loop-include loop-include-flex loop-include-five content-area clear">
			<div class="loop-include-inner">

				<header class="loop-include-header">
					<h2 class="loop-include-title"><?php esc_html_e( 'Hosted By', 'theball-v2' ); ?></h2>
				</header><!-- .loop-include-header -->

				<div class="loop-include-posts">
					<?php

					// Start the loop.
					while ( $loop_include->have_posts() ) :

						$loop_include->the_post();

						// Get mini template.
						get_template_part( 'template-parts/content-organisation-logo' );

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
