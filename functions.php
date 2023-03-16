<?php
/**
 * The Ball v2 functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Theme version.
 *
 * Bumping this will cause styles and scripts to be refreshed.
 */
define( 'THE_BALL_V2_THEME_VERSION', '1.2.2' );

// Set theme debugging state.
if ( ! defined( 'THE_BALL_V2_THEME_DEBUG' ) ) {
	define( 'THE_BALL_V2_THEME_DEBUG', false );
}

/**
 * Bootstraps theme object and returns instance.
 *
 * @since 1.0.1
 *
 * @return The_Ball_v2_Theme $theme The theme instance.
 */
function the_ball_v2_theme() {

	// Declare as static.
	static $theme;

	// Instantiate theme class if not yet instantiated.
	if ( ! isset( $theme ) ) {
		require get_template_directory() . '/includes/classes/class-theme.php';
		$theme = new The_Ball_v2_Theme();
	}

	// --<
	return $theme;

}

// Bootstrap immediately.
the_ball_v2_theme();


if ( ! function_exists( 'the_ball_v2_setup' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since 1.0.0
	 */
	function the_ball_v2_setup() {

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// Define a full-size custom image size, cropped to fit.
		add_image_size(
			'the-ball-v2-feature',
			apply_filters( 'the_ball_v2_feature_image_width', 1280 ),
			apply_filters( 'the_ball_v2_feature_image_height', 720 ),
			false // Crop.
		);

		// Define a small custom image size, cropped to fit.
		add_image_size(
			'the-ball-v2-listings',
			apply_filters( 'the_ball_v2_listings_image_width', 553 ),
			apply_filters( 'the_ball_v2_listings_image_height', 320 ),
			false // Crop.
		);

		/*
		// Define a medium-large custom image size, cropped to fit.
		add_image_size(
			'the-ball-v2-mediumlarge',
			apply_filters( 'the_ball_v2_mediumlarge_image_width', 640 ),
			apply_filters( 'the_ball_v2_mediumlarge_image_height', 360 ),
			true // Crop.
		);

		// Define a medium custom image size, cropped to fit.
		add_image_size(
			'the-ball-v2-medium',
			apply_filters( 'the_ball_v2_medium_image_width', 480 ),
			apply_filters( 'the_ball_v2_medium_image_height', 270 ),
			true // Crop.
		);

		// Define a square "people" custom image size, cropped to fit.
		add_image_size(
			'the-ball-v2-person',
			apply_filters( 'the_ball_v2_person_image_width', 384 ),
			apply_filters( 'the_ball_v2_person_image_height', 384 ),
			true // Crop.
		);
		*/

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( [
			'primary' => esc_html__( 'Primary', 'the-ball-v2' ),
			'footer' => esc_html__( 'Footer', 'the-ball-v2' ),
		] );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', [
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		] );

		/*
		 * Enable support for Post Formats.
		 * @see https://developer.wordpress.org/themes/functionality/post-formats/
		 */
		add_theme_support( 'post-formats', [
			'aside',
			'image',
			'video',
			'quote',
			'link',
		] );

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters( 'the_ball_v2_custom_background_args',
				[
					'default-color' => 'ffffff',
					'default-image' => '',
				]
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Style the visual editor with editor-style.css.
		add_editor_style();

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', [
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		] );

	}

endif;

add_action( 'after_setup_theme', 'the_ball_v2_setup' );



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @since 1.0.0
 *
 * @global int $content_width
 */
function the_ball_v2_content_width() {

	// The annoying default content width.
	$GLOBALS['content_width'] = apply_filters( 'the_ball_v2_content_width', 640 );

}

add_action( 'after_setup_theme', 'the_ball_v2_content_width', 0 );



/**
 * Remove feature images from built-in posts.
 *
 * @since 1.0.0
 */
function the_ball_v2_remove_post_type_support() {

	// Remove feature images from built-in posts.
	remove_post_type_support( 'post', 'thumbnail' );

}

// phpcs:ignore Squiz.Commenting.InlineComment.InvalidEndChar
//add_action( 'init', 'the_ball_v2_remove_post_type_support', 1000 );



/**
 * Enqueue stylesheets.
 *
 * @since 1.0.0
 */
function the_ball_v2_styles() {

	// Define version.
	$version = THE_BALL_V2_THEME_VERSION;
	if ( true === THE_BALL_V2_THEME_DEBUG ) {
		$version .= '-' . time();
	}

	// Use dashicons.
	wp_enqueue_style( 'dashicons' );

	// Screen stylesheet.
	wp_enqueue_style(
		'the-ball-v2-global',
		get_template_directory_uri() . '/assets/css/global.css',
		[],
		$version,
		'all' // Media.
	);

	// Slider stylesheet.
	wp_enqueue_style(
		'quote-slider-css',
		get_template_directory_uri() . '/assets/css/flexslider.css',
		[ 'the-ball-v2-global' ],
		$version,
		'all' // Media.
	);

	// Print stylesheet.
	wp_enqueue_style(
		'the-ball-v2-print',
		get_template_directory_uri() . '/assets/css/print.css',
		[ 'the-ball-v2-global' ],
		$version,
		'print' // Media.
	);

}

add_action( 'wp_enqueue_scripts', 'the_ball_v2_styles', 50 );



/**
 * Enqueue scripts.
 *
 * @since 1.0.0
 */
function the_ball_v2_scripts() {

	// Navigation script.
	wp_enqueue_script(
		'the-ball-v2-navigation',
		get_template_directory_uri() . '/assets/js/navigation.js',
		[],
		THE_BALL_V2_THEME_VERSION,
		true
	);

	// Add responsive videos script.
	wp_enqueue_script(
		'theball_fitvids',
		get_template_directory_uri() . '/assets/js/jquery.fitvids.js',
		[ 'jquery' ],
		THE_BALL_V2_THEME_VERSION,
		true
	);

	// Add slider script.
	wp_enqueue_script(
		'quote-slider-js',
		get_template_directory_uri() . '/assets/js/jquery.flexslider.min.js',
		[ 'jquery' ],
		THE_BALL_V2_THEME_VERSION,
		true
	);

	// Custom script.
	wp_enqueue_script(
		'the-ball-v2-custom',
		get_template_directory_uri() . '/assets/js/custom.js',
		[ 'jquery' ],
		THE_BALL_V2_THEME_VERSION,
		false
	);

	// Comment reply script if needed.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}

add_action( 'wp_enqueue_scripts', 'the_ball_v2_scripts', 50 );



/**
 * Register widget areas for this theme.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @since 1.0.0
 */
function the_ball_v2_register_widget_areas() {

	// Define an area where a widget may be placed.
	register_sidebar( [
		'name' => __( 'Header', 'the-ball-v2' ),
		'id' => 'header',
		'description' => __( 'An optional widget area in the header of this theme', 'the-ball-v2' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	] );

	// Define an area where a widget may be placed.
	register_sidebar( [
		'name' => __( 'Footer', 'the-ball-v2' ),
		'id' => 'footer',
		'description' => __( 'An optional widget area in the footer of this theme', 'the-ball-v2' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	] );

}

add_action( 'widgets_init', 'the_ball_v2_register_widget_areas' );



/**
 * Filters the number of search results per page.
 *
 * @since 1.2.1
 */
function the_ball_v2_search_posts_per_page( $query ) {

	// Filter search query.
	if ( $query->is_search ) {
		$query->set( 'posts_per_page', '12' );
	}

	// --<
	return $query;

}

add_filter( 'pre_get_posts', 'the_ball_v2_search_posts_per_page' );



/**
 * Include class files.
 */
require get_template_directory() . '/includes/classes/class-counter.php';

/**
 * Include functions files.
 */
require get_template_directory() . '/includes/theme/custom-header.php';
require get_template_directory() . '/includes/theme/template-tags.php';
require get_template_directory() . '/includes/theme/extras.php';
require get_template_directory() . '/includes/theme/login-screen.php';
require get_template_directory() . '/includes/theme/customizer.php';
require get_template_directory() . '/includes/theme/jetpack.php';
