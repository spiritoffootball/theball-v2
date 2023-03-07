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

<!-- content-press-resource.php -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>

	<?php $about = get_field( 'about' ); ?>
	<?php if ( ! empty( $about ) ) : ?>
		<div class="press-resource-about">
			<?php echo wp_trim_words( $about, 40, '...' ); ?>
		</div>
	<?php endif; ?>

	<?php if ( have_rows( 'files' ) ) : ?>
		<ul class="press-resource-files">
		<?php while( have_rows( 'files' ) ) : ?>
			<?php the_row(); ?>
			<?php $file = get_sub_field( 'file' ); ?>
			<?php if ( ! empty( $file ) ) : ?>
				<?php $title = empty( $file['title'] ) ? $file['filename'] : $file['title']; ?>
				<?php $preview = get_sub_field( 'file_preview' ); ?>
				<li>
					<a href="<?php echo $file['url']; ?>"><?php printf( __( 'Download %s', 'the-ball-v2' ), $title ); ?></a>
				</li>
			<?php endif; ?>
		<?php endwhile; ?>
		</ul>
	<?php endif; ?>
</article><!-- #post-->
