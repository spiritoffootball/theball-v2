<?php
/**
 * The template for displaying a single Press Resource.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<!-- single-press_resource.php -->
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

	<?php while ( have_posts() ) : ?>

		<?php the_post(); ?>
		<?php global $post; ?>

		<section class="press-resource-container clear">
			<div class="press-resource-container-inner">
				<?php get_template_part( 'template-parts/content', 'press-resource' ); ?>
			</div>
		</section><!-- .quote-container -->

	<?php endwhile; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php

get_sidebar();
get_footer();
