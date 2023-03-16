<?php
/**
 * Template Name: Page with News Loop
 *
 * The template for displaying a Page with a News Loop after the content.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<!-- page.php -->
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) :

			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php if ( $news_loop = locate_template( 'template-parts/loop-news.php' ) ) : ?>
	<?php load_template( $news_loop ); ?>
<?php endif; ?>

<?php

get_sidebar();
get_footer();
