<?php
/**
 * The template for displaying Search Results page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<!-- search.php -->
<section id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<section id="search" class="content-area clear">

			<header class="entry-header">
				<h1 class="blog-title"><?php printf( esc_html__( 'Search Results for: %s', 'the-ball-v2' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .entry-header -->

			<?php if ( have_posts() ) : ?>

				<div class="search-inner">
					<div class="search-posts clear">
						<?php

						// Init counter for giving items classes.
						$post_loop_counter = new The_Ball_v2_Counter();

						// Start the loop.
						while ( have_posts() ) :

							the_post();

							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'search' );

						endwhile;

						// Ditch counter.
						$post_loop_counter->remove_filter();
						unset( $post_loop_counter );

						?>
					</div><!-- .search-posts -->
				</div><!-- .search-inner -->

				<footer class="archive-footer">
					<?php the_posts_navigation(); ?>
				</footer><!-- .archive-footer -->

			<?php
			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;

			?>

		</section><!-- #search -->

	</main><!-- #main -->
</section><!-- #primary -->

<?php

get_sidebar();
get_footer();
