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
$loop_include_args = [
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
$loop_include = new WP_Query( $loop_include_args );

if ( $loop_include->have_posts() ) : ?>

	<!-- loop-individuals-staff.php -->
	<section id="individuals-staff" class="loop-include loop-include-four content-area clear">
		<div class="loop-include-inner">

			<header class="loop-include-header">
				<h2 class="loop-include-title"><?php esc_html_e( 'Backroom Staff', 'theball-v2' ); ?></h2>
			</header><!-- .loop-include-header -->

			<div class="loop-include-posts">
				<?php

				// Start the loop.
				while ( $loop_include->have_posts() ) :

					$loop_include->the_post();

					// Get mini template.
					get_template_part( 'template-parts/content-individual-mini' );

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

