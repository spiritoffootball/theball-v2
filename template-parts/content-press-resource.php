<?php
/**
 * Template part for displaying a Press Resource.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
<!-- content-press-resource.php -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header"<?php the_ball_v2_feature_image_style(); ?>>
		<?php if ( is_single() ) : ?>
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php else : ?>
			<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		<?php endif; ?>
		<?php the_ball_v2_feature_image_caption(); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php $about = get_field( 'about' ); ?>
		<?php if ( ! empty( $about ) ) : ?>
			<div class="press-resource-about">
				<?php /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>
				<?php echo $about; ?>
			</div>
		<?php endif; ?>

		<?php if ( have_rows( 'files' ) ) : ?>
			<div class="press-resource-files">
				<?php while ( have_rows( 'files' ) ) : ?>

					<?php the_row(); ?>
					<?php $file = get_sub_field( 'file' ); ?>

					<?php if ( ! empty( $file ) ) : ?>
						<?php $file_title = empty( $file['title'] ) ? $file['filename'] : $file['title']; ?>
						<?php $file_preview = get_sub_field( 'file_preview' ); ?>
						<div class="press-resource-file">
							<h2><?php echo esc_html( $file_title ); ?></h2>
							<?php if ( ! empty( $file_preview ) ) : ?>
								<div class="press-resource-image">
									<img src="<?php echo esc_url( $file_preview['sizes']['medium_large'] ); ?>">
								</div>
							<?php endif; ?>
							<?php if ( ! empty( $file['description'] ) ) : ?>
								<?php /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>
								<?php echo wpautop( wptexturize( $file['description'] ) ); ?>
							<?php endif; ?>
							<?php /* translators: %s: The name of the file. */ ?>
							<p><a href="<?php echo esc_url( $file['url'] ); ?>"><?php printf( esc_html__( 'Download %s', 'the-ball-v2' ), esc_html( $file_title ) ); ?></a></p>
						</div>
					<?php endif; ?>

				<?php endwhile; ?>
			</div>
		<?php endif; ?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php

		$cat_list = get_the_term_list( get_the_ID(), 'press-resource-type', '<p class="press-resource-tags"><span>', '</span><span>', '</span></p>' );
		if ( ! empty( $cat_list ) && ! is_wp_error( $cat_list ) ) {
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo $cat_list;
		}

		?>
		<?php

		$tag_list = get_the_term_list( get_the_ID(), 'press-resource-tag', '<p class="press-resource-tags"><span>', '</span><span>', '</span></p>' );
		if ( ! empty( $tag_list ) && ! is_wp_error( $tag_list ) ) {
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo $tag_list;
		}

		?>
		<?php /* the_ball_v2_entry_footer(); */ ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-->
