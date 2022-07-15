<?php
/**
 * Template Name: Ball Hosts Archive
 *
 * The template for displaying the Ball Hosts archive page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

	<!-- page-host.php -->
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<section id="archive-header" class="content-area">
			<?php
			while ( have_posts() ) :

				the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>
		</section>

		<?php

		// Define query args.
		$hosts_args = [
			'post_type' => 'host',
			'post_status' => 'publish',
			'order' => 'ASC',
			'orderby' => 'title',
			'posts_per_page' => -1,
		];

		// Do the query.
		$hosts = new WP_Query( $hosts_args );

		if ( $hosts->have_posts() ) :
			?>

			<section class="organisation-list insert-area host-list clear">
				<div class="organisation-list-inner host-list-inner">
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
				</div>
			</section><!-- .host-list -->

			<?php

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'coming-soon' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_sidebar();
get_footer();
