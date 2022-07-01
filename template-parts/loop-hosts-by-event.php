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

// Get the Ball Host Post IDs from the ACF Field.
$ball_host_ids = get_field( 'ball_hosts' );

// Skip if there aren't any.
if ( ! empty( $ball_host_ids ) ) :

	// Define query args.
	$ball_hosts_args = [
		'include' => $ball_host_ids,
		'post_type' => 'host',
		'post_status' => 'publish',
		'nopaging' => true,
		'no_found_rows' => true,
	];

	// The query.
	$ball_hosts = new WP_Query( $ball_hosts_args );

	if ( $ball_hosts->have_posts() ) : ?>

		<!-- loop-hosts-by-event.php -->
		<section id="organisations" class="content-area insert-area hosts-by-event clear">
			<div class="organisations-inner">

				<header class="organisations-header">
					<h2 class="organisations-title"><?php esc_html_e( 'Hosted By', 'the-ball-v2' ); ?></h2>
				</header><!-- .organisations-header -->

				<?php

				// Init counter for giving items classes.
				$post_loop_counter = new The_Ball_v2_Counter();

				// Start the loop.
				while ( $ball_hosts->have_posts() ) :

					$ball_hosts->the_post();

					// Get mini template.
					get_template_part( 'template-parts/content-organisation-mini' );

				endwhile;

				// Ditch counter.
				$post_loop_counter->remove_filter();
				unset( $post_loop_counter );

				?>

			</div><!-- .organisations-inner -->
		</section><!-- #organisations -->

		<?php

	endif;

	// Prevent weirdness.
	wp_reset_postdata();

endif;
