<?php
/**
 * Functions that style the login page.
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Enqueue styles to theme the login page.
 *
 * @since 1.0.0
 */
function the_ball_v2_enqueue_login_styles() {

	?>
	<style type="text/css">

		/* page */
		html,
		html body
		{
			background: #535f89;
			background-color: #535f89 !important;
		}

		/* logo */
		#login h1 a,
		.login h1 a
		{
			background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/logos/sof-logo-512-white.png);
			background-size: 50%;
			width: 256px;
			height: 116px;
			padding-bottom: 10px;
		}

		/* form
		body.login form
		{
			background: #fcfcf8;
		} */

		body.login form .input,
		body.login input[type="text"]
		{
			background: #cfcfdb;
		}

		body.login #nav,
		body.login #backtoblog
		{
			color: #fff;
			text-align: center;
		}

		body.login #nav a,
		body.login #backtoblog a,
		body.login h1 a
		{
			color: #fff;
		}

		body.login #nav a:hover,
		body.login #backtoblog a:hover,
		body.login h1 a:hover
		{
			color: #fff;
		}

	</style>
	<?php

}

// Add action for the above.
add_action( 'login_enqueue_scripts', 'the_ball_v2_enqueue_login_styles', 20 );

/**
 * Override auth panel background.
 *
 * @since 1.0.0
 */
function the_ball_v2_admin_head() {

	// Match auth panel background to theme.
	echo '<style>
		body #wp-auth-check-wrap #wp-auth-check
		{
			background: #535f89;
			background-color: #535f89;
		}
	</style>';

}

// Add action for the above.
add_action( 'admin_head', 'the_ball_v2_admin_head' );
