<?php
/**
 * The template for displaying all single Quotes.
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

	<?php while ( have_posts() ) : ?>

		<?php the_post(); ?>

		<section class="quote-container clear">
			<div class="quote-container-inner">

				<?php if ( has_term( 'pledge', 'quote-type' ) ) : ?>
					<?php get_template_part( 'template-parts/content', 'quote-pledge' ); ?>
				<?php elseif ( has_term( 'statement', 'quote-type' ) ) : ?>
					<?php get_template_part( 'template-parts/content', 'quote-statement' ); ?>
				<?php else : ?>
					<?php get_template_part( 'template-parts/content', get_post_type() ); ?>
				<?php endif; ?>

			</div>
		</section><!-- .quote-container -->

	<?php endwhile; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php

get_sidebar();
get_footer();
