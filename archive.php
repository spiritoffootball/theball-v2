<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<!-- archive.php -->
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<section id="blog" class="content-area clear">
			<div class="blog-inner">

				<header class="page-header">
					<?php
						the_archive_title( '<h1 class="blog-title">', '</h1>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
				</header><!-- .page-header -->

				<div class="blog-posts clear">

					<?php if ( have_posts() ) : ?>

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

					<?php else : ?>
						<?php get_template_part( 'template-parts/content', 'none' ); ?>
					<?php endif; ?>

				</div><!-- .blog-posts -->

				<footer class="archive-footer">
					<?php the_posts_navigation(); ?>
				</footer><!-- .archive-footer -->

			</div><!-- .blog-inner -->
		</section><!-- #blog -->

	</main><!-- #main -->
</div><!-- #primary -->

<?php if ( $meta_loop = locate_template( 'template-parts/loop-news-meta.php' ) ) : ?>
	<?php load_template( $meta_loop ); ?>
<?php endif; ?>

<?php

get_sidebar();
get_footer();
