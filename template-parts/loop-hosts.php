<?php
/**
 * Template part for embedding a display of Hosts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Define query args.
$hosts_args = [
	'post_type' => 'host',
	'post_status' => 'publish',
	'order' => 'ASC',
	'orderby' => 'title',
];

// The query.
$hosts = new WP_Query( $hosts_args );

if ( $hosts->have_posts() ) : ?>

	<!-- loop-hosts.php -->
	<section id="organisations" class="content-area insert-area clear">
		<div class="organisations-inner">

			<header class="organisations-header">
				<h2 class="organisations-title"><?php esc_html_e( 'Ball Hosts', 'the-ball-v2' ); ?></h2>
			</header><!-- .organisations-header -->

			<?php

			// Init counter for giving items classes.
			$post_loop_counter = new The_Ball_v2_Counter();

			// Start the loop.
			while ( $hosts->have_posts() ) :

				$hosts->the_post();

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
