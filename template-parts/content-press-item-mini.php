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
	<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>

	<?php $date = get_field( 'date' ); ?>
	<?php if ( empty( $date ) ) : ?>
		<?php $date = ''; ?>
	<?php else : ?>
		<?php $date = ', ' . $date; ?>
	<?php endif; ?>

	<?php $publisher = get_field( 'publisher' ); ?>
	<div class="press-item-publisher">
		<?php if ( ! empty( $publisher ) ) : ?>
			<?php echo $publisher . esc_html( $date ); ?>
		<?php else : ?>
			<?php echo $date; ?>
		<?php endif; ?>
	</div>

	<?php $about = get_field( 'about' ); ?>
	<?php if ( ! empty( $about ) ) : ?>
		<div class="press-item-about">
			<?php echo $about; ?>
		</div>
	<?php endif; ?>

	<?php $link = get_field( 'link' ); ?>
	<?php if ( ! empty( $link ) ) : ?>
		<div class="press-item-link">
			<a href="<?php echo $link; ?>"><?php printf( __( 'Visit the %s website', 'the-ball-v2' ), $publisher ); ?></a>
		</div>
	<?php endif; ?>
</article><!-- #post-->
