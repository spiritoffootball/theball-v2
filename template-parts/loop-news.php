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
$loop_include_args = [
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'posts_per_page' => 3,
	'no_found_rows'  => true,
];

// The query.
$loop_include = new WP_Query( $loop_include_args );

if ( $loop_include->have_posts() ) : ?>

	<!-- loop-news.php -->
	<section id="news" class="loop-include loop-include-three content-area clear">
		<div class="loop-include-inner">

			<header class="loop-include-header">
				<h2 class="loop-include-title"><?php esc_html_e( 'Latest News', 'theball-v2' ); ?></h2>
			</header><!-- .loop-include-header -->

			<div class="loop-include-posts">
				<?php

				// Start the loop.
				while ( $loop_include->have_posts() ) :

					$loop_include->the_post();

					// Get mini template.
					get_template_part( 'template-parts/content-post-mini' );

				endwhile;

				?>
			</div><!-- .loop-include-posts -->

			<footer class="loop-include-footer">
				<p><a href="<?php echo esc_url( get_post_type_archive_link( 'post' ) ); ?>" class="archive-link"><?php esc_html_e( 'View All News', 'theball-v2' ); ?></a></p>
			</footer><!-- .loop-include-footer -->

		</div><!-- .loop-include-inner -->
	</section><!-- .loop-include -->

	<?php

endif;

// Prevent weirdness.
wp_reset_postdata();
unset( $loop_include_args, $loop_include );
