<?php
/**
 * Template Name: Events Archive
 *
 * The template for displaying the Events archive page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>
<!-- page-event.php -->
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

		<?php if ( $featured_event_loop = locate_template( 'template-parts/loop-events-featured.php' ) ) : ?>
			<?php load_template( $featured_event_loop ); ?>
		<?php endif; ?>

		<?php if ( $event_loop = locate_template( 'template-parts/loop-events-ongoing.php' ) ) : ?>
			<?php the_ball_v2_theme()->loop_link_disable(); ?>
			<?php load_template( $event_loop ); ?>
			<?php the_ball_v2_theme()->loop_link_enable(); ?>
		<?php endif; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php if ( $past_loop = locate_template( 'template-parts/loop-events-past.php' ) ) : ?>
	<?php the_ball_v2_theme()->loop_link_disable(); ?>
	<?php load_template( $past_loop ); ?>
	<?php the_ball_v2_theme()->loop_link_enable(); ?>
<?php endif; ?>

<?php

get_sidebar();
get_footer();
