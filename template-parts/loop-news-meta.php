<?php
/**
 * Template part for embedding a display of meta info for news pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Get terms in the event_posts taxonomy.
$event_terms = get_terms(
	'event_posts',
	[
		'hide_empty' => false,
	]
);

if ( is_wp_error( $event_terms ) ) {
	return;
}

?>

<!-- loop-news-meta.php -->
<section id="blog-meta" class="content-area insert-area clear">
	<div class="blog-meta-inner">

		<?php if ( ! empty( $event_terms ) ) : ?>
			<div class="blog-meta-list">
				<header class="blog-meta-header">
					<h2 class="blog-meta-title"><?php esc_html_e( 'News by Event', 'the-ball-v2' ); ?></h2>
				</header><!-- .blog-meta-header -->

				<p>
					<?php foreach ( $event_terms as $event_term ) : ?>
						<a href="<?php echo get_term_link( $event_term, 'event_posts' ); ?>" class="term-link"><?php echo esc_html( $event_term->name ); ?></a>
					<?php endforeach; ?>
				</p>

			</div><!-- .blog-meta-list -->
		<?php endif; ?>

		<?php if ( ! is_home() ) : ?>
			<footer class="loop-insert-footer news-footer">
				<p><a href="<?php echo get_post_type_archive_link( 'post' ); ?>" class="archive-link"><?php esc_html_e( 'View All News', 'the-ball-v2' ); ?></a></p>
			</footer><!-- .news-footer -->
		<?php endif; ?>

	</div><!-- .blog-meta-inner -->
</section><!-- #blog-meta -->
