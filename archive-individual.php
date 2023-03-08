<?php
/**
 * The template for displaying the People archive.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<!-- archive-individual.php -->
<div id="primary" class="content-area yuck">
	<main id="main" class="site-main" role="main">

		<section id="individuals" class="content-area has-post-thumbnail clear">
			<header class="entry-header"<?php echo the_ball_v2_get_home_feature_image_style(); ?>>
				<h2 class="entry-title"><?php esc_html_e( 'People', 'the-ball-v2' ); ?></h2>
			</header><!-- .entry-header -->

			<div class="individuals-inner">
				<div class="individuals-posts clear">

					<?php if ( have_posts() ) : ?>

						<?php

						// Init counter for giving items classes.
						$post_loop_counter = new The_Ball_v2_Counter();

						// Start the loop.
						while ( have_posts() ) :

							the_post();

							// Get mini template.
							get_template_part( 'template-parts/content-individual-mini' );

						endwhile;

						// Ditch counter.
						$post_loop_counter->remove_filter();
						unset( $post_loop_counter );

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;

					?>

				</div><!-- .individuals-posts -->
				<footer class="entry-footer">
					<?php the_posts_navigation(); ?>
				</footer><!-- .entry-footer -->

			</div><!-- .individuals-inner -->
		</section><!-- #individuals -->

	</main><!-- #main -->
</div><!-- #primary -->

<?php if ( $meta_loop = locate_template( 'template-parts/loop-news-meta.php' ) ) : ?>
	<?php load_template( $meta_loop ); ?>
<?php endif; ?>

<?php

get_sidebar();
get_footer();
