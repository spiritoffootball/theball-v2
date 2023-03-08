<?php
/**
 * Template part for embedding a Teaser in the homepage.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Define query args.
$teaser_args = [
	'post_type' => 'page',
	'pagename' => 'homepage-teaser',
];

// Do the query.
$teasers = new WP_Query( $teaser_args );

if ( $teasers->have_posts() ) :
	?>

	<section id="teaser" name="teaser" class="teaser clear">
		<div class="teaser-inner">

			<?php

			// Init counter for giving items classes.
			$post_loop_counter = new The_Ball_v2_Counter();

			// Start the loop.
			while ( $teasers->have_posts() ) :

				$teasers->the_post();

				// Get mini template.
				get_template_part( 'template-parts/content-teaser-mini' );

			endwhile;

			// Ditch counter.
			$post_loop_counter->remove_filter();
			unset( $post_loop_counter );

			?>

		</div>
	</section><!-- .teaser-list -->

	<?php

	the_posts_navigation();

	// Prevent weirdness.
	wp_reset_postdata();

else :

	get_template_part( 'template-parts/content', 'coming-soon' );

endif;
