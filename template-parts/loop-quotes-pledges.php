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
			'terms'    => 'pledge',
		],
	],
];

// The query.
$loop_include = new WP_Query( $loop_include_args );

if ( $loop_include->have_posts() ) : ?>

	<!-- loop-quotes-pledges.php -->
	<section id="quotes-pledges" class="content-area insert-area clear">
		<div class="quotes-pledges-inner">

			<header class="quotes-pledges-header">
				<h2 class="quotes-pledges-title"><?php esc_html_e( 'Pledges', 'theball-v2' ); ?></h2>
			</header><!-- .quotes-pledges-header -->

			<div class="flexslider">
				<ul class="slides">
					<?php while ( $loop_include->have_posts() ) : ?>
						<?php $loop_include->the_post(); ?>
						<li><?php get_template_part( 'template-parts/content-quote-pledge-mini' ); ?></li>
					<?php endwhile; ?>
				</ul>
			</div><!-- .flexslider -->

		</div><!-- .quotes-pledges-inner -->
	</section><!-- #quotes-pledges -->

	<?php

endif;

// Prevent weirdness.
wp_reset_postdata();
unset( $loop_include_args, $loop_include );
