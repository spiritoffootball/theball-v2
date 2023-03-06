<?php
/**
 * Template part for embedding a display of Statement Quotes.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Define query args.
$statements_args = [
	'post_type' => 'quote',
	'post_status' => 'publish',
	'order' => 'ASC',
	'orderby' => 'title',
	'tax_query' => [
		[
			'taxonomy' => 'quote-type',
			'field' => 'slug',
			'terms' => 'statement',
		],
	],
];

// The query.
$statements = new WP_Query( $statements_args );

if ( $statements->have_posts() ) :

	?>

	<!-- loop-quotes-statements.php -->
	<section id="quotes-statements" class="content-area insert-area clear">
		<div class="quotes-statements-inner">

			<header class="quotes-statements-header">
				<h2 class="quotes-statements-title"><?php esc_html_e( 'Statements', 'the-ball-v2' ); ?></h2>
			</header><!-- .quotes-statements-header -->

			<div class="flexslider">
				<ul class="slides">

					<?php

					// Init counter for giving items classes.
					$post_loop_counter = new The_Ball_v2_Counter();

					// Start the loop.
					while ( $statements->have_posts() ) :
						$statements->the_post();

						?>

						<li>
							<?php get_template_part( 'template-parts/content-quote-statement-mini' ); ?>
						</li>

						<?php

					endwhile;

					// Ditch counter.
					$post_loop_counter->remove_filter();
					unset( $post_loop_counter );

					?>

				</ul>
			</div><!-- .flexslider -->

		</div><!-- .quotes-statements-inner -->
	</section><!-- #quotes-statements -->

	<?php

endif;

// Prevent weirdness.
wp_reset_postdata();
