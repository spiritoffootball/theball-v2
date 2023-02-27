<?php
/**
 * The template for displaying all single Events.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<!-- single-event.php -->
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

	<?php
	while ( have_posts() ) :

		the_post();

		get_template_part( 'template-parts/content', get_post_type() );

	endwhile; // End of the loop.
	?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php if ( $hosts_loop = locate_template( 'template-parts/loop-hosts-by-event.php' ) ) : ?>
	<?php load_template( $hosts_loop ); ?>
<?php endif; ?>

<?php if ( $pledge_form = locate_template( 'template-parts/form-pledge-single.php' ) ) : ?>
	<?php load_template( $pledge_form ); ?>
<?php endif; ?>

<?php if ( $news_loop = locate_template( 'template-parts/loop-news-by-event.php' ) ) : ?>
	<?php load_template( $news_loop ); ?>
<?php endif; ?>

<?php if ( $event_loop = locate_template( 'template-parts/loop-events-other.php' ) ) : ?>
	<?php load_template( $event_loop ); ?>
<?php endif; ?>

<?php

get_sidebar();
get_footer();
