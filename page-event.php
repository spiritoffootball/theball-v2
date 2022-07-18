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

get_header(); ?>

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

			<?php

			// Define query args.
			$events_args = [
				'post_type' => 'event',
				'post_status' => 'publish',
				'posts_per_page' => -1,
			];

			// Do the query.
			$events = new WP_Query( $events_args );

			if ( $events->have_posts() ) :
				?>

				<section class="event-list insert-area clear">
					<div class="event-list-inner">
						<?php global $sof_featured_events; ?>
						<?php if ( $sof_featured_events === true ) : ?>
							<h2 class="events-title"><?php esc_html_e( 'Ongoing Events', 'the-ball-v2' ); ?></h2>
						<?php endif; ?>

						<?php

						// Init counter for giving items classes.
						$post_loop_counter = new The_Ball_v2_Counter();

						// Start the loop.
						while ( $events->have_posts() ) :

							$events->the_post();

							// Get mini template.
							get_template_part( 'template-parts/content-event-mini' );

						endwhile;

						// Ditch counter.
						$post_loop_counter->remove_filter();
						unset( $post_loop_counter );

						?>
					</div>
				</section><!-- .event-list -->

				<?php

				the_posts_navigation();

			else :

				get_template_part( 'template-parts/content', 'coming-soon' );

			endif;
			?>

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
