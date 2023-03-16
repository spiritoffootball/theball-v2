<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<!-- content-search.php -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( in_array( get_post_type(), [ 'post', 'event', 'press_resource' ] ) ) : ?>
			<?php echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark"' . the_ball_v2_get_feature_image_style( 'the-ball-v2-listings' ) . ' class="angled-right"></a>'; ?>
		<?php endif; ?>
		<?php if ( in_array( get_post_type(), [ 'host', 'partner' ] ) ) : ?>
			<?php echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark"' . the_ball_v2_partner_image() . '></a>'; ?>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>

	<?php if ( 'post' === get_post_type() ) : ?>
		<?php the_ball_v2_post_date(); ?>
	<?php endif; ?>

	<div class="entry-content">
		<?php if ( 'event' === get_post_type() ) : ?>
			<div class="eo-event-date">
				<?php /* echo eo_format_event_occurrence(); */ ?>
			</div>
		<?php endif; ?>

		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
	</footer><!-- .entry-footer -->
</article><!-- #post-->
