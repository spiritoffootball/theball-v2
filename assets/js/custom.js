/**
 * Custom functionality required for the The Ball v2 design.
 *
 * @since 1.0
 */

/**
 * Since this Javascript is added at the top of the page, let's hide the search
 * form immediately.
 */
document.write( '<style type="text/css" media="screen">#the-ball-v2-search{display:none;}</style>' );

/**
 * Define what happens when the page is ready.
 *
 * @since 1.0
 */
jQuery(document).ready( function($) {

	/**
	 * Act on page menu clicks by scrolling to permalink.
	 *
	 * @since 1.0.0
	 */
	$('#page').on( 'click', '.the-ball-v2-page-menu a', function( event ) {

		var scroll_offset = 0;

		// Disable native behaviour.
		if ( event.preventDefault ) {
			event.preventDefault();
		}

		// Get offset.
		if ( $('#wpadminbar').length > 0 ) {
			scroll_offset = $('#wpadminbar').height();
		}

		// Scroll to target.
		$(window).stop(true).scrollTo(
			$(this).attr( 'href' ),
			{ duration: 1200, axis: 'y', offset: 0 - scroll_offset }
		);

	});

	/**
	 * Act on clicks on the search link.
	 *
	 * @since 1.0.0
	 */
	$('#page').on( 'click', '.the-ball-v2-search-trigger', function( event ) {
		event.preventDefault();
		$('#the-ball-v2-search').show().find('input.search-field').focus();
	});

	/**
	 * Hide search form when mask is clicked.
	 *
	 * @since 1.0.0
	 */
	$('#page').on( 'click', '#the-ball-v2-search', function( event ) {
		$(this).hide();
		$('.the-ball-v2-search-trigger').focus();
	});

	/**
	 * Prevent search form clicks from propagating.
	 *
	 * @since 1.0.0
	 */
	$('#page').on( 'click', '#the-ball-v2-search form', function( event ) {
		event.stopPropagation();
	});

	/**
	 * Enable responsive videos.
	 *
	 * @since 1.1.3
	 */
	$('.post, .page, .has_feature_video').fitVids({
		customSelector: "iframe.dfb-video"
	});

	/**
	 * Refresh responsive videos after any AJAX event completes.
	 *
	 * @since 1.1.3
	 */
	$(document).ajaxComplete( function() {
		setTimeout( function() {
			$('.post, .page, .has_feature_video').fitVids({
				customSelector: "iframe.dfb-video"
			});
		}, 200 );
	});

});
