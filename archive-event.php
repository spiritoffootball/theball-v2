<?php
/**
 * The template for displaying the Events archive.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>
<!-- archive-event.php -->
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

			<section id="archive" class="content-area has-post-thumbnail clear">

				<header class="entry-header"<?php the_ball_v2_feature_image_style(); ?>>
					<h2 class="entry-title"><?php esc_html_e( 'Events', 'theball-v2' ); ?></h2>
				</header><!-- .entry-header -->

				<?php if ( have_posts() ) : ?>

					<section id="archive-event" class="loop-include loop-include-three content-area clear">
						<div class="loop-include-inner">

							<div class="loop-include-posts">
								<?php

								// Start the loop.
								while ( have_posts() ) :

									the_post();

									// Get mini template.
									get_template_part( 'template-parts/content-event-mini' );

								endwhile;

								?>
							</div><!-- .loop-include-posts -->

						</div><!-- .loop-include-inner -->
					</section><!-- .loop-include -->

				<?php else : ?>

					<?php get_template_part( 'template-parts/content', 'none' ); ?>

				<?php endif; ?>

				<footer class="archive-footer">
					<?php the_posts_navigation(); ?>
				</footer><!-- .archive-footer -->

			</section><!-- #archive -->

	</main><!-- #main -->
</div><!-- #primary -->

<?php

get_sidebar();
get_footer();
