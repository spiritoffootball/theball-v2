<?php
/**
 * Template part for embedding a display of Individuals in The Backroom Staff.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Define query args.
$staff_args = [
	'post_type'      => 'individual',
	'post_status'    => 'publish',
	'order'          => 'ASC',
	'orderby'        => 'title',
	'posts_per_page' => -1,
	// phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
	'tax_query'      => [
		[
			'taxonomy' => 'individual-type',
			'field'    => 'slug',
			'terms'    => 'backroom-staff',
		],
	],
];

// Do the query.
$staff = new WP_Query( $staff_args );

if ( $staff->have_posts() ) : ?>

	<!-- loop-individuals-staff.php -->
	<section id="individuals-staff" class="content-area clear">
		<div class="individuals-inner">

			<header class="individuals-header">
				<h2 class="individuals-title"><?php esc_html_e( 'Backroom Staff', 'the-ball-v2' ); ?></h2>
			</header><!-- .individuals-header -->

			<div class="individuals-posts clear">
				<?php

				// Init counter for giving items classes.
				$post_loop_counter = new The_Ball_v2_Counter();

				// Start the loop.
				while ( $staff->have_posts() ) :

					$staff->the_post();

					// Get mini template.
					get_template_part( 'template-parts/content-individual-mini' );

				endwhile;

				// Ditch counter.
				$post_loop_counter->remove_filter();
				unset( $post_loop_counter );

				?>
			</div><!-- .individuals-posts -->

			<footer class="individuals-footer">
				<?php /* the_posts_navigation(); */ ?>
			</footer><!-- .individuals-footer -->

		</div><!-- .individuals-inner -->
	</section><!-- #individuals -->

	<?php

	// Prevent weirdness.
	wp_reset_postdata();

endif;

