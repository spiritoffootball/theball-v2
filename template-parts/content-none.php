<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<!-- content-none.php -->
<section class="no-results not-found">
	<div class="not-found-inner">
		<header class="page-header">
			<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'the-ball-v2' ); ?></h1>
		</header><!-- .page-header -->

		<div class="page-content">
			<?php
			if ( is_home() && current_user_can( 'publish_posts' ) ) :
				?>

				<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'the-ball-v2' ), [ 'a' => [ 'href' => [] ] ] ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

			<?php elseif ( is_search() ) : ?>

				<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'the-ball-v2' ); ?></p>
				<?php
					get_search_form();

			else :
				?>

				<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'the-ball-v2' ); ?></p>
				<?php
					get_search_form();

			endif;
			?>
		</div><!-- .page-content -->
	</div><!-- .not-found-inner -->
</section><!-- .no-results -->
