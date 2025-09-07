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
<!-- content-teaser-mini.php -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="teaser-header">
		<?php /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>
		<?php echo '<span' . the_ball_v2_get_feature_image_style( 'the-ball-v2-feature' ) . ' class="angled-right angled-medium"></span>'; ?>
	</header><!-- .teaser-header -->

	<div class="entry-content teaser-content">
		<div class="teaser-content-inner">
			<?php the_content(); ?>
		</div><!-- .teaser-content-inner -->
	</div><!-- .teaser-content -->
</article><!-- #post-## -->
