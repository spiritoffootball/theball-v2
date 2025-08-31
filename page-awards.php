<?php
/**
 * Template Name: Awards Archive
 *
 * The template for displaying the Awards archive page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>
<!-- page-awards.php -->
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
	$awards_args = [
		'post_type'      => 'award',
		'post_status'    => 'publish',
		'order'          => 'ASC',
		'orderby'        => 'title',
		'posts_per_page' => -1,
	];

	// Do the query.
	$awards = new WP_Query( $awards_args );

	if ( $awards->have_posts() ) :
		?>

		<section class="organisation-list insert-area award-list clear">
			<div class="organisation-list-inner award-list-inner">
			<?php

			// Init counter for giving items classes.
			$post_loop_counter = new The_Ball_v2_Counter();

			// Start the loop.
			while ( $awards->have_posts() ) :

				$awards->the_post();

				// Get logo template.
				get_template_part( 'template-parts/content-award-mini' );

			endwhile;

			// Ditch counter.
			$post_loop_counter->remove_filter();
			unset( $post_loop_counter );

			?>
			</div>
		</section><!-- .award-list -->

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
