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

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

	<?php if ( have_posts() ) : ?>

		<section id="blog" class="content-area clear">
			<div class="blog-inner">

				<header class="blog-header">
					<h2 class="blog-title"><?php echo sprintf( __( '%s News', 'the-ball-v2' ), single_cat_title( '', false ) ); ?></h2>
				</header><!-- .blog-header -->

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

				<footer class="blog-footer">
					<?php the_posts_navigation(); ?>
				</footer><!-- .blog-footer -->

			</div><!-- .blog-inner -->
		</section><!-- #blog -->

	<?php
	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php

get_sidebar();
get_footer();
