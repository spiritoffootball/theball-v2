<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<!-- 404.php -->
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<section class="error-404 not-found has-post-thumbnail clear">

			<header class="entry-header" style="background-image: url('https://theball.tv/2022/files/2022/08/21.7.2022-Everton-FITC_TheBallPitchsideGoodisonPark_2-scaled.jpg');">
				<h1 class="page-title"><?php esc_html_e( 'You&rsquo;re offside', 'the-ball-v2' ); ?></h1>
			</header><!-- .page-header -->

			<div class="entry-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'the-ball-v2' ); ?></p>

				<?php

				get_search_form();

				the_widget( 'WP_Widget_Recent_Posts' );

				// Only show the widget if site has multiple categories.
				if ( the_ball_v2_blog_has_multiple_categories() ) :
					?>

						<div class="widget widget_categories">
							<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'the-ball-v2' ); ?></h2>
							<ul>
								<?php

								wp_list_categories(
									[
										'orderby'    => 'count',
										'order'      => 'DESC',
										'show_count' => 1,
										'title_li'   => '',
										'number'     => 10,
									]
								);

								?>
							</ul>
						</div><!-- .widget -->

					<?php
				endif;

				/* translators: %1$s: smiley */
				$archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'the-ball-v2' ), convert_smilies( ':)' ) ) . '</p>';
				the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );

				the_widget( 'WP_Widget_Tag_Cloud' );

				?>

			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->
</div><!-- #primary -->

<?php

get_footer();
