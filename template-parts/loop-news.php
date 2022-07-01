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

// Define query args.
$news_args = [
	'post_type' => 'post',
	'post_status' => 'publish',
	'posts_per_page' => 3,
	'no_found_rows' => true,
];

// The query.
$news = new WP_Query( $news_args );

if ( $news->have_posts() ) : ?>

	<!-- loop-news.php -->
	<section id="news" class="content-area insert-area clear">
		<div class="news-inner">

			<header class="news-header">
				<h2 class="news-title"><?php esc_html_e( 'Latest News', 'the-ball-v2' ); ?></h2>
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
				<p><a href="<?php echo get_post_type_archive_link( 'post' ); ?>" class="archive-link"><?php esc_html_e( 'View All News', 'the-ball-v2' ); ?></a></p>
			</footer><!-- .news-footer -->

		</div><!-- .news-inner -->
	</section><!-- #news -->

	<?php

endif;

// Prevent weirdness.
wp_reset_postdata();
