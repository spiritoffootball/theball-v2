<?php
/**
 * Template part for displaying a Press Coverage Item.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<!-- content-press-item.php -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header"<?php the_ball_v2_feature_image_style(); ?>>
		<?php if ( is_single() ) : ?>
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php else : ?>
			<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		<?php endif; ?>
		<?php the_ball_v2_feature_image_caption(); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php $date = get_field( 'date' ); ?>
		<?php if ( ! empty( $date ) ) : ?>
			<div class="press-item-date">
				<?php echo $date; ?>
			</div>
		<?php endif; ?>

		<?php $about = get_field( 'about' ); ?>
		<?php if ( ! empty( $about ) ) : ?>
			<div class="press-item-about">
				<?php echo $about; ?>
			</div>
		<?php endif; ?>

		<?php $image = get_field( 'image' ); ?>
		<?php if ( ! empty( $image ) ) : ?>
			<div class="press-item-image">
				<img src="<?php echo $image['url']; ?>">
			</div>
		<?php endif; ?>

		<?php $link = get_field( 'link' ); ?>
		<?php if ( ! empty( $link ) ) : ?>
			<div class="press-item-link">
				<a href="<?php echo $link; ?>"><?php printf( __( 'Visit %s', 'the-ball-v2' ), get_the_title() ); ?></a>
			</div>
		<?php endif; ?>

		<?php

		the_content( sprintf(
			/* translators: %s: Name of current post. */
			wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'the-ball-v2' ), [ 'span' => [ 'class' => [] ] ] ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		) );

		wp_link_pages( [
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'the-ball-v2' ),
			'after'  => '</div>',
		] );

		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php /* the_ball_v2_entry_footer(); */ ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-->
