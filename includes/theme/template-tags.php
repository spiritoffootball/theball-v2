<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package The_Ball_v2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;



if ( ! function_exists( 'the_ball_v2_post_date' ) ) :

	/**
	 * Prints HTML with meta information for the current post-date/time.
	 *
	 * @since 1.0.0
	 */
	function the_ball_v2_post_date() {

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		echo '<span class="posted-on">' . $time_string . '</span>';

	}

endif;



if ( ! function_exists( 'the_ball_v2_posted_on' ) ) :

	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 *
	 * @since 1.0.0
	 */
	function the_ball_v2_posted_on() {

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: The time */
			esc_html_x( 'Posted on %s', 'post date', 'the-ball-v2' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$byline = sprintf(
			/* translators: %s: The Post author */
			esc_html_x( 'by %s', 'post author', 'the-ball-v2' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';

	}

endif;



if ( ! function_exists( 'the_ball_v2_entry_footer' ) ) :

	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 *
	 * @since 1.0.0
	 */
	function the_ball_v2_entry_footer() {

		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'the-ball-v2' ) );
			if ( $categories_list && the_ball_v2_blog_has_multiple_categories() ) {
				/* translators: %s: The list of categories */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'the-ball-v2' ) . '</span>', $categories_list );
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'the-ball-v2' ) );
			if ( $tags_list ) {
				/* translators: %s: The list of tags */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'the-ball-v2' ) . '</span>', $tags_list );
			}

		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {

			echo '<span class="comments-link">';
			/* translators: %s: The post title */
			comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'the-ball-v2' ), [ 'span' => [ 'class' => [] ] ] ), get_the_title() ) );
			echo '</span>';

		}

		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'the-ball-v2' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}

endif;



/**
 * Returns true if a blog has more than 1 category.
 *
 * @since 1.0.0
 *
 * @return bool
 */
function the_ball_v2_blog_has_multiple_categories() {

	$blog_categories = get_transient( 'the_ball_v2_categories' );

	if ( false === $blog_categories ) {

		// Get the array of all categories that are attached to posts.
		$blog_categories = get_categories( [
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		] );

		// Count categories that are attached to posts.
		$blog_categories = ! empty( $blog_categories ) ? count( $blog_categories ) : 0;

		set_transient( 'the_ball_v2_categories', $blog_categories );

	}

	if ( $blog_categories > 1 ) {
		return true;
	}

	// Fallback.
	return false;

}



/**
 * Flush out the transients used in the_ball_v2_categorized_blog.
 *
 * @since 1.0.0
 */
function the_ball_v2_category_transient_flusher() {

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'the_ball_v2_categories' );

}

add_action( 'edit_category', 'the_ball_v2_category_transient_flusher' );
add_action( 'save_post', 'the_ball_v2_category_transient_flusher' );



/**
 * Utility to test for feature image, because has_post_thumbnail() fails sometimes.
 *
 * @see https://developer.wordpress.org/reference/functions/has_post_thumbnail/
 *
 * @since 1.0.0
 *
 * @return bool True if post has thumbnail, false otherwise
 */
function the_ball_v2_has_feature_image() {

	// Replacement check.
	if ( '' !== get_the_post_thumbnail() ) {
		return true;
	}

	// --<
	return false;

}



if ( ! function_exists( 'the_ball_v2_feature_image' ) ) :

	/**
	 * Shows the feature image as a background.
	 *
	 * @since 1.0.0
	 *
	 * @param string $size The name of the size of the feature image.
	 */
	function the_ball_v2_feature_image_style( $size = 'the-ball-v2-feature' ) {

		// Print to screen.
		echo the_ball_v2_get_feature_image_style( $size );

	}

endif;



if ( ! function_exists( 'the_ball_v2_get_feature_image_style' ) ) :

	/**
	 * Gets the feature image as an inline style.
	 *
	 * @since 1.0.0
	 *
	 * @param string $size The name of the size of the feature image.
	 */
	function the_ball_v2_get_feature_image_style( $size = 'the-ball-v2-feature' ) {

		// Do we have a featured image?
		if ( the_ball_v2_has_feature_image() ) {

			// Get URL array for this post's feature image.
			$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), $size );
			if ( ! empty( $image_url[0] ) ) {

				// Return inline style.
				return ' style="background-image: url(' . esc_url( $image_url[0] ) . ');"';

			}

		}

		/*
		// Make an exception for singular Event.
		if ( 'event' == get_post_type( get_the_ID() ) && is_singular( 'event' ) ) {
			return ' style="background: transparent"';
		}

		// Make an exception for singular Posts.
		if ( 'post' == get_post_type( get_the_ID() ) && is_single() ) {
			return '';
		}

		// Make an exception for singular Pages.
		if ( 'page' == get_post_type( get_the_ID() ) && is_page() ) {
			return '';
		}
		*/

		// Return blank inline style.
		return '';

	}

endif;



if ( ! function_exists( 'the_ball_v2_get_home_feature_image_style' ) ) :

	/**
	 * Gets the feature image for the "Blog Home" page as an inline style.
	 *
	 * @since 1.0.0
	 *
	 * @param string $size The name of the size of the feature image.
	 */
	function the_ball_v2_get_home_feature_image_style( $size = 'the-ball-v2-feature' ) {

		// Get URL array for this page's feature image.
		$blog_page_id = get_option( 'page_for_posts' );
		if ( ! empty( $blog_page_id ) ) {
			$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $blog_page_id ), $size );
			if ( ! empty( $image_url[0] ) ) {
				return ' style="background-image: url(' . esc_url( $image_url[0] ) . ');"';
			}
		}

		// Return blank inline style.
		return '';

	}

endif;



if ( ! function_exists( 'the_ball_v2_partner_image' ) ) :

	/**
	 * Show a "partner" image.
	 *
	 * @since 1.0.0
	 *
	 * @param string $size The name of the size of the "partner" image.
	 */
	function the_ball_v2_partner_image( $size = 'the-ball-v2-partner' ) {

		// Try the ACF Field first.
		if ( defined( 'ACF' ) ) {
			$logo = get_field( 'logo' );
			if ( ! empty( $logo ) ) {
				$src = $logo['sizes']['medium'];
				$width = ( $logo['sizes']['medium-width'] / 2 );
				$height = ( $logo['sizes']['medium-height'] / 2 );
				$title = empty( $logo['title'] ) ? __( 'Partner logo', 'the-ball-v2' ) : $logo['title'];
				echo '<img src="' . $src . '" width="' . $width . '" height="' . $height . '" title="' . esc_attr( $title ) . '">';
			}
			return;
		}

		// Print to screen.
		echo the_ball_v2_get_avatar_feature_image( $size );

	}

endif;



if ( ! function_exists( 'the_ball_v2_get_avatar_feature_image' ) ) :

	/**
	 * Gets the feature image.
	 *
	 * @since 1.0.0
	 *
	 * @param string $size The name of the size of the feature image.
	 */
	function the_ball_v2_get_avatar_feature_image( $size = 'the-ball-v2-partner' ) {

		// Do we have a featured image?
		if ( the_ball_v2_has_feature_image() ) {

			// Get image markup for this post's feature image.
			return get_the_post_thumbnail( get_the_ID(), $size );

		}

		/*
		// Make an exception for Organisations who have no feature image.
		if ( 'organisation' == get_post_type( get_the_ID() ) ) {
			return '';
		}
		*/

		// Return default image.
		return '<img src="' . get_template_directory_uri() . '/assets/images/default-avatar.png" />';

	}

endif;



if ( ! function_exists( 'the_ball_v2_feature_image_caption' ) ) :

	/**
	 * Show feature image caption.
	 *
	 * @since 1.0.0
	 *
	 * @param bool $wrapped Optionally wrap the caption in a container.
	 */
	function the_ball_v2_feature_image_caption( $wrapped = true ) {

		// Bail if there's no feature image.
		if ( ! the_ball_v2_has_feature_image() ) {
			return;
		}

		// Wrap?
		if ( $wrapped ) {
			echo '<span class="feature-image-caption">';
		}

		// Print to screen.
		echo the_ball_v2_get_feature_image_caption();

		// Wrap?
		if ( $wrapped ) {
			echo '</span>';
		}

	}

endif;



if ( ! function_exists( 'the_ball_v2_get_feature_image_caption' ) ) :

	/**
	 * Get feature image caption.
	 *
	 * @since 1.0.0
	 *
	 * @return str The image caption if it has one, empty string otherwise.
	 */
	function the_ball_v2_get_feature_image_caption() {

		// Get the post that is the feature image attachment.
		$feature_image = get_post( get_post_thumbnail_id() );

		// Sanity checks.
		if ( ! ( $feature_image instanceof WP_Post ) ) {
			return '';
		}
		if ( empty( $feature_image->post_excerpt ) ) {
			return '';
		}

		// Okay, return caption.
		return $feature_image->post_excerpt;

	}

endif;
