<?php
/**
 * Template part for displaying a Pledge Quote.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
<!-- content-quote-pledge.php -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="quote-inner">
		<div class="entry-content clear">
			<?php $image = get_field( 'image' ); ?>
			<?php if ( ! empty( $image ) ) : ?>
				<div class="quote-image">
					<img src="<?php echo esc_url( $image['url'] ); ?>">
				</div>
			<?php endif; ?>

			<div class="quote-i-pledge">
				<h2 class="quote-title"><?php esc_html_e( 'I pledge', 'the-ball-v2' ); ?></h2>
			</div>

			<?php $content = get_field( 'content' ); ?>
			<?php if ( ! empty( $content ) ) : ?>
				<div class="quote-content">
					<?php /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>
					<blockquote><?php echo $content; ?></blockquote>
				</div>
			<?php endif; ?>

			<div class="quote-citation">
				<?php $source = get_field( 'source' ); ?>
				<?php if ( ! empty( $source ) ) : ?>
					<div class="quote-source">
						<h2 class="quote-title"><?php echo esc_html( $source ); ?></h2>
					</div>
				<?php endif; ?>

				<?php $about = get_field( 'about' ); ?>
				<?php if ( ! empty( $about ) ) : ?>
					<p class="quote-about"><?php echo esc_html( $about ); ?></p>
				<?php endif; ?>

				<?php $pledge_date = get_field( 'date' ); ?>
				<?php if ( ! empty( $pledge_date ) ) : ?>
					<p class="quote-date"><?php echo esc_html( $pledge_date ); ?></p>
				<?php endif; ?>
			</div>

			<footer class="entry-footer">
				<?php /* the_ball_v2_entry_footer(); */ ?>
			</footer><!-- .entry-footer -->
		</div><!-- .entry-content -->
	</div>
</article><!-- #post-->
