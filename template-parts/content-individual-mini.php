<?php
/**
 * Template part for displaying an Individual in archives.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
<!-- content-individual-mini.php -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="text-align-center entry-header">
		<?php $image = get_field( 'picture' ); ?>
		<?php if ( ! empty( $image ) ) : ?>
			<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><img class="avatar" src="<?php echo esc_attr( $image['sizes']['medium-640'] ); ?>" width="<?php echo esc_attr( $image['sizes']['medium-640-width'] / 2 ); ?>" height="<?php echo esc_attr( $image['sizes']['medium-640-height'] / 2 ); ?>"></a>
		<?php else : ?>
			<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><img class="avatar" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/default-avatar.png" width="320" height="320" /></a>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>

	<?php $job_title = get_field( 'job_title' ); ?>
	<?php if ( ! empty( $job_title ) ) : ?>
		<div class="individual-job-title">
			<?php echo esc_html( $job_title ); ?>
		</div>
	<?php endif; ?>

	<footer class="entry-footer">
		<?php $cat_list = get_the_term_list( get_the_ID(), 'individual-type', '<p class="individual-tags"><span>', '</span><span>', '</span></p>' ); ?>
		<?php if ( ! empty( $cat_list ) && ! is_wp_error( $cat_list ) ) : ?>
			<div class="individual-type-terms">
				<?php /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>
				<?php echo $cat_list; ?>
			</div>
		<?php endif; ?>
		<?php $tag_list = get_the_term_list( get_the_ID(), 'individual-tag', '<p class="individual-tags"><span>', '</span><span>', '</span></p>' ); ?>
		<?php if ( ! empty( $tag_list ) && ! is_wp_error( $tag_list ) ) : ?>
			<div class="individual-tag-terms">
				<?php /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>
				<?php echo $tag_list; ?>
			</div>
		<?php endif; ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-->
