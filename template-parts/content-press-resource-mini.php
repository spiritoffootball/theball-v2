<?php
/**
 * Template part for displaying a mini Press Resource.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<!-- content-press-resource-mini.php -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>
		<?php echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark"' . the_ball_v2_get_feature_image_style( 'the-ball-v2-listings' ) . ' class="angled-right"></a>'; ?>
	</header><!-- .entry-header -->

	<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>

	<?php $about = get_field( 'about' ); ?>
	<?php if ( ! empty( $about ) ) : ?>
		<div class="press-resource-about">
			<?php /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>
			<?php echo wp_trim_words( $about, 40, '... <a href="' . esc_url( get_permalink() ) . '" rel="bookmark">[' . __( 'Read More', 'the-ball-v2' ) . ']</a>' ); ?>
		</div>
	<?php endif; ?>

	<?php if ( have_rows( 'files' ) ) : ?>
		<ul class="press-resource-files">
		<?php while ( have_rows( 'files' ) ) : ?>
			<?php the_row(); ?>
			<?php $file = get_sub_field( 'file' ); ?>
			<?php if ( ! empty( $file ) ) : ?>
				<?php $file_title = empty( $file['title'] ) ? $file['filename'] : $file['title']; ?>
				<?php $file_preview = get_sub_field( 'file_preview' ); ?>
				<li>
					<?php /* translators: %s: The name of the file. */ ?>
					<a href="<?php echo esc_url( $file['url'] ); ?>"><?php printf( esc_html__( 'Download %s', 'the-ball-v2' ), esc_html( $file_title ) ); ?></a>
				</li>
			<?php endif; ?>
		<?php endwhile; ?>
		</ul>
	<?php endif; ?>
</article><!-- #post-->
