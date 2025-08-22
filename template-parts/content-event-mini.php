<?php
/**
 * Template part for displaying an Event.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<!-- content-event-mini.php -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>
		<?php echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark"' . the_ball_v2_get_feature_image_style( 'the-ball-v2-listings' ) . ' class="angled-right"></a>'; ?>
	</header><!-- .entry-header -->

	<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>

	<div class="entry-content">
		<div class="eo-event-date">
			<?php /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>
			<?php echo eo_format_event_occurrence(); ?>
		</div>

		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->
</article><!-- #post-->
