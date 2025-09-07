<?php
/**
 * The template for displaying the Press Coverage archive.
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

		<section id="archive" class="content-area has-post-thumbnail clear">

			<header class="entry-header"<?php the_ball_v2_feature_image_style(); ?>>
				<h2 class="entry-title"><?php esc_html_e( 'Press Coverage', 'theball-v2' ); ?></h2>
			</header><!-- .entry-header -->

			<div class="entry-content">

				<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : ?>
						<?php

						the_post();

						// Get mini template.
						get_template_part( 'template-parts/content-press_coverage-mini' );

						?>
					<?php endwhile; ?>

				<?php else : ?>

					<?php get_template_part( 'template-parts/content', 'none' ); ?>

				<?php endif; ?>

			</div><!-- .entry-content -->

			<footer class="entry-footer">
				<?php the_posts_navigation(); ?>
			</footer><!-- .entry-footer -->

		</section><!-- #archive -->

	</main><!-- #main -->
</div><!-- #primary -->

<?php

get_sidebar();
get_footer();
