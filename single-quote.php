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

	<?php while ( have_posts() ) : ?>

		<?php the_post(); ?>
		<?php global $post; ?>

		<?php if ( has_term( 'pledge', 'quote-type' ) ) : ?>
			<div class="quote-type quote-type-pledge-inner">
				<?php get_template_part( 'template-parts/content', 'quote-pledge' ); ?>
			</div>
		<?php elseif ( has_term( 'statement', 'quote-type' ) ) : ?>
			<div class="quote-type quote-type-statement-inner">
				<?php get_template_part( 'template-parts/content', 'quote-statement' ); ?>
			</div>
		<?php else: ?>
			<?php get_template_part( 'template-parts/content', 'quote' ); ?>
		<?php endif; ?>

	<?php endwhile; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php

get_sidebar();
get_footer();
