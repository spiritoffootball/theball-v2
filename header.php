<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'the-ball-v2' ); ?></a>

	<?php

	/**
	 * Allow others to insert content before the header.
	 *
	 * @since 1.0.0
	 */
	do_action( 'the_ball_v2_before_header' );

	?>

	<header id="masthead" class="site-header" role="banner">
		<div class="header-inner clear">

			<?php

			/**
			 * Allow others to insert content before the branding.
			 *
			 * @since 1.0.0
			 */
			do_action( 'the_ball_v2_before_branding' );

			?>

			<div class="site-branding">
				<?php if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php endif; ?>

				<?php $sof_description = get_bloginfo( 'description', 'display' ); ?>
				<?php if ( $sof_description || is_customize_preview() ) : ?>
					<?php /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>
					<p class="site-description"><?php echo $sof_description; ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->

			<?php

			/**
			 * Allow others to insert content after the branding.
			 *
			 * @since 1.0.0
			 */
			do_action( 'the_ball_v2_after_branding' );

			?>

			<?php

			/**
			 * Allow others to insert content before the navigation.
			 *
			 * @since 1.0.0
			 */
			do_action( 'the_ball_v2_before_nav' );

			?>

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<span class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'the-ball-v2' ); ?></span>
				<?php
				wp_nav_menu(
					[
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
					]
				);
				?>
			</nav><!-- #site-navigation -->

			<?php if ( is_active_sidebar( 'header' ) ) : ?>
				<div class="header-widgets">
					<?php dynamic_sidebar( 'header' ); ?>
				</div>
			<?php endif; ?>

			<?php

			/**
			 * Allow others to insert content after the navigation.
			 *
			 * @since 1.0.0
			 */
			do_action( 'the_ball_v2_after_nav' );

			?>

		</div><!-- .header-inner -->
	</header><!-- #masthead -->

	<?php

	/**
	 * Allow others to insert content after the header.
	 *
	 * @since 1.0.0
	 */
	do_action( 'the_ball_v2_after_header' );

	?>

	<?php

	/**
	 * Allow others to insert content before the content.
	 *
	 * @since 1.0.0
	 */
	do_action( 'the_ball_v2_before_content' );

	?>

	<div id="content" class="site-content">
