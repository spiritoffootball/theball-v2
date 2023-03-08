<?php
/**
 * Template part for embedding a display of news items.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Get current Event object.
$event = get_queried_object();

// Define query args.
$args = [
	'post_type' => 'post',
	'post_status' => 'publish',
	'posts_per_page' => 3,
	'no_found_rows' => true,
	'tax_query' => [
		[
			'taxonomy' => 'event_posts',
			'field' => 'slug',
			'terms' => $event->post_name,
		],
	],
];

// The query.
$news = new WP_Query( $args );

if ( $news->have_posts() ) : ?>

	<!-- loop-news-by-event.php -->
	<section id="news" class="content-area insert-area news-by-event clear">
		<div class="news-inner">

			<header class="news-header">
				<h2 class="news-title"><?php echo sprintf( __( 'News about %s', 'the-ball-v2' ), $event->post_title ); ?></h2>
			</header><!-- .news-header -->

			<?php

			// Init counter for giving items classes.
			$post_loop_counter = new The_Ball_v2_Counter();

			// Start the loop.
			while ( $news->have_posts() ) :

				$news->the_post();

				// Get mini template.
				get_template_part( 'template-parts/content-news-mini' );

			endwhile;

			// Ditch counter.
			$post_loop_counter->remove_filter();
			unset( $post_loop_counter );

			?>

			<footer class="loop-insert-footer news-footer">
				<p><a href="<?php echo get_term_link( $event->post_name, 'event_posts' ); ?>" class="archive-link"><?php esc_html_e( 'View News', 'the-ball-v2' ); ?></a></p>
			</footer><!-- .news-footer -->

		</div><!-- .news-inner -->
	</section><!-- #news -->

	<?php

	// Prevent weirdness.
	wp_reset_postdata();

endif;
