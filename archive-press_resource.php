<?php
/**
 * The template for displaying the Press Resource archive.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>
<!-- archive-press_resource.php -->
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<section id="archive" class="content-area has-post-thumbnail clear">

				<header class="entry-header"<?php the_ball_v2_feature_image_style(); ?>>
					<h2 class="entry-title"><?php esc_html_e( 'Press Resources', 'theball-v2' ); ?></h2>
				</header><!-- .entry-header -->

					<section id="archive-press-resource" class="loop-include loop-include-three content-area clear">
						<div class="loop-include-inner">

							<div class="loop-include-posts">
								<?php

								// Start the loop.
								while ( have_posts() ) :

									the_post();

									// Get mini template.
									get_template_part( 'template-parts/content-press_resource-mini' );

								endwhile;

								?>
							</div><!-- .loop-include-posts -->

						</div><!-- .loop-include-inner -->
					</section><!-- .loop-include -->

				<footer class="archive-footer">
					<?php the_posts_navigation(); ?>
				</footer><!-- .archive-footer -->

			</section><!-- #archive -->

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php

get_sidebar();
get_footer();
