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

	<?php if ( is_front_page() ) : ?>
		<?php if ( $teaser = locate_template( 'template-parts/loop-teasers.php' ) ) : ?>
			<?php load_template( $teaser ); ?>
		<?php endif; ?>
	<?php endif; ?>

	<div class="entry-content">
		<?php /* if ( is_front_page() ) : ?>
			<?php echo do_shortcode( '[sof_pledgeball_data]' ); ?>
		<?php endif; */ ?>

		<?php
		the_content();

		$args = [
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'theball-v2' ),
			'after'  => '</div>',
		];

		wp_link_pages( $args );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			/*
			// Edit Post link ditched.
			edit_post_link(
				sprintf(
					// Translators: %s: Name of current post.
					esc_html__( 'Edit %s', 'theball-v2' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
			*/
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-->
