<?php
/**
 * The template for displaying all single SDGs.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>
<!-- single-sdg.php -->
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

<?php if ( $posts_loop = locate_template( 'template-parts/loop-sdg-posts.php' ) ) : ?>
	<?php load_template( $posts_loop ); ?>
<?php endif; ?>

<?php if ( $events_loop = locate_template( 'template-parts/loop-sdg-events.php' ) ) : ?>
	<?php load_template( $events_loop ); ?>
<?php endif; ?>

<?php

get_sidebar();
get_footer();
