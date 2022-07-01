<?php
/**
 * Template Name: Organisations Archive
 *
 * The template for displaying the Organisations archive page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

	<!-- page-organisation.php -->
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
		$organisations_args = [
			'post_type' => 'organisation',
			'post_status' => 'publish',
			'order' => 'ASC',
			'orderby' => 'title',
		];

		// Do the query.
		$organisations = new WP_Query( $organisations_args );

		if ( is_user_logged_in() && $organisations->have_posts() ) :
			?>

			<section class="organisation-list clear">
				<div class="organisation-list-inner">
				<?php

				// Init counter for giving items classes.
				$post_loop_counter = new The_Ball_v2_Counter();

				// Start the loop.
				while ( $organisations->have_posts() ) :

					$organisations->the_post();

					// Get mini template.
					get_template_part( 'template-parts/content-organisation-mini' );

				endwhile;

				// Ditch counter.
				$post_loop_counter->remove_filter();
				unset( $post_loop_counter );

				?>
				</div>
			</section><!-- .organisation-list -->

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
