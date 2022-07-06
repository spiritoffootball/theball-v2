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

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="teaser-header">
		<?php echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark"' . the_ball_v2_get_feature_image_style( 'the-ball-v2-listings' ) . ' class="angled-right angled-medium"></a>'; ?>
	</header><!-- .teaser-header -->

	<div class="entry-content teaser-content">
		<div class="teaser-content-inner">
			<?php the_content(); ?>
	</div><!-- .teaser-content-inner -->
	</div><!-- .teaser-content -->
</article><!-- #post-## -->
