<?php
/**
 * The template for displaying the front page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

	<!-- front-page.php -->
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) :

				the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php

	/*
	if ( $featured_event_loop = locate_template( 'template-parts/loop-events-featured.php' ) ) : ?>
		<?php load_template( $featured_event_loop ); ?>
	<?php endif;
	*/

	?>

	<?php if ( $event_loop = locate_template( 'template-parts/loop-events.php' ) ) : ?>
		<?php load_template( $event_loop ); ?>
	<?php endif; ?>

	<?php if ( $news_loop = locate_template( 'template-parts/loop-news.php' ) ) : ?>
		<?php load_template( $news_loop ); ?>
	<?php endif; ?>

<?php

get_sidebar();
get_footer();
