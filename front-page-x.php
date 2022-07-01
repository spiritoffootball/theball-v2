<?php
/**
 * The template for displaying the front page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) :

			the_post();

			?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?><?php the_ball_v2_feature_image_style(); ?>>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<div class="playable-placeholder">
						<div class="playable-placeholder-image">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/the-ball-v2-logo-homepage.png">
						</div>
						<div class="playable-placeholder-text">
							<?php the_content(); ?>
						</div>
					</div>
				</div><!-- .entry-content -->
			</article><!-- #post-->

		<?php endwhile; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php if ( $event_loop = locate_template( 'template-parts/loop-events.php' ) ) : ?>
		<?php load_template( $event_loop ); ?>
	<?php endif; ?>

	<?php if ( $news_loop = locate_template( 'template-parts/loop-news.php' ) ) : ?>
		<?php load_template( $news_loop ); ?>
	<?php endif; ?>

<?php

get_sidebar();
get_footer();
