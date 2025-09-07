<?php
/**
 * Template part for displaying an SDG.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
<!-- content-sdg.php -->
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
		<?php $icon = get_field( 'image' ); ?>
		<?php if ( ! empty( $icon ) ) : ?>
			<div class="text-align-center sdg-icon">
				<img src="<?php echo esc_url( $icon['sizes']['the-ball-v2-feature'] ); ?>" width="<?php echo esc_attr( $icon['sizes']['the-ball-v2-feature-width'] / 2 ); ?>" height="<?php echo esc_attr( $icon['sizes']['the-ball-v2-feature-height'] / 2 ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>">
			</div>
		<?php endif; ?>

		<?php $about = get_field( 'about' ); ?>
		<?php if ( ! empty( $about ) ) : ?>
			<div class="sdg-about">
				<?php /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>
				<?php echo $about; ?>
			</div>
		<?php endif; ?>

		<?php if ( have_rows( 'links' ) ) : ?>
			<div class="sdg-links-container text-align-center ">
				<h4><?php esc_html_e( 'Read more', 'theball-v2' ); ?></h4>
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
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php /* the_ball_v2_entry_footer(); */ ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-->
