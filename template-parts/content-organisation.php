<?php
/**
 * Template part for displaying an Organisation.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<!-- content-organisation.php -->
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
		<?php $logo = get_field( 'logo' ); ?>
		<?php if ( ! empty( $logo ) ) : ?>
			<div class="organisation-logo">
				<img src="<?php echo esc_url( $logo['sizes']['medium-640'] ); ?>" width="<?php echo esc_attr( $logo['sizes']['medium-640-width'] / 2 ); ?>" height="<?php echo esc_attr( $logo['sizes']['medium-640-height'] / 2 ); ?>">
			</div>
		<?php endif; ?>

		<?php $about = get_field( 'about' ); ?>
		<?php if ( ! empty( $about ) ) : ?>
			<div class="organisation-about">
				<?php /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>
				<?php echo $about; ?>
			</div>
		<?php endif; ?>

		<?php $why = get_field( 'why_partner' ); ?>
		<?php if ( ! empty( $why ) ) : ?>
			<div class="organisation-why-partner">
				<?php /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>
				<?php echo $why; ?>
			</div>
		<?php endif; ?>

		<?php
		$social_links = [];
		foreach ( [ 'facebook', 'instagram', 'twitter', 'tiktok', 'youtube' ] as $selector ) :
			$field = get_field( $selector );
			if ( ! empty( $field ) ) :
				$social_links[ $selector ] = $field;
			endif;
		endforeach;
		?>

		<?php if ( ! empty( $social_links ) ) : ?>
			<div class="jetpack_widget_social_icons organisation-social-links">
				<ul class="jetpack-social-widget-list size-large">
				<?php foreach ( $social_links as $selector => $social_link ) : ?>
					<li class="jetpack-social-widget-item organisation-social-link organisation-<?php echo esc_attr( $selector ); ?>">
						<a href="<?php echo esc_url( $social_link ); ?>" target="_self">
							<span class="screen-reader-text"><?php echo esc_html( ucfirst( $selector ) ); ?></span>
							<svg class="icon icon-<?php echo esc_attr( $selector ); ?>" aria-hidden="true" role="presentation">
								<use href="#icon-<?php echo esc_attr( $selector ); ?>" xlink:href="#icon-<?php echo esc_attr( $selector ); ?>"></use>
							</svg>
						</a>
					</li>
				<?php endforeach; ?>
				</ul>
			</div>
		<?php endif; ?>

		<?php $website = get_field( 'website' ); ?>
		<?php if ( ! empty( $website ) ) : ?>
			<div class="organisation-website">
				<?php /* translators: %s: The name of the organisation. */ ?>
				<a href="<?php echo esc_url( $website ); ?>"><?php printf( esc_html__( '%s website', 'the-ball-v2' ), esc_html( get_the_title() ) ); ?></a>
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
