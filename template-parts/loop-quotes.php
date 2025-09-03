<?php
/**
 * Template part for embedding a display of Quotes.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Define query args.
$quotes_args = [
	'post_type'   => 'quote',
	'post_status' => 'publish',
	'order'       => 'ASC',
	'orderby'     => 'title',
];

// The query.
$quotes = new WP_Query( $quotes_args );

if ( $quotes->have_posts() ) : ?>

	<!-- loop-quotes.php -->
	<section id="quotes" class="content-area insert-area clear">
		<div class="quotes-inner">

			<header class="quotes-header">
				<h2 class="quotes-title"><?php esc_html_e( 'Organisations', 'the-ball-v2' ); ?></h2>
			</header><!-- .quotes-header -->

			<?php

			// Init counter for giving items classes.
			$post_loop_counter = new The_Ball_v2_Counter();

			// Start the loop.
			while ( $quotes->have_posts() ) :

				$quotes->the_post();

				// Get mini template.
				get_template_part( 'template-parts/content-quote-mini' );

			endwhile;

			// Ditch counter.
			$post_loop_counter->remove_filter();
			unset( $post_loop_counter );

			?>

		</div><!-- .quotes-inner -->
	</section><!-- #quotes -->

	<?php

endif;

// Prevent weirdness.
wp_reset_postdata();
