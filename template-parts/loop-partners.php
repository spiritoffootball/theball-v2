<?php
/**
 * Template part for embedding a display of all Partners.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Define query args.
$partners_args = [
	'post_type' => 'partner',
	'post_status' => 'publish',
	'order' => 'ASC',
	'orderby' => 'title',
	'posts_per_page' => -1,
];

// The query.
$partners = new WP_Query( $partners_args );

if ( $partners->have_posts() ) : ?>

	<!-- loop-partners.php -->
	<section id="organisations" class="content-area insert-area clear">
		<div class="organisations-inner">

			<header class="organisations-header">
				<h2 class="organisations-title"><?php esc_html_e( 'Partners', 'the-ball-v2' ); ?></h2>
			</header><!-- .organisations-header -->

			<?php

			// Init counter for giving items classes.
			$post_loop_counter = new The_Ball_v2_Counter();

			// Start the loop.
			while ( $partners->have_posts() ) :

				$partners->the_post();

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
