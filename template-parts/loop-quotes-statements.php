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
$loop_include_args = [
	'post_type'   => 'quote',
	'post_status' => 'publish',
	'order'       => 'ASC',
	'orderby'     => 'title',
	// phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
	'tax_query'   => [
		[
			'taxonomy' => 'quote-type',
			'field'    => 'slug',
			'terms'    => 'statement',
		],
	],
];

// The query.
$loop_include = new WP_Query( $loop_include_args );

if ( $loop_include->have_posts() ) : ?>

	<!-- loop-quotes-statements.php -->
	<section id="quotes-statements" class="content-area insert-area clear">
		<div class="quotes-statements-inner">

			<header class="quotes-statements-header">
				<h2 class="quotes-statements-title"><?php esc_html_e( 'Statements', 'theball-v2' ); ?></h2>
			</header><!-- .quotes-statements-header -->

			<div class="flexslider">
				<ul class="slides">
					<?php while ( $loop_include->have_posts() ) : ?>
						<?php $loop_include->the_post(); ?>
						<li><?php get_template_part( 'template-parts/content-quote-statement-mini' ); ?></li>
					<?php endwhile; ?>
				</ul>
			</div><!-- .flexslider -->

		</div><!-- .quotes-statements-inner -->
	</section><!-- #quotes-statements -->

	<?php

endif;

// Prevent weirdness.
wp_reset_postdata();
unset( $loop_include_args, $loop_include );
