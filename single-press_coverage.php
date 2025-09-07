<?php
/**
 * The template for displaying a single Press Coverage Item.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>
<!-- single-press_coverage.php -->
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

	<?php while ( have_posts() ) : ?>

		<?php the_post(); ?>

		<section class="press-coverage-container clear">
			<div class="press-coverage-container-inner">
				<?php get_template_part( 'template-parts/content', get_post_type() ); ?>
			</div>
		</section><!-- .quote-container -->

	<?php endwhile; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php

get_sidebar();
get_footer();
