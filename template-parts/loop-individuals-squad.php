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
$squad_args = [
	'post_type' => 'individual',
	'post_status' => 'publish',
	'order' => 'ASC',
	'orderby' => 'title',
	'posts_per_page' => -1,
	'tax_query' => [
		[
			'taxonomy' => 'individual-type',
			'field' => 'slug',
			'terms' => 'the-squad',
		],
	],
];

// Do the query.
$squad = new WP_Query( $squad_args );

if ( $squad->have_posts() ) : ?>

	<!-- loop-individuals-squad.php -->
	<section id="individuals-squad" class="content-area clear">
		<div class="individuals-inner">

			<header class="individuals-header">
				<h2 class="individuals-title"><?php esc_html_e( 'The Squad', 'the-ball-v2' ); ?></h2>
				<div class="individuals-sub-title">
					<p><?php esc_html_e( 'On The Road With The Ball', 'the-ball-v2' ); ?></p>
				</div>
			</header><!-- .individuals-header -->

			<div class="individuals-posts clear">
				<?php

				// Init counter for giving items classes.
				$post_loop_counter = new The_Ball_v2_Counter();

				// Start the loop.
				while ( $squad->have_posts() ) :

					$squad->the_post();

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
