<?php
/**
 * Template part for displaying the Event for "The Ball".
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
<!-- content-event-the-ball.php -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h3 class="entry-title"><a href="<?php echo esc_url( get_permalink() . '#pledge' ); ?>" rel="bookmark"><?php esc_html_e( 'Make your pledge with The Ball', 'the-ball-v2' ); ?></a></h3>

	<header class="entry-header">
		<?php /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>
		<?php echo '<a href="' . esc_url( get_permalink() . '#pledge' ) . '" rel="bookmark"' . the_ball_v2_get_feature_image_style( 'the-ball-v2-feature' ) . ' class="angled-right angled-medium"></a>'; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="eo-event-date">
			<?php /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>
			<?php echo eo_format_event_occurrence(); ?>
		</div>
		<?php the_excerpt(); ?>
		<h3><a class="button" href="<?php echo esc_url( get_permalink() . '#pledge' ); ?>"><?php echo esc_html_e( 'Pledge now!', 'the-ball-v2' ); ?></a></h3>
	</div><!-- .entry-content -->
</article><!-- #post-->
