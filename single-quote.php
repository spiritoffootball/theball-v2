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

		///*
		$e = new \Exception();
		$trace = $e->getTraceAsString();
		error_log( print_r( [
			'method' => __METHOD__,
			'post' => $post,
			//'backtrace' => $trace,
		], true ) );

		$e = new \Exception();
		$trace = $e->getTraceAsString();
		error_log( print_r( [
			'method' => __METHOD__,
			'is-pledge' => has_term( 'pledge', 'quote-type' ) ? 'yes' : 'no',
			'is-statement' => has_term( 'statement', 'quote-type' ) ? 'yes' : 'no',
			//'backtrace' => $trace,
		], true ) );
		//*/

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
