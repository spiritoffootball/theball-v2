<?php
/**
 * Template Name: People
 *
 * The template for displaying the People page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>
<!-- page-people.php -->
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

	<section id="archive-header" class="content-area">
		<?php
		while ( have_posts() ) :

			the_post();

			get_template_part( 'template-parts/content', 'page' );

		endwhile; // End of the loop.
		?>
	</section>

	<?php if ( $squad_loop = locate_template( 'template-parts/loop-individuals-squad.php' ) ) : ?>
		<?php load_template( $squad_loop ); ?>
	<?php endif; ?>

	<?php if ( $board_loop = locate_template( 'template-parts/loop-individuals-board.php' ) ) : ?>
		<?php load_template( $board_loop ); ?>
	<?php endif; ?>

	<?php if ( $staff_loop = locate_template( 'template-parts/loop-individuals-staff.php' ) ) : ?>
		<?php load_template( $staff_loop ); ?>
	<?php endif; ?>

	<?php if ( $supporters_loop = locate_template( 'template-parts/loop-individuals-supporters.php' ) ) : ?>
		<?php load_template( $supporters_loop ); ?>
	<?php endif; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php

get_sidebar();
get_footer();
