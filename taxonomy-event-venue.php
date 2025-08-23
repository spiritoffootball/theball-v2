<?php
/**
 * The template for displaying Event Categories.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>
<!-- taxonomy-event-venue.php -->
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

	<?php if ( have_posts() ) : ?>

		<section id="archive-header" class="content-area">
			<article <?php post_class(); ?>>
				<header class="entry-header"<?php the_ball_v2_feature_image_style(); ?>>
					<?php $venue_id = get_queried_object_id(); ?>
					<h1 class="page-title">
						<?php /* translators: %s: The name of the venue. */ ?>
						<?php printf( esc_html__( 'Events at: %s', 'the-ball-v2' ), '<span>' . esc_html( eo_get_venue_name( $venue_id ) ) . '</span>' ); ?>
					</h1>

					<?php if ( $venue_description = eo_get_venue_description( $venue_id ) ) : ?>
						<?php /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>
						<div class="venue-archive-meta"><?php echo $venue_description; ?></div>
					<?php endif; ?>

					<?php
					// Display the venue map. If specifying a class, ensure that class has height/width dimensions.
					if ( eo_venue_has_latlng( $venue_id ) ) {
						$venue_map_args = [
							'width'  => '100%',
							'height' => '300px',
						];
						// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						echo eo_get_venue_map( $venue_id, $venue_map_args );
					}
					?>
				</header><!-- .entry-header -->
			</article><!-- #post-->
		</section>

		<section class="event-list insert-area clear">
			<div class="event-list-inner">
			<?php

			// Init counter for giving items classes.
			$post_loop_counter = new The_Ball_v2_Counter();

			// Start the loop.
			while ( have_posts() ) :

				the_post();

				// Get mini template.
				get_template_part( 'template-parts/content-event-mini' );

			endwhile;

			// Ditch counter.
			$post_loop_counter->remove_filter();
			unset( $post_loop_counter );

			?>
			</div>
		</section><!-- .event-list -->

		<footer class="archive-footer">
			<?php the_posts_navigation(); ?>
		</footer><!-- .archive-footer -->

	<?php else : ?>

		<?php get_template_part( 'template-parts/content', 'none' ); ?>

	<?php endif; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php

get_sidebar();
get_footer();
