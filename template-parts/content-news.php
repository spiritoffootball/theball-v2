<?php
/**
 * Template part for displaying a news item.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
<!-- content-news.php -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"<?php the_ball_v2_feature_image_style( 'the-ball-v2-listings' ); ?>><?php the_title( '', '' ); ?></a>
	</header><!-- .entry-header -->

	<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>

	<div class="entry-content">
		<?php the_excerpt(); ?>
		<p class="read-more"><a href="<?php echo esc_url( get_permalink() ); ?>" class="read-more"><?php esc_html_e( 'Read more', 'the-ball-v2' ); ?></a></p>
	</div><!-- .entry-content -->
</article><!-- #post-->
