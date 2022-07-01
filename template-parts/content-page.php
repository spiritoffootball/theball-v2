<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<!-- content-page.php -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header"<?php the_ball_v2_feature_image_style(); ?>>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php the_ball_v2_feature_image_caption(); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( [
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'the-ball-v2' ),
			'after'  => '</div>',
		] );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			/*
			// Edit Post link ditched.
			edit_post_link(
				sprintf(
					// Translators: %s: Name of current post
					esc_html__( 'Edit %s', 'the-ball-v2' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
			*/
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-->
