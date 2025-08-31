<?php
/**
 * Template part for displaying an Award.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
<!-- content-award.php -->
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
		<?php $badge = get_field( 'image' ); ?>
		<?php if ( ! empty( $badge ) ) : ?>
			<div class="award-badge">
				<img src="<?php echo esc_url( $badge['sizes']['the-ball-v2-feature'] ); ?>" width="<?php echo esc_attr( $badge['sizes']['the-ball-v2-feature-width'] / 2 ); ?>" height="<?php echo esc_attr( $badge['sizes']['the-ball-v2-feature-height'] / 2 ); ?>" alt="<?php echo esc_attr( $badge['alt'] ); ?>">
			</div>
		<?php endif; ?>

		<?php $about = get_field( 'about' ); ?>
		<?php if ( ! empty( $about ) ) : ?>
			<div class="award-about">
				<?php /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>
				<?php echo $about; ?>
			</div>
		<?php endif; ?>

		<?php $awarded_by = get_field( 'awarded_by' ); ?>
		<?php if ( ! empty( $awarded_by ) ) : ?>
			<div class="award-awarded-by">
				<h4><?php esc_html_e( 'Awarded by', 'the-ball-v2' ); ?></h4>
				<?php echo esc_html( $awarded_by ); ?>
			</div>
		<?php endif; ?>

		<?php $awarded_in = get_field( 'year' ); ?>
		<?php if ( ! empty( $awarded_in ) ) : ?>
			<div class="award-year">
				<?php echo esc_html( $awarded_in ); ?>
			</div>
		<?php endif; ?>

		<?php $logo = get_field( 'logo' ); ?>
		<?php if ( 1 === 2 && ! empty( $logo ) ) : ?>
			<div class="award-logo">
				<img src="<?php echo esc_url( $logo['sizes']['the-ball-v2-listings'] ); ?>" width="<?php echo esc_attr( $logo['sizes']['the-ball-v2-listings-width'] / 2 ); ?>" height="<?php echo esc_attr( $logo['sizes']['the-ball-v2-listings-height'] / 2 ); ?>">
			</div>
		<?php endif; ?>

		<?php if ( have_rows( 'links' ) ) : ?>
			<h4><?php esc_html_e( 'Read more', 'the-ball-v2' ); ?></h4>
			<div class="award-links-container">
				<ul>
					<?php while ( have_rows( 'links' ) ) : ?>
						<?php the_row(); ?>
						<?php $link_label = get_sub_field( 'link_label' ); ?>
						<?php $link_url = get_sub_field( 'link' ); ?>
						<li>
							<?php if ( ! empty( $link_label ) && ! empty( $link_url ) ) : ?>
								<a href="<?php echo esc_url( $link_url ); ?>" target="_blank"><?php echo esc_html( $link_label ); ?></a>
							<?php elseif ( ! empty( $link_url ) ) : ?>
								<a href="<?php echo esc_url( $link_url ); ?>" target="_blank"><?php echo esc_html( $link_url ); ?></a>
							<?php endif; ?>
						</li>
					<?php endwhile; ?>
				</ul>
			</div>
		<?php endif; ?>

		<?php

		the_content(
			sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'the-ball-v2' ), [ 'span' => [ 'class' => [] ] ] ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			)
		);

		$args = [
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'the-ball-v2' ),
			'after'  => '</div>',
		];

		wp_link_pages( $args );

		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php /* the_ball_v2_entry_footer(); */ ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-->
