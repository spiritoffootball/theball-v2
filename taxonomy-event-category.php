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
<!-- taxonomy-event-category.php -->
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

	<?php if ( have_posts() ) : ?>

		<section id="archive-header" class="content-area">
			<article <?php post_class(); ?>>
				<header class="entry-header"<?php the_ball_v2_feature_image_style(); ?>>
					<?php /* translators: %s: The category title. */ ?>
					<h2 class="blog-title"><?php printf( esc_html__( '%s Events', 'theball-v2' ), single_cat_title( '', false ) ); ?></h2>

					<?php
					// If the category has a description display it.
					$category_description = category_description();
					if ( ! empty( $category_description ) ) {
						// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );
					}
					?>
				</header><!-- .entry-header -->
			</article><!-- #post-->
		</section>

		<section id="events-ongoing" class="loop-include loop-include-three content-area clear">
			<div class="loop-include-inner">

				<header class="loop-include-header">
					<h2 class="loop-include-title has-featured-event"><?php esc_html_e( 'Ongoing Events', 'theball-v2' ); ?></h2>
				</header><!-- .loop-include-header -->

				<div class="loop-include-posts">
					<?php while ( have_posts() ) : ?>
						<?php

						the_post();

						// Get mini template.
						get_template_part( 'template-parts/content-event-mini' );

						?>
					<?php endwhile; ?>
				</div><!-- .loop-include-posts -->

				<footer class="archive-footer">
					<?php the_posts_navigation(); ?>
				</footer><!-- .archive-footer -->

			</div><!-- .loop-include-inner -->
		</section><!-- .loop-include -->

	<?php else : ?>

		<?php get_template_part( 'template-parts/content', 'none' ); ?>

	<?php endif; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php

get_sidebar();
get_footer();
