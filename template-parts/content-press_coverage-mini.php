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
<!-- content-press_coverage-mini.php -->
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
			<?php echo esc_html( $publisher ); ?> <?php echo esc_html( $date ); ?>
		<?php else : ?>
			<?php echo esc_html( $date ); ?>
		<?php endif; ?>
	</div>

	<?php $about = get_field( 'about' ); ?>
	<?php if ( ! empty( $about ) ) : ?>
		<div class="press-item-about">
			<?php /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>
			<?php echo $about; ?>
		</div>
	<?php endif; ?>

	<?php $website_link = get_field( 'link' ); ?>
	<?php if ( ! empty( $website_link ) ) : ?>
		<div class="press-item-link">
			<?php /* translators: %s: The name of the publisher. */ ?>
			<a href="<?php echo esc_url( $website_link ); ?>"><?php printf( esc_html__( 'Visit the %s website', 'theball-v2' ), esc_html( $publisher ) ); ?></a>
		</div>
	<?php endif; ?>
</article><!-- #post-->
