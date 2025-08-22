<?php
/**
 * The template for displaying the News page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<!-- home.php -->
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

	<?php if ( have_posts() ) : ?>

		<section id="blog" class="content-area has-post-thumbnail clear">

			<header class="entry-header"<?php the_ball_v2_feature_image_style(); ?>>
				<h2 class="blog-title"><?php esc_html_e( 'News', 'the-ball-v2' ); ?></h2>
			</header><!-- .entry-header -->

			<div class="blog-inner">
				<div class="blog-posts clear">

				<?php

				// Init counter for giving items classes.
				$post_loop_counter = new The_Ball_v2_Counter();

				// Start the loop.
				while ( have_posts() ) :

					the_post();

					// Get mini template.
					get_template_part( 'template-parts/content-news-mini' );

				endwhile;

				// Ditch counter.
				$post_loop_counter->remove_filter();
				unset( $post_loop_counter );

				?>

				</div><!-- .blog-posts -->

			</div><!-- .blog-inner -->

			<footer class="archive-footer">
				<?php the_posts_navigation(); ?>
			</footer><!-- .archive-footer -->

		</section><!-- #blog -->

	<?php else : ?>

		<?php get_template_part( 'template-parts/content', 'none' ); ?>

	<?php endif; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php if ( $meta_loop = locate_template( 'template-parts/loop-news-meta.php' ) ) : ?>
	<?php load_template( $meta_loop ); ?>
<?php endif; ?>

<?php

get_sidebar();
get_footer();
