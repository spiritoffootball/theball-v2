<?php
/**
 * The template for displaying all single Qootes.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<!-- single-quote.php -->
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

	<?php
	while ( have_posts() ) :

		the_post();

		global $post;

		if ( has_term( 'pledge', 'quote-type' ) ) {
			get_template_part( 'template-parts/content', 'quote-pledge' );
		} elseif ( has_term( 'statement', 'quote-type' ) ) {
			get_template_part( 'template-parts/content', 'quote-statement' );
		} else {
			get_template_part( 'template-parts/content', 'quote' );
		}

	endwhile; // End of the loop.
	?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php

get_sidebar();
get_footer();
