<?php
/**
 * Template part for embedding a display of all Awards.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Define query args.
$awards_args = [
	'post_type'      => 'award',
	'post_status'    => 'publish',
	'order'          => 'ASC',
	'orderby'        => 'title',
	'posts_per_page' => -1,
];

// The query.
$awards = new WP_Query( $awards_args );

if ( $awards->have_posts() ) : ?>

	<!-- loop-awards.php -->
	<section id="awards" class="content-area insert-area clear">
		<div class="awards-inner">

			<header class="awards-header">
				<h2 class="awards-title"><?php esc_html_e( 'Awards', 'the-ball-v2' ); ?></h2>
			</header><!-- .awards-header -->

			<?php

			// Init counter for giving items classes.
			$post_loop_counter = new The_Ball_v2_Counter();

			// Start the loop.
			while ( $awards->have_posts() ) :

				$awards->the_post();

				// Get mini template.
				get_template_part( 'template-parts/content-award-mini' );

			endwhile;

			// Ditch counter.
			$post_loop_counter->remove_filter();
			unset( $post_loop_counter );

			?>

		</div><!-- .awards-inner -->
	</section><!-- #awards -->

	<?php

	// Prevent weirdness.
	wp_reset_postdata();

endif;
