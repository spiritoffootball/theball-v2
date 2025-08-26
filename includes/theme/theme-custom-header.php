<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * You can add an optional custom header image to header.php like so ...
 *
 * <?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;



/**
 * Set up the WordPress core custom header feature.
 *
 * @uses the_ball_v2_header_style()
 *
 * @since 1.0.0
 */
function the_ball_v2_custom_header_setup() {

	// Supported but not used.
	add_theme_support(
		'custom-header',
		apply_filters(
			'the_ball_v2_custom_header_args',
			[
				'default-image'      => '',
				'default-text-color' => '000000',
				'width'              => 1280,
				'height'             => 250,
				'flex-height'        => true,
				'wp-head-callback'   => 'the_ball_v2_header_style',
			]
		)
	);

}

add_action( 'after_setup_theme', 'the_ball_v2_custom_header_setup' );



if ( ! function_exists( 'the_ball_v2_header_style' ) ) :

	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see the_ball_v2_custom_header_setup().
	 *
	 * @since 1.0.0
	 */
	function the_ball_v2_header_style() {

		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
			<?php if ( ! display_header_text() ) : ?>
				.site-title,
				.site-description {
					position: absolute;
					clip: rect(1px, 1px, 1px, 1px);
				}
			<?php else : ?>
				.site-title a,
				.site-description {
					color: #<?php echo esc_attr( $header_text_color ); ?>;
				}
			<?php endif; ?>
		</style>
		<?php
	}

endif;
