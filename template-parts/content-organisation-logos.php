<?php
/**
 * Template part for displaying an Organisation logos.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<!-- content-organsation-logo.php -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php the_ball_v2_partner_image( 'the-ball-v2-partner' ); ?></a>
	</header><!-- .entry-header -->
</article><!-- #post-->
