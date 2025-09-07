<?php
/**
 * Template part for displaying an Award in a loop include.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
<!-- content-award-mini.php -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="text-align-center entry-header">
		<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php the_ball_v2_award_image( 'the-ball-v2-listings' ); ?></a>
	</header><!-- .entry-header -->

	<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>

</article><!-- #post-->
