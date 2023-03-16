<?php
/**
 * Template part for embedding a display of Individuals in The Squad.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Define query args.
$board_args = [
	'post_type' => 'individual',
	'post_status' => 'publish',
	'order' => 'ASC',
	'orderby' => 'title',
	'posts_per_page' => -1,
	'tax_query' => [
		[
			'taxonomy' => 'individual-type',
			'field' => 'slug',
			'terms' => 'advisory-board',
		],
	],
];

// Do the query.
$board = new WP_Query( $board_args );

if ( $board->have_posts() ) : ?>

	<!-- loop-individuals-board.php -->
	<section id="individuals-board" class="content-area clear">
		<div class="individuals-inner">

			<header class="individuals-header">
				<h2 class="individuals-title"><?php esc_html_e( 'Advisory Board', 'the-ball-v2' ); ?></h2>
			</header><!-- .individuals-header -->

			<div class="individuals-posts clear">
				<?php

				// Init counter for giving items classes.
				$post_loop_counter = new The_Ball_v2_Counter();

				// Start the loop.
				while ( $board->have_posts() ) :

					$board->the_post();

					// Get mini template.
					get_template_part( 'template-parts/content-individual-mini' );

				endwhile;

				// Ditch counter.
				$post_loop_counter->remove_filter();
				unset( $post_loop_counter );

				?>
			</div><!-- .individuals-posts -->

			<footer class="individuals-footer">
				<?php //the_posts_navigation(); ?>
			</footer><!-- .individuals-footer -->

		</div><!-- .individuals-inner -->
	</section><!-- #individuals -->

	<?php

	// Prevent weirdness.
	wp_reset_postdata();

endif;

