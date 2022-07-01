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

<!-- content-coming-soon.php -->
<section class="no-results not-found coming-soon">
	<div class="not-found-inner">
		<header class="page-header">
			<h1 class="page-title"><?php esc_html_e( 'Coming Soon', 'the-ball-v2' ); ?></h1>
		</header><!-- .page-header -->

		<div class="page-content">

			<p><?php esc_html_e( 'We are busy building. Please check back later.', 'the-ball-v2' ); ?></p>
		</div><!-- .page-content -->
	</div><!-- .not-found-inner -->
</section><!-- .no-results -->
