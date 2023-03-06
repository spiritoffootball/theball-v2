<?php
/**
 * Template part for displaying a mini Press Coverage Item.
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
	<?php $date = get_field( 'date' ); ?>
	<?php if ( empty( $date ) ) : ?>
		<?php $date = ''; ?>
	<?php else: ?>
		<?php $date = ', ' . $date; ?>
	<?php endif; ?>
	<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', esc_html( $date ) . '</a></h3>' ); ?>

	<?php $about = get_field( 'about' ); ?>
	<?php if ( ! empty( $about ) ) : ?>
		<div class="press-item-about">
			<?php echo $about; ?>
		</div>
	<?php endif; ?>

	<?php $link = get_field( 'link' ); ?>
	<?php if ( ! empty( $link ) ) : ?>
		<div class="press-item-link">
			<a href="<?php echo $link; ?>"><?php printf( __( 'Visit %s', 'the-ball-v2' ), get_the_title() ); ?></a>
		</div>
	<?php endif; ?>
</article><!-- #post-->
