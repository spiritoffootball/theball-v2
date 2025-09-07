<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

?>
<!-- comments.php -->
<div id="comments" class="comments-area">
	<div class="comments-inner">

		<?php if ( have_comments() ) : ?>

			<h2 class="comments-title">
				<?php
				$sof_comment_count = get_comments_number();
				if ( '1' === $sof_comment_count ) {
					printf(
						/* translators: 1: title. */
						esc_html__( 'One thought on &ldquo;%s&rdquo;', 'theball-v2' ),
						'<span>' . wp_kses_post( get_the_title() ) . '</span>'
					);
				} else {
					printf(
						/* translators: 1: comment count number, 2: title. */
						esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $sof_comment_count, 'comments title', 'theball-v2' ) ),
						number_format_i18n( $sof_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						'<span>' . wp_kses_post( get_the_title() ) . '</span>'
					);
				}
				?>
			</h2><!-- .comments-title -->

			<?php the_comments_navigation(); ?>

			<ol class="comment-list">
				<?php

				wp_list_comments(
					[
						'style'      => 'ol',
						'short_ping' => true,
					]
				);

				?>
			</ol><!-- .comment-list -->

			<?php the_comments_navigation(); ?>

			<?php if ( ! comments_open() ) : ?>
				<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'theball-v2' ); ?></p>
			<?php endif; ?>

			<?php endif; ?>

		<?php comment_form(); ?>

	</div><!-- .comments-inner -->
</div><!-- #comments -->
