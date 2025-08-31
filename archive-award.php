<?php
/**
 * The template for displaying the Awards archive.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>
<!-- archive-award.php -->
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<section id="awards" class="content-area has-post-thumbnail clear">

			<header class="entry-header"<?php the_ball_v2_feature_image_style(); ?>>
				<h2 class="entry-title"><?php esc_html_e( 'Awards', 'the-ball-v2' ); ?></h2>
			</header><!-- .entry-header -->

			<div class="awards-inner">
				<div class="awards-posts clear">

					<?php if ( have_posts() ) : ?>

						<?php

						// Init counter for giving items classes.
						$post_loop_counter = new The_Ball_v2_Counter();

						// Start the loop.
						while ( have_posts() ) :

							the_post();

							// Get mini template.
							get_template_part( 'template-parts/content-award-mini' );

						endwhile;

						// Ditch counter.
						$post_loop_counter->remove_filter();
						unset( $post_loop_counter );

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;

					?>

				</div><!-- .awards-posts -->

			</div><!-- .awards-inner -->

			<footer class="archive-footer">
				<?php the_posts_navigation(); ?>
			</footer><!-- .archive-footer -->
		</section><!-- #awards -->

	</main><!-- #main -->
</div><!-- #primary -->

<?php

get_sidebar();
get_footer();
