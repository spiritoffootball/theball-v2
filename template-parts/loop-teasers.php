<?php
/**
 * Template part for embedding a Teaser in the Homepage.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Define query args.
$loop_include_args = [
	'post_type' => 'page',
	'pagename'  => 'homepage-teaser',
];

// Do the query.
$loop_include = new WP_Query( $loop_include_args );

if ( $loop_include->have_posts() ) : ?>

	<!-- loop-teasers.php -->
	<section id="teaser" name="teaser" class="teaser clear">
		<div class="teaser-inner">

			<?php while ( $loop_include->have_posts() ) : ?>
				<?php

				$loop_include->the_post();

				// Get mini template.
				get_template_part( 'template-parts/content-teaser-mini' );

				?>
			<?php endwhile; ?>

		</div>
	</section><!-- #teaser -->

	<?php

endif;

// Prevent weirdness.
wp_reset_postdata();
unset( $loop_include_args, $loop_include );
