<?php
/**
 * Template part for displaying a Statement Quote.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<!-- content-quote-statement.php -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="quote-inner">
		<?php $source = get_field( 'source' ); ?>
		<?php $about = get_field( 'about' ); ?>
		<?php $statement_date = get_field( 'date' ); ?>

		<header class="entry-header"<?php the_ball_v2_feature_image_style(); ?>>
			<div class="entry-header-inner">
				<?php if ( is_single() ) : ?>
					<h1 class="quote-title"><?php echo esc_html( $source ); ?></h1>
				<?php else : ?>
					<h2 class="quote-title"><a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php echo esc_html( $source ); ?></a></h2>
				<?php endif; ?>
				<?php if ( ! empty( $about ) ) : ?>
					<span class="quote-about"><?php echo esc_html( $about ); ?></span>
				<?php endif; ?>
				<?php if ( ! empty( $statement_date ) ) : ?>
					<span class="quote-date"><?php echo esc_html( $statement_date ); ?></span>
				<?php endif; ?>
			</div>
		</header><!-- .entry-header -->

		<div class="entry-content clear">
			<?php $image = get_field( 'image' ); ?>
			<?php if ( ! empty( $image ) ) : ?>
				<div class="quote-image">
					<img src="<?php echo $image['url']; ?>">
				</div>
			<?php endif; ?>

			<?php $content = get_field( 'content' ); ?>
			<?php if ( ! empty( $content ) ) : ?>
				<div class="quote-content">
					<blockquote><?php echo $content; ?></blockquote>
				</div>
			<?php endif; ?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php /* the_ball_v2_entry_footer(); */ ?>
		</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-->
