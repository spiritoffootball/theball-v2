<?php
/**
 * Template part for embedding a display of Organisations.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Define query args.
$organisations_args = [
	'post_type' => 'organisation',
	'post_status' => 'publish',
	'order' => 'ASC',
	'orderby' => 'title',
];

// The query.
$organisations = new WP_Query( $organisations_args );

if ( $organisations->have_posts() ) : ?>

	<!-- loop-organisations.php -->
	<section id="organisations" class="content-area insert-area clear">
		<div class="organisations-inner">

			<header class="organisations-header">
				<h2 class="organisations-title"><?php esc_html_e( 'Organisations', 'the-ball-v2' ); ?></h2>
			</header><!-- .organisations-header -->

			<?php

			// Init counter for giving items classes.
			$post_loop_counter = new The_Ball_v2_Counter();

			// Start the loop.
			while ( $organisations->have_posts() ) :

				$organisations->the_post();

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

	// Prevent weirdness.
	wp_reset_postdata();

endif;
