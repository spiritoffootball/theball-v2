<?php
/**
 * Template part for embedding a display of Posts on an SDG page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Get current SDG object.
$sdg = get_queried_object();

// Get the Post IDs from the ACF Field.
$post_ids = get_field( 'applies_to', $sdg->ID );

// Skip if there aren't any.
if ( ! empty( $post_ids ) ) :

	// Define query args.
	$loop_include_args = [
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'post__in'       => $post_ids,
		'orderby'        => 'post__in',
		'nopaging'       => true,
		'no_found_rows'  => true,
		// TODO: Change to 12 and implement AJAX.
		'posts_per_page' => -1,
	];

	// The query.
	$loop_include = new WP_Query( $loop_include_args );

	if ( $loop_include->have_posts() ) : ?>

		<!-- loop-sdg-posts.php -->
		<section id="sdg-posts" class="loop-include loop-include-grid loop-include-three content-area clear">
			<div class="loop-include-inner">

				<header class="loop-include-header">
					<h2 class="loop-include-title"><?php esc_html_e( 'Linked Posts', 'theball-v2' ); ?></h2>
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
					<?php /* the_posts_navigation(); */ ?>
				</footer><!-- .loop-include-footer -->

			</div><!-- .loop-include-inner -->
		</section><!-- .loop-include -->

		<?php

	endif;

	// Prevent weirdness.
	wp_reset_postdata();
	unset( $loop_include_args, $loop_include );

endif;
