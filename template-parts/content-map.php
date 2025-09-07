<?php
/**
 * Template part for displaying Map page content.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
<!-- content-map.php -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header"<?php the_ball_v2_feature_image_style(); ?>>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php the_ball_v2_feature_image_caption(); ?>
	</header><!-- .entry-header -->

	<div class="entry-content sof-map">
		<?php

		// Skip if we do not have the Geo Mashup plugin.
		if ( class_exists( 'GeoMashup' ) ) {
			$map_args = [
				'map_content'             => 'global',
				'object_name'             => 'post',
				'map_post_type'           => 'ball,event,host,partner,post',
				'zoom'                    => 'auto',
				'remove_geo_mashup_logo'  => 'true',
				'auto_info_open'          => 'false',
				'add_overview_control'    => 'false',
				'marker_select_center'    => 'false',
				'marker_select_highlight' => 'false',
			];

			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo GeoMashup::map( $map_args );
		}

		?>
	</div><!-- .entry-content -->

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php echo do_shortcode( '[sof_pledgeball_data]' ); ?>
		<?php
			/*
			// Edit Post link ditched.
			edit_post_link(
				sprintf(
					// Translators: %s: Name of current post
					esc_html__( 'Edit %s', 'theball-v2' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
			*/
		?>

	</footer><!-- .entry-footer -->
</article><!-- #post-->
