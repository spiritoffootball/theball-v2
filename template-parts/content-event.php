<?php
/**
 * Template part for displaying an Event.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
<!-- content-event.php -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header"<?php the_ball_v2_feature_image_style(); ?>>
		<?php
		if ( is_single() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} else {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}
		?>
		<?php the_ball_v2_feature_image_caption(); ?>
	</header><!-- .entry-header -->

	<?php

	/**
	 * Fires the page submenu action.
	 *
	 * @since 1.0.0
	 */
	do_action( 'the_ball_v2_page_submenu' );

	?>

	<div class="entry-content">

		<div class="event-meta">

			<h3><?php esc_html_e( 'Event Details', 'the-ball-v2' ); ?></h3>

			<?php if ( eo_recurs() ) : ?>

				<!-- Event recurs - is there a next occurrence? -->
				<?php $next = eo_get_next_occurrence( eo_get_event_datetime_format() ); ?>

				<?php if ( $next ) : ?>

					<?php

					// If the event is occurring again in the future, display the date.
					printf(
						/* translators: 1: The schedule start, 2: The schedule end, 3: The next occurrence */
						'<p>' . esc_html__( 'This event is running from %1$s until %2$s. It is next occurring on %3$s', 'the-ball-v2' ) . '</p>',
						// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						eo_get_schedule_start( 'j F Y' ),
						// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						eo_get_schedule_last( 'j F Y' ),
						// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						$next
					); ?>

				<?php else : ?>

					<?php

					// Otherwise the event has finished - no more occurrences.
					printf(
						/* translators: 1: The schedule start, 2: The schedule end, 3: The next occurrence */
						'<p>' . esc_html__( 'This event finished on %s', 'the-ball-v2' ) . '</p>',
						// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						eo_get_schedule_last( 'd F Y', '' )
					);

					?>

				<?php endif; ?>

			<?php endif; ?>

			<ul class="event-meta">

				<?php if ( ! eo_recurs() ) : ?>
					<!-- Single event. -->
					<?php /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>
					<li><strong><?php esc_html_e( 'Date', 'the-ball-v2' ); ?>:</strong> <?php echo eo_format_event_occurrence(); ?></li>
				<?php endif; ?>

				<?php if ( eo_get_venue() ) : ?>
					<?php $event_venue = get_taxonomy( 'event-venue' ); ?>
					<li><strong><?php echo esc_html( $event_venue->labels->singular_name ); ?>:</strong> <a href="<?php eo_venue_link(); ?>"> <?php eo_venue_name(); ?></a></li>
				<?php endif; ?>

				<?php if ( get_the_terms( get_the_ID(), 'event-category' ) && ! is_wp_error( get_the_terms( get_the_ID(), 'event-category' ) ) ) : ?>
					<li><strong><?php esc_html_e( 'Categories', 'the-ball-v2' ); ?>:</strong> <?php echo get_the_term_list( get_the_ID(), 'event-category', '', ', ', '' ); ?></li>
				<?php endif; ?>

				<?php if ( get_the_terms( get_the_ID(), 'event-tag' ) && ! is_wp_error( get_the_terms( get_the_ID(), 'event-tag' ) ) ) : ?>
					<li><strong><?php esc_html_e( 'Tags', 'the-ball-v2' ); ?>:</strong> <?php echo get_the_term_list( get_the_ID(), 'event-tag', '', ', ', '' ); ?></li>
				<?php endif; ?>

				<?php

				if ( eo_recurs() ) {

					$args = [
						'post_type'         => 'event',
						'event_start_after' => 'today',
						'posts_per_page'    => -1,
						'event_series'      => get_the_ID(),
						'group_events_by'   => 'occurrence',
					];

					// Event recurs - display dates.
					$upcoming = new WP_Query( $args );

					if ( $upcoming->have_posts() ) {

						?>

						<li>
							<strong><?php esc_html_e( 'Upcoming Dates', 'the-ball-v2' ); ?>:</strong>
							<ul class="eo-upcoming-dates">
								<?php
								while ( $upcoming->have_posts() ) {
									$upcoming->the_post();
									// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
									echo '<li>' . eo_format_event_occurrence() . '</li>';
								};
								?>
							</ul>
						</li>

						<?php
						wp_reset_postdata();

						// With the ID 'eo-upcoming-dates', JS will hide all but the next 5 dates, with options to show more.
						wp_enqueue_script( 'eo_front' );

					}

				}

				?>

				<?php do_action( 'eventorganiser_additional_event_meta' ); ?>

			</ul>

			<div style="clear:both"></div>

			<?php if ( eo_get_venue() && eo_venue_has_latlng( eo_get_venue() ) ) : ?>
				<div class="event-venue-map">
					<?php

					$args = [
						'width'  => '100%',
						'height' => '300px',
					];

					// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo eo_get_venue_map( eo_get_venue(), $args );

					?>
				</div>
			<?php endif; ?>

			<div style="clear:both"></div>

		</div><!-- .entry-meta -->

		<div id="event-content">
			<?php

			the_content(
				sprintf(
				/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'the-ball-v2' ), [ 'span' => [ 'class' => [] ] ] ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				)
			);

			wp_link_pages(
				[
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'the-ball-v2' ),
					'after'  => '</div>',
				]
			);

			?>
		</div><!-- #event-content -->
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php

		/*
		// Events have their own 'event-category' taxonomy. Get list of categories this event is in.
		$categories_list = get_the_term_list( get_the_ID(), 'event-category', '', ', ','' );

		if ( '' !== $categories_list ) {
			$utility_text = __( 'This event was posted in %1$s by <a href="%3$s">%2$s</a>.', 'eventorganiser' );
		} else {
			$utility_text = __( 'This event was posted by <a href="%3$s">%2$s</a>.', 'eventorganiser' );
		}

		printf( $utility_text,
			$categories_list,
			get_the_author(),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
		);
		*/

		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-->
