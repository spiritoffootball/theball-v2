<?php
/**
 * The template for displaying an archive of Quotes with a Tag.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<!-- taxonomy-quote-tag.php -->
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

	<?php if ( have_posts() ) : ?>

		<section id="archive-header" class="content-area">
			<article <?php post_class(); ?>>
				<header class="entry-header"<?php the_ball_v2_feature_image_style(); ?>>
					<h2 class="blog-title"><?php echo single_tag_title(); ?></h2>

					<?php
					// If the category has a description display it.
					$category_description = category_description();
					if ( ! empty( $category_description ) ) {
						echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );
					}
					?>
				</header><!-- .entry-header -->
			</article><!-- #post-->
		</section>

		<section class="quote-container insert-area clear">
			<div class="quote-container-inner">
			<?php

			// Init counter for giving items classes.
			$post_loop_counter = new The_Ball_v2_Counter();

			?>

			<?php while ( have_posts() ) : ?>

				<?php the_post(); ?>

				<?php if ( has_term( 'pledge', 'quote-type' ) ) : ?>
					<div class="quote-type quote-type-pledge-inner">
						<?php get_template_part( 'template-parts/content', 'quote-pledge' ); ?>
					</div>
				<?php elseif ( has_term( 'statement', 'quote-type' ) ) : ?>
					<div class="quote-type quote-type-statement-inner">
						<?php get_template_part( 'template-parts/content', 'quote-statement' ); ?>
					</div>
				<?php else : ?>
					<?php get_template_part( 'template-parts/content', 'quote' ); ?>
				<?php endif; ?>

			<?php endwhile; ?>

			<?php

			// Ditch counter.
			$post_loop_counter->remove_filter();
			unset( $post_loop_counter );

			?>
			</div>
		</section><!-- .quote-container -->

		<footer class="archive-footer">
			<?php the_posts_navigation(); ?>
		</footer><!-- .archive-footer -->

	<?php
	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php

get_sidebar();
get_footer();
