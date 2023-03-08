<?php
/**
 * Template part for embedding a display of Pledge Quotes.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Define query args.
$pledges_args = [
	'post_type' => 'quote',
	'post_status' => 'publish',
	'order' => 'ASC',
	'orderby' => 'title',
	'tax_query' => [
		[
			'taxonomy' => 'quote-type',
			'field' => 'slug',
			'terms' => 'pledge',
		],
	],
];

// The query.
$pledges = new WP_Query( $pledges_args );

if ( $pledges->have_posts() ) :

	?>

	<!-- loop-quotes-pledges.php -->
	<section id="quotes-pledges" class="content-area insert-area clear">
		<div class="quotes-pledges-inner">

			<header class="quotes-pledges-header">
				<h2 class="quotes-pledges-title"><?php esc_html_e( 'Pledges', 'the-ball-v2' ); ?></h2>
			</header><!-- .quotes-pledges-header -->

			<div class="flexslider">
				<ul class="slides">

					<?php

					// Init counter for giving items classes.
					$post_loop_counter = new The_Ball_v2_Counter();

					// Start the loop.
					while ( $pledges->have_posts() ) :
						$pledges->the_post();

						?>

						<li>
							<?php get_template_part( 'template-parts/content-quote-pledge-mini' ); ?>
						</li>

						<?php

					endwhile;

					// Ditch counter.
					$post_loop_counter->remove_filter();
					unset( $post_loop_counter );

					?>

				</ul>
			</div><!-- .flexslider -->

		</div><!-- .quotes-pledges-inner -->
	</section><!-- #quotes-pledges -->

	<?php

	// Prevent weirdness.
	wp_reset_postdata();

endif;
